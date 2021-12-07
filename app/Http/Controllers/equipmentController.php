<?php

namespace App\Http\Controllers;

use App\equipment;
use Illuminate\Http\Request;
use DB;
use Response;

class equipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eqQuery = DB::table('equipment')->get();
        return view('equipment.equipment',compact('eqQuery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $eqQuery = Equipment::updateOrCreate(
            ['id'=>$request->id],$request->all()
        );

        return Response::json($eqQuery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(equipment $equipment)
    {
        //
        return Response::json($equipment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(equipment $equipment)
    {
        //
        return Response::json($equipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipment $equipment)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipment $equipment)
    {
        //
        $equipment->delete();
    }

    public function rent(equipment $equipment)
    {
        //
        $eqQuery = Equipment::query();
            $eqQuery->UPDATE('quantity', ''. request('term'));
    }
    public function search(Request $request){
        /*$search_text = $_GET['query'];
        $eQuery = Equipments::where('eqName','LIKE','%'.$search_text.'%')-get(); 
        //return $eQuery->orderBy('eqName', 'quantity')->paginate(5);
        return view('equipment.search',compact('eQuery'))->paginate(5);*/

        /*$eqQuery = Equipment::query();
                if (request('term')) {
                    $eqQuery->where('eqName', 'Like', '%' . request('term') . '%');
                }
                    return $eqQuery->orderBy('quantity', 'eqName')->paginate(5);
    }*/
        $eqQuery = Equipment::where([
            ['eqName', '!=', Null],
            [function ($query) use ($request) {
                if(($term = $request->term)){
                    $query->orWhere('eqName', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
                ->orderBy("eqName", "DESC")
                ->paginate(5);
                return view('equipment.equipment', compact('eqQuery'))
                   ->with('i', (request()->input('page', 1) -1) * 5);
    }
}
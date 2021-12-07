@extends('masterlayout.master2')
@section('title') Equipments @endsection

@section('content')
<!--<form class="form-inline my-2 my-lg-0" type="get" action="{{ url ('/search')}}">
    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Equipments">
    <button class = "btn btn-outline-dark my-2 my-sm-0"type="submit">Search</button>
</form>-->
<div class="col-md-6"></div>
<div class="container col-md-6">
    <div class="mx-auto pull-right">
        <div class="">
            <form action="{{ url('/search') }}" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search Equipments">
                            <span class="fas fa-search">Search</span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search Equipments" id="term">
                    <a href="{{ url('/search') }}" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt">Refresh</span>
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>Equipment Name</th>
                <th>Quantity</th>
                <th>Action</th>
                <th><button class="btn btn-primary" type="submit" id="addButton">Add Equipment</button></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($eqQuery as $equipment)
        <tr id="record_id_{{$equipment->id}}">
                <td>{{$equipment->eqName}}</td>
                <td>{{$equipment->quantity}}</td>
                <td><button class="btn btn-primary" type="button" id="editButton" data_id = "{{$equipment->id}}">Edit</button>
                <button class="btn btn-primary" type="button" id="deleteButton" data_id = "{{$equipment->id}}">Delete</button>
                <button class="btn btn-primary" type="button" id="rentButton" data_id ="{{$equipment->id}}">Rent Equipment</button></td>
            </tr>                
            @endforeach
        </tbody>
    </table>
    <div id="addUpdateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headerAddUpdateModal">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUpdateForm">
                        <input class="form-control" type="text" name="id" id="id" hidden>
                        <label>Equipment Name</label>
                        <input class="form-control" type="text" name="eqName" id="eqName" >
                        <label>Quantity</label>
                        <input class="form-control" type="text" name="quantity" id="quantity">
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div id="rentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="headerRentModal">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="rentForm">
                        <input class="form-control" type="text" name="rentId" id="rentId" hidden>
                        <label>Equipment Name</label>
                        <input class="form-control" type="text" name="rentEqName" id="rentEqName"disabled>
                        <input class="form-control" type="text" name="rentEqName2" id="rentEqName2" hidden>
                        <label>Quantity</label>
                        <input class="form-control" type="text" name="rentQuantity" id="rentQuantity">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="saveRentButton">Save</button>
                </div>
            </div>
        </div>
    </div>
    @include('equipment/equipment_script')
@endsection
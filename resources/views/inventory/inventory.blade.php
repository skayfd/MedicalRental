@extends('masterlayout.master2')
@section('title') User Inventory @endsection

@section('content')
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Equipment Name</th>
            <th>Quantity</th>
            <th>Action</th>
            <th><button class="btn btn-primary" type="submit" id="rentButton">Rent Equipment</button></th>
        </tr>
    </thead>
    <tbody>
        <tbody>
            @foreach($invQuery as $inventory)
            <tr>
                <td>{{$equipment->eqName}}</td>
                <td>{{$equipment->quantity}}</td>
                <td><button class="btn btn-primary" type="button" id="returnButton" data_id = "{{$equipment->equipmentID}}">Return</button></td>
            </tr>                
            @endforeach
        </tbody>
    </table>
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
                        <input class="form-control" type="text" name="id" id="id" hidden>
                        <label>Equipment Name</label>
                        <input class="form-control" type="text" name="eqName" id="eqName">
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
    @include('inventory/inventory_script')
@endsection
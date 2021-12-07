@extends('masterlayout.master2')
@section('title') Borrowers @endsection

@section('content')
    
    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
                <th><button class="btn btn-primary" type="submit" id="addButton">Add Borrower</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowerQuery as $borrower)
            <tr id="record_id_{{$borrower->id}}">
                <td>{{$borrower->lastName}}</td>
                <td>{{$borrower->firstName}}</td>
                <td>{{$borrower->contactNumber}}</td>
            <td><button class="btn btn-primary" type="button" id="editButton" data_id = "{{$borrower->id}}">Edit</button>
            <button class="btn btn-primary" type="button" id="deleteButton" data_id = "{{$borrower->id}}">Delete</button></td>
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
                        <label>First Name</label>
                        <input class="form-control" type="text" name="firstName" id="firstName">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName">
                        <label>Contact Number</label>
                        <input class="form-control" type="text" name="contactNumber" id="contactNumber">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>

    @include('borrowers/borrowers_script')
@endsection
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addButton').click(function(){
            $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html('Add Borrowers');
            $('#saveButton').val("Create");
            $('#addUpdateForm').trigger("reset");
        });

        $('#saveButton').click(function(){
            buttonType=$(this).val();
            console.log(buttonType);
                $.ajax({
                    data: $('#addUpdateForm').serialize(),
                    url: "{{ route('borrowers.store') }}",
                    type: "POST",

                    success: function(data){
                        $('#addUpdateModal').modal('hide');
                        newData = '<tr id="record_id_' + data.id +'">';
                        newData +='<td>'+ data.firstName + '</td>';
                        newData +='<td>'+ data.lastName + '</td>';
                        newData +='<td>'+ data.contactNumber + '</td>';
                        newData +='<td><button class="btn btn-primary" type="button" id="editButton" data_id = "' + data.id + '">Edit</button>';
                        newData +='<button class="btn btn-primary" type="button" id="deleteButton" data_id = "'+ data.id + '">Delete</button></td>';
                        newData +='</tr>';
                       
                        if(buttonType == "Create"){
                        $('tbody').prepend(newData);
                        }
                        else if(buttonType=="Update"){
                        $('#record_id_'+ data.id).replaceWith(newData);
                        }
                    },

                    error: function(data){
                        console.log('Error:',data);
                    }
                });
        });
        
        $('body').on('click','#editButton', function(){
            console.log($(this).attr('data_id'))
           $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html('Update Borrower Details');
            $('#saveButton').val("Update");
            $('#addUpdateForm').trigger("reset");
            data_id = $(this).attr('data_id');
            $.get("{{ route('borrowers.index') }}" + '/' + data_id + '/edit', function(data){
                console.log(data.firstName) 
               $('#id').val(data.id);
               $('#firstName').val(data.firstName);
               $('#lastName').val(data.lastName);
               $('#contactNumber').val(data.contactNumber);
        });
    });
        
// delete
        $('body').on('click','#deleteButton', function(){
            data_id = $(this).attr('data_id');

            $.ajax({
                type: "DELETE",
                url: "{{ route('borrowers.index')}}" + '/' + data_id,
                
                success:function(){
                    $('#record_id_'+ data_id).remove();
                },

                error: function(data){
                    console.log('Error',data);
                }
            });
        });
    });
</script>

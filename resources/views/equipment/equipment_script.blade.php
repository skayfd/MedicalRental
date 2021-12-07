<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addButton').click(function(){
            $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html('Add Equipment');
            $('#saveButton').val("Create");
            $('#addUpdateForm').trigger("reset");
        });

        $('#saveButton').click(function(){
            buttonType = $(this).val();
                $.ajax({
                    data: $('#addUpdateForm').serialize(),
                    url: "{{ route('equipment.store') }}",
                    type: "POST",

                    success: function(data){
                        $('#addUpdateModal').modal('hide');
                        newData = '<tr id="record_id_' + data.id +'">';
                        newData +='<td>'+ data.eqName + '</td>';
                        newData +='<td>'+ data.quantity + '</td>';
                        newData +='<td><button class="btn btn-primary" type="button" id="editButton" data_id = "' + data.id + '">Edit</button>';
                        newData +='<button class="btn btn-primary" type="button" id="deleteButton" data_id = "'+ data.id + '">Delete</button>';
                        newData +='<button class="btn btn-primary" type="button" id="rentButton" data_id ="'+ data.id + '">Rent Equipment</button></td>';
                        newData +='</tr>';

                        
                        if(buttonType == "Create"){
                        $('tbody').prepend(newData);
                        }
                        else if(buttonType == "Update"){
                        $('#record_id_'+data.id).replaceWith(newData);
                        }
                        else if(buttonType == "Rent"){
                        $('#record_id_'+data.id).replaceWith(newData);
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
            $('#headerAddUpdateModal').html('Update Equipment Details');
            $('#saveButton').val("Update");
            $('#addUpdateForm').trigger("reset");
        
            data_id = $(this).attr('data_id');
            $.get("{{ route('equipment.index') }}" + '/' + data_id + '/edit', function(data){
                
               $('#id').val(data.id);
               $('#eqName').val(data.eqName);
               $('#quantity').val(data.quantity);
            });
        });

        $('body').on('click','#deleteButton', function(){
            data_id = $(this).attr('data_id');

            $.ajax({
                type: "DELETE",
                url: "{{ route('equipment.index')}}" + '/' + data_id,
                
                success:function(){
                    $('#record_id_' + data_id).remove();
                    $message = "successfully deleted";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                },

                error: function(data){
                    console.log('Error',data);
                }
            });
        });

        $('body').on('click','#rentButton', function(){
            $('#rentModal').modal('show');
            $('#headerRentModal').html('Rent Equipment');
            $('#rentForm').trigger("reset");
            data_id = $(this).attr('data_id');
            console.log(data_id);
            $.get("{{ route('equipment.index') }}" + '/' + data_id + '', function(data){
                
               $('#rentId').val(data.id);
               $('#rentEqName').val(data.eqName);
               $('#rentEqName2').val(data.eqName);
               $('#rentQuantity').val(data.quantity);
            });
        });
        
        

    });
</script>

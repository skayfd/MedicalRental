<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$('#rentButton').click(function(){
    data_id = $(this).attr('data_id');
    $('#rentModal').modal('show');
    $('#headerRentModal').html('Rent Equipments');
    $('#saveButton').val("Create");
    $('#rentForm').trigger("reset");
});



$('body').on('click','#returnButton', function(){
            data_id = $(this).attr('data_id');

            $.ajax({
                url: "{{ route('inventory.index')}}" + '/' + data_id,
                success:function(){
                },

                error: function(data){
                    console.log('Error',data);
                }
            });
        });

    });
</script>
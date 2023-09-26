<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
        $('.item_id').on('click',function(){
            let product_id = $(this).data('item_id');
            $.ajax({
                url:"{{ route('addToCart') }}",
                method:"post",
                data:{product_id:product_id},
                success:function(res){

                    console.log(product_id);
                }

            })


                $.ajax({
                    url:"{{ route('getCartData') }}",
                    method:"get",
                    success:function(res){
                       $('.added_item_val').html('('+res+')');
                    //console.log(res);
                    }
                })





        })


    })
</script>

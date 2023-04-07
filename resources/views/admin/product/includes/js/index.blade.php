<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {

    })
</script>

<script>
    $(document).on('click', '.add_product', function (e) {
        e.preventDefault();
        let name = $('#name').val();
        let price = $('#price').val();

        $.ajax({
            url: "{{route('product.add')}}",
            method:'post',
            data:{name:name,price:price},
            success:function (res) {
                if(res.status=='success'){
                    $('#addModal').modal('hide');
                    $('#addProductForm')[0].reset();
                    // $('.errMsgContainer').reset();
                    $('#table').load(location.href+' #table');
                }
            },
            error:function (err) {
                let error = err.responseJSON;
                $.each(error.errors,function (index, value) {
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                });
            }
        });

    })
</script>

<script>
    //valu gola show korano holo
    $(document).on('click', '.update_product_form', function (e) {
        e.preventDefault();

        let update_id = $(this).data('id');
        let update_name = $(this).data('name');
        let update_price = $(this).data('price');

        $('#update_id').val(update_id);
        $('#update_name').val(update_name);
        $('#update_price').val(update_price);
    });
</script>

<script>
    //product update er jonno
    $(document).on('click', '.update_product', function (e) {
        e.preventDefault();
        let update_id = $('#update_id').val();
        let update_name = $('#update_name').val();
        let update_price = $('#update_price').val();

        $.ajax({
            url: "{{route('product.update')}}",
            method:'post',
            data:{update_id:update_id,update_name:update_name,update_price:update_price},
            success:function (res) {
                if(res.status == 'success'){
                    $('#updateModal').modal('hide');
                    $('#updateProductForm')[0].reset();
                    $('#table').load(location.href+' #table');
                }
            },
            error:function (err) {
                let error = err.responseJSON;
                $.each(error.errors,function (index, value) {
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                });
            }
        });
    })

    //product delete er jonno
    $(document).on('click', '.delete_product', function (e) {
        e.preventDefault();
        let product_id = $(this).data('id');
        $.ajax({
            url: "{{route('product.delete')}}",
            method:'post',
            data:{product_id:product_id},
            success:function (res) {
                if(res.status == 'success'){
                    $('#table').load(location.href+' #table');
                }
            }
        });
        // if(confirm('Are you sure to delete product')){
        //
        // }


    })

    //ajax pagination er jonno
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1]
        product(page)
    })

    function product(page) {
        $.ajax({
            url:"/pagination/paginate-data?page"+page,
            success:function (res) {
                $('.table-data').html(res);
            }
        });
    }

    $(document).on('keyup', function (e) {
        e.preventDefault();

        let search_string = $('#search').val();
        $.ajax({
            url: "{{route('product.search')}}",
            method: "GET",
            data:{search_string:search_string},
            success:function (res) {
                $('.table-data').html(res);
                if(res.status == 'nothing_found')
                {
                    $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                }
            }
        });
    })
</script>



@yield('admin-js')


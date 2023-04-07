<table class="table table-warning" id="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($products as $product)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="" class="btn btn-primary update_product_form"
                   data-bs-toggle="modal"
                   data-bs-target="#updateModal"
                   data-id = "{{$product->id}}"
                   data-name = "{{$product->name}}"
                   data-price = "{{$product->price}}">
                    <i class="las la-edit"></i>
                </a>
                <a href="" class="btn btn-warning delete_product"
                   onclick="return confirm('are you sure to delete product ??')"
                   data-id="{{$product->id}}">
                    <i class="las la-times"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links()}}

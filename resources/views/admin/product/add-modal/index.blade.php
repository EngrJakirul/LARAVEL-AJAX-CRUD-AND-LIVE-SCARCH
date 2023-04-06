<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addModal">
    Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer">

                    </div>
                    <div class="form-group my-2">
                        <label for="name " class="mb-1">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="enter product  name">
                    </div>
                    <div class="form-group">
                        <label for="price" class="mb-1">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="enter product price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_product">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

@section('admin-js')

@endsection

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductForm">
        @csrf
        <input type="hidden" id="update_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer">

                    </div>
                    <div class="form-group my-2">
                        <label for="name " class="mb-1">Update Product Name</label>
                        <input type="text" class="form-control" name="update_name" id="update_name" placeholder="enter product  name">
                    </div>
                    <div class="form-group">
                        <label for="price" class="mb-1">Update Product Price</label>
                        <input type="text" class="form-control" name="update_price" id="update_price" placeholder="enter product price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_product">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@section('admin-js')

@endsection

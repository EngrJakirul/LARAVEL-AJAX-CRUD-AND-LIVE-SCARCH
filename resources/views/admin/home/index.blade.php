@extends('master')
@section('title')
    CRUD HOME PAGE
@endsection

@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h2>Laravel 10 Ajax Crud</h2>
                <!-- Button trigger modal -->
                @include('admin.product.add-modal.index')
                @include('admin.product.update-product.index')
                <div >
                    <input type="text" name="search" id="search" class="mb-3 text-end form-control" style="border: blue 1px solid" placeholder="search here">
                </div>
                <div class="table-data">
                    <table class="table table-warning" id="table">
                        <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
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
                                <a href="" class="btn btn-sm btn-primary update_product_form"
                                   data-bs-toggle="modal"
                                   data-bs-target="#updateModal"
                                    data-id = "{{$product->id}}"
                                    data-name = "{{$product->name}}"
                                    data-price = "{{$product->price}}">
                                    <i class="las la-edit"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-warning delete_product"
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
                </div>


            </div>
        </div>
    </section>
@endsection

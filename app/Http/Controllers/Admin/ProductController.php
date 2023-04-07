<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products;

    public function index()
    {
        $this->products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.home.index', [
            'products' => $this->products,
        ]);
    }
    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
            ],
            [
                'name.required'   => 'Name filed is required',
                'name.unique'     => 'Product Already Exists',
                'price.required'  => 'Price is required',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'update_name' => 'required|unique:products,name,'.$request->update_id,
                'update_price' => 'required',
            ],
            [
                'update_name.required'   => 'Name filed is required',
                'update_name.unique'     => 'Product Already Exists',
                'update_price.required'  => 'Price is required',

            ]
        );

        Product::where('id',$request->update_id)->update([
           'name'=>$request->update_name,
           'price'=>$request->update_price,
        ]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function deleteProduct(Request $request)
    {
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function pagination(Request $request)
    {
        $this->products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.product.pagination_products.index', [
            'products' => $this->products,
        ]);
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('name','like','%'.$request->search_string.'%')->orWhere('price','like','%'.$request->search_string.'%')->orderBy('id','DESC')->paginate(5);
        if($products->count() >= 1){
            return view('admin.product.pagination_products.index', [
                'products' => $products,
            ]);

        }else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}

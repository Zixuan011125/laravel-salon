<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function addProducts(Request $request){

        // dd($request);
        $name = request()->name;
        $price = request()->price;
        $quantity = request()->quantity;
        // $image = request()->image;

        // Check if the request has a file
        if($request->hasFile('image')){
            $photo = $request->file('image');

            // Define custom directory to store images
            $destinationPath = public_path('images/products');

            // Generate a unique name for the file
            $fileName = time(). '-' . $photo->getClientOriginalName();

            // Move the file to the desired directory
            $photo->move($destinationPath, $fileName);

            // Path to store in the database
            $path = 'images/products/' . $fileName;

        }

        // Create a new product instance and save it to the database
        $products = new Products();
        $products->name = $name;
        $products->price = $price;
        $products->quantity = $quantity;
        // $products->image = $image;

        // Store image path if uploaded
        $products->image = $path ?? null;

        $products->save();

        return redirect()->back();
    }

    public function showProducts(){
        $products = Products::select('id', 'name', 'price', 'image', 'quantity')->get();
        // dd($products);
        return view('admin/all-products', compact('products'));
    }

    public function showProductsForm(){
        return view('admin/add-products');
    }

    public function showUpdateProductsForm(Request $request, $id){
        $product = Products::where('id', $id)->first();
        return view('admin/update-products', compact('product'));
    }

    public function updateProducts(Request $request, $id){
        // Find the product by ID
        $product = Products::find($id);

        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');

        // Handle file upload if a new image is provided
        if($request->hasFile('image')){
            $photo = $request->file('image');

            // Define custom directory to store images
            $destinationPath = public_path('images/products');

            // Generate a unique name for the file
            $fileName = time() . '-' . $photo->getClientOriginalName();

            // Move the file to the desired directory
            $photo->move($destinationPath, $fileName);

            // Update image path
            $product->image = 'images/products/' . $fileName;
        }

        $product->save();
        return redirect()->route('showProducts');
    }

    public function deleteProducts(Request $request){
        $productID = request()->id;
        $product = Products::find($productID);
        if($product !== NULL){
            $product->delete();
        }

        return redirect()->route('showProducts');
    }

    public function products(Request $request){
        // Retrieve all products
        $products = Products::all();

        // Pass the products data to the view
        return view('products', compact('products'));
    }

    public function tableProducts(){
        $query = Products::select('id', 'name', 'image', 'price', 'quantity');

        return DataTables::of($query)->make(true);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CustomersProducts;

class CustomersProductsController extends Controller
{
    public function sellProductsForm($customer_id){
        $products = Products::all();

        return view('admin/sell-products', compact('products', 'customer_id'));
    }

    public function sellProducts(Request $request, $customer_id){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Insert the data into the customers_products table
        CustomersProducts::create([
            'customer_id' => $customer_id,
            'product_id' => $validatedData['product_id'],
            'quantity_sold' => $validatedData['quantity'],
        ]);

        // Optionally, redirect back or to a success page
        return redirect()->route('showCustomers');
    }
}
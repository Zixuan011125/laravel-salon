<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\SubServices;
use App\Models\Customers;
use App\Models\CustomersProducts;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoicesController extends Controller
{
    public function generateInvoices(Request $request, $customer_id){
        // Fetch customer data
        $customer = Customers::find($customer_id);
        if (!$customer) {
            return redirect()->back()->withErrors('Customer not found.');
        }

        // Generate a random invoice number
        $invoices_number = 'INV-' . strtoupper(uniqid());

        // Calculate the cost from subServices

        // Split the comma-separated string into an array
        $services = explode(',', $customer->services);

        // Fetch the sub-services using whereIn with the array of service IDs
        $subServices = SubServices::whereIn('id', $services)->get();

        // This is for calculate the total cost using the subCost column
        $totalCost = $subServices->sum('subCost');

        // $name = request()->name;
        // $customer_id = request()->customer_id;
        // $invoices_number = request()->invoices_number;
        // $services = request()->services;
        // $date = request()->date;
        // $time = request()->time;
        // $cost = request()->time;

        // Fetch products sold to the customer
        $products = CustomersProducts::where('customer_id', $customer_id)
            ->join('products', 'customers_products.product_id', '=', 'products.id')
            ->select('products.name', 'products.price', 'customers_products.quantity_sold as quantity')
            ->get();
        
        // Add the cost of products to the total cost
        $totalProductCost = $products->sum(function ($product){
            return $product->price * $product->quantity;
        });

        $totalCost += $totalProductCost;

        // Create and save the invoices in Invoices object
        $invoices = new Invoices();
        // $invoices->name = $customer->name;
        $invoices->customer_id = $customer->id;
        $invoices->invoices_number = $invoices_number;
        $invoices->services = implode(', ', $subServices->pluck('subName')->toArray());

        // now is to get current date and time, toDateString and toTimeString is for format them to string
        $invoices->date = now()->toDateString(); 
        $invoices->time = now()->toTimeString();
        $invoices->cost = $totalCost;

        $invoices->save();

        // Pass data to the view
        return view('admin/invoices', [
            'customer' => $customer,
            'subServices' => $subServices,
            'products' => $products,
            'totalCost' => $totalCost,
            'invoiceNumber' => $invoices_number,
            'date' => now()->format('d M Y, h:i A')
        ]);
    }

    public function showAllInvoices(){
        return view('admin/all-invoices');
    }

    public function tableInvoices(){
        // $query = Invoices::select('id', 'customer_id', 'invoices_number', 'services', 'date', 'time', 'cost');

        // return DataTables::of($query)->make(true);

        // The invoices table is join the customer table 
        $query = Invoices::select('invoices.id', 'customer.name', 'invoices.invoices_number', 'invoices.cost', 'invoices.date', 'invoices.time')
        ->join('customer', 'invoices.customer_id', '=', 'customer.id');

        return DataTables::of($query)->make(true);
    }

    public function showCustomerInvoices($customer_id) {
        $customer = Customers::findOrFail($customer_id);
        $invoices = $customer->invoices; 

        $invoice = $invoices->first();

        // Extract specific invoice details
        $date = $invoice->date;
        $invoiceNumber = $invoice->invoices_number;
        $subServices = $invoice->subServices; 
        $totalCost = $invoice->cost;
        
        return view('admin/view-invoices', compact('customer', 'date', 'invoiceNumber', 'subServices', 'totalCost'));
    }
}
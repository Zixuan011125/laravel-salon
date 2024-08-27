<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\SubServices;
use App\Models\Customers;
use App\Models\CustomersProducts;
use App\Models\Invoices_Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // Fetch the sub-services using whereIn with the array of service IDs
        $services = $customer->services;  
        $subServices = SubServices::whereIn('id', explode(',', $services))->get();

        // Calculate the total cost using the subCost column
        $totalCost = $subServices->sum('subCost');

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

        // Create and save the invoice in the Invoices table
        $invoice = new Invoices();
        $invoice->customer_id = $customer->id;
        $invoice->invoices_number = $invoices_number;
        $invoice->date = now()->toDateString(); 
        $invoice->time = now()->toTimeString();
        $invoice->cost = $totalCost;
        $invoice->save();

        // Now store sub-services in the invoices_services table
        foreach ($subServices as $subService) {
            DB::table('invoices_services')->insert([
                'invoices_id' => $invoice->id,
                'sub_services_id' => $subService->id,
            ]);
        }

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
        $query = Invoices::select('invoices.id', 'customer.name', 'invoices.invoices_number', 'invoices.cost', 'invoices.date', 'invoices.time', 'customer_id')
        ->join('customer', 'invoices.customer_id', '=', 'customer.id');

        return DataTables::of($query)->make(true);
    }

    public function showCustomerInvoices($id) {
        // dd($customer_id);
        $invoice = Invoices::where('invoices.id', $id)
            ->join('customer', 'invoices.customer_id', '=', 'customer.id')
            ->select('invoices.*', 'customer.name')
            ->first();

        // // Extract specific invoice details
        // $date = $invoice->date;
        // $invoiceNumber = $invoice->invoices_number;
        // $subServices = $invoice->subServices; 
        // // dd($subServices);
        // $totalCost = $invoice->cost;

        // Fetch the data from invoices_services table
        $subServices = Invoices_Services::where('invoices_services.id', $id)
            ->join('sub_services', 'invoices_services.sub_services_id', '=', 'sub_services.id')
            ->select('sub_services.subName', 'sub_services.subCost')
            ->get();

        // Extract specific invoice details
        $date = $invoice->date;
        $invoiceNumber = $invoice->invoices_number;
        $totalCost = $invoice->cost;
        
        return view('admin/view-invoices', compact('invoice', 'date', 'invoiceNumber', 'subServices', 'totalCost'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Invoices_Services;
use Illuminate\Http\Request;

class InvoicesServicesController extends Controller
{
    // public function showCustomerInvoices($id) {
    //     // dd($customer_id);
    //     $invoice = Invoices_Services::where('invoices.id', $id)
    //         ->join('customer', 'invoices.customer_id', '=', 'customer.id')
    //         ->first();

    //         // dd($invoice);

    //     // Extract specific invoice details
    //     $date = $invoice->date;
    //     $invoiceNumber = $invoice->invoices_number;
    //     $subServices = $invoice->subServices; 
    //     dd($subServices);
    //     $totalCost = $invoice->cost;
        
    //     return view('admin/view-invoices', compact('invoice', 'date', 'invoiceNumber', 'subServices', 'totalCost'));
    // }

    // public function showCustomerInvoices(Request $request){
    //     // Insert the data into the invoices_services table
    //     Invoices_Services::create([
    //         'invoices_id' => $invoices_id,
    //         'sub_services_id' => $sub_services_id,
    //     ]);

        
    // }
}

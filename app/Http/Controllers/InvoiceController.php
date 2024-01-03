<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use DB;
use App\Models\Counter;

class InvoiceController extends Controller
{
   public function get_all_invoices(){
        $Invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
        return response()->json([
            'Invoices' => $Invoices
        ], 200);
   }
   public function search_invoice(Request $request){
    $search = $request->get('s');
    if($search != null){
    $Invoices = Invoice::with('customer')->where('id', 'LIKE', '%'.$search.'%')->get();
    }
    else{
    $Invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();
    }
    return response()->json([
        'Invoices' => $Invoices
    ], 200);
   }
   public function new_invoice(Request $request){
     $counter = Counter::where('key', 'invoice')->first();
     $random = Counter::where('key', 'invoice')->first();

     $invoice = Invoice::orderBy('id', 'DESC')->first();
     if($invoice){
        $invoice = $invoice->id + 1;
        $counters = $counter->value + $invoice;
     }else{
        $counters = $counter->value;
     }


     $formData = [
        'number' => $counter->prefix.$counters,
        'customer_id' => 'null' ,
        'customer' => 'null' ,
        'date' => date('Y-m-d'),
        'due_date' => 'null' ,
        'refference' => 'null',
        'discount' =>0,
        'terms_and_condition' => 'Default text',
        'items' => [
            [
                'product_id' => 'null',
                'product' => 'null',
                'unit_price' => 0,
                'quantity' => 1,              
            ]
        ]
     ];

        return response()->json([
            'formData' => $formData
        ], 200);
}
}

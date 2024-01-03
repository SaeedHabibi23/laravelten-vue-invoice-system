<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use DB;

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
}

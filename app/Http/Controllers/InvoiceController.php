<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.content.invoice', compact('invoices'));
    }

    public function detail($id)
    {
        $invoice = Invoice::find($id);
        $idProducts = unserialize($invoice->id_product);
        $products = Product::whereIn('id',$idProducts)->get();
        return view('admin.content.invoice_detail', compact('products', 'invoice'));
    }
}

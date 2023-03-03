<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $products = Product::all()->count();
        $category = Category::all()->count();
        $users = User::all()->count();
        $invoice = Invoice::all()->count();
        $invoiceTotal = Invoice::pluck('total')->toArray();
        $invoiceCreatedAtNo = Invoice::pluck('created_at')->toArray();
        $invoiceCreatedAt =  array_map(function ($date) {
            return date('Y-m-d', strtotime($date));
        }, $invoiceCreatedAtNo);
        return view('admin.content.dashboard', compact('products','category','users','invoiceTotal','invoiceCreatedAt','invoice'));
    }

}

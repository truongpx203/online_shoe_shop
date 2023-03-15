<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact('products','categories'));
    }

    public function viewProduct(Request $request, $id)
    {
        $categories = Category::all();

        if (isset($request['search']) && $request['search']) {
            $search = $request['search'];
 
            $products = Product::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->get();
        } else {

            $products = Product::where('id_category', $id)->orderBy('id','asc')->get();
        }

        return view('product', compact('products','categories'));
    }

    // indexProduct
    public function indexProduct(Request $request)
    {
        $categories = Category::all();

        if (isset($request['search']) && $request['search']) {
            $search = $request['search'];
 
            $products = Product::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->get();
        } else {

            $products = Product::orderBy('id','asc')->get();
        }

        return view('product', compact('products','categories'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $cate = Category::all();
        return view('product_detail', compact('product', 'cate'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addCart($id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if (!empty($request->input('action')) && $request->input('action') == 'postToConfirm') {
            return view('confirm_cart');
        }
        if($request->id and $request->qty) {
            $newa = array_combine($request->id , $request->qty);
            $cart = session()->get('cart');
            foreach ($newa as $key => $value){
                $cart[$key]["quantity"] = $value;
                if($value == 0) {
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    public function postCart(Request $request)
    {
        $invoice = new Invoice();
        $invoice->fill([
            "id_product" =>serialize($request->get('id_product')),
            "total" => $request->get('total'),
            "address" => $request->get('address'),
            "name_buyer" => $request->get('name_buyer'),
            "phone" => $request->get('phone'),
            "note" => $request->get('note'),
            "payment" => $request->get('payment'),
            "email" => $request->get('email'),
        ]);
        $invoice->save();
        session()->forget('cart');
        return view('thank_you');
    }

    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }

    public function storeRegist(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        auth()->login($user);
        return redirect()->route('home');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors(['errors_login' => 'account password incorrect' ,])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
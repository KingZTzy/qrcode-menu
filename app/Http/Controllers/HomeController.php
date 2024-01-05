<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionPending;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (!session()->has('session')) {
            session()->put('session', Str::random(10));
        }

        $products = Product::all();
        $count = TransactionPending::where('session', session()->get('session'))->sum('quantity');
        $category = Category::get();

        return view('home', ['products' => $products, 'count' => $count,'category'=>$category]);
    }

    public function addToCart($id,Request $request)
    {
        // dd($request->id);

        $product = Product::find($request->id);

        TransactionPending::updateOrCreate([
            'product_id' => $id,
            'session' => session()->get('session'),
        ],[
            'quantity' => $request->quantity,
            'harga' => $product->price,
            'session' => session()->get('session')
        ]);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update($id)
    {

        $product = Product::find($id);

        $transactionPending = TransactionPending::where('product_id', $product->id)->where('session', session()->get('session'))->first();
        if ($transactionPending) {
            $transactionPending->quantity = $transactionPending->quantity - 1;
            $transactionPending->save();

            if ($transactionPending->quantity == 0) {
                $transactionPending->delete();
            }
        }
        return redirect()->back()->with('success', 'Product update to cart successfully!');
    }
}

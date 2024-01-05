<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\TransactionPending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Home2Controller extends Controller
{
    //
    public function index($id)
    {
      if(is_numeric($id)){
        if (!session()->has('session')) {
            session()->put('session', Str::random(10));
        }

        $products            = Product::where('status',1)->get();
        $count               = TransactionPending::where('session', session()->get('session'))->sum('quantity');
        $transactionPendings = TransactionPending::where('session', session()->get('session'))->get();
        $category            = Category::get();
        $table               = Table::find($id);

        return view('home2', [
            'products'            => $products,
            'count'               => $count,
            'category'            => $category,
            'transactionPendings' => $transactionPendings,
            'table'               => $table,
        ]);
      } else {
        return view('login');
      }
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($request->id);

        if ($request->quantity == 0) {

            $transactionPending = TransactionPending::where('session',session()->get('session'))->where('product_id',$product->id)->first();
            $transactionPending->delete();

        } else {

            TransactionPending::updateOrCreate([
                'product_id' => $id,
                'session'    => session()->get('session')
            ],[
                'quantity' => $request->quantity,
                'harga'    => $product->price,
                'session'  => session()->get('session')
            ]);

        }

        return redirect()->back()->with('success', 'Menu Berhasil Ditambahkan!');
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
        return redirect()->back()->with('success', 'Menu Berhasil Diperbarui!');
    }

    public function delete($product_id, $session)
    {
        $product = Product::find($product_id);

        $transaction = TransactionPending::where('product_id', $product_id)->where('session', $session)->first();

        $qty = 0;

        $transaction->delete();

        return $qty;
    }

    // =====================================
    // ------------- JSON ONLY -------------
    // =====================================

    public function incrementQuantity($product_id, $session)
    {
        $product = Product::find($product_id);
        // dd($product);
        // $session = Session::get('session');
        // dd($session);
        $transaction = TransactionPending::where('product_id', $product_id)->where('session', $session)->first();

        if($transaction) {
            $transaction->quantity++;
            $transaction->save();
        } else {
            $transaction = TransactionPending::create([
                    'product_id' => $product_id,
                    'quantity'   => 1,
                    'harga'      => $product->price,
                    'session'    => $session
            ]);
        }

        return $transaction->quantity;
    }

    public function decrementQuantity($product_id, $session)
    {
        $product = Product::find($product_id);

        $transaction = TransactionPending::where('product_id', $product_id)->where('session', $session)->first();

        $qty = 0;

        if ($transaction->quantity <= 1) {
            $transaction->delete();

        } else {

            $transaction->quantity--;
            $transaction->save();
            $qty = $transaction->quantity;
        }

        return $qty;
    }

    public function getCart($session)
    {
        $transaction = TransactionPending::with('product')->where('session', $session)->get()->toJson();

        return $transaction;
    }

    public function getSubTotal($session)
    {
        $transactionPendings = TransactionPending::where('session', $session)->get();
        $subTotal            = 0;

        foreach ($transactionPendings as $value) {

            $subTotal += $value->harga * $value->quantity;

        }

        if ($subTotal > 0) {

            $subTotal = 'Rp. '.number_format($subTotal, 0, ',', '.');
            return json_encode(["$subTotal"]);

        } else {

            return json_encode(['Rp. 0']);

        }

    }

    public function getCount($session)
    {
        $transactionPendings = TransactionPending::where('session', $session)->sum('quantity');
        return $transactionPendings;
        // $count = 0;

        // foreach ($transactionPendings as $value) {
        //     $count += $value->product_id * $value->quantity;
        // }
    }
}

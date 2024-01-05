<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Table;
use App\Models\Transaction;
use App\Models\TransactionItems;
use Illuminate\Support\Str;
use App\Models\TransactionPending;

class Cart2Controller extends Controller
{
    public function cart($id)
    {
        $transactionPending = TransactionPending::where('session', session()->get('session'))->get();

        if (count($transactionPending)) {

            return view('cart2', [
                'transactionPending' => $transactionPending,
                'table'=>Table::find($id),
            ]);

        } else {

            return redirect()->back();

        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    'id' => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            'id' => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request, $id)
    {
        $kode = 'INV/'.date('Ymd').'/';
        $unique = Transaction::where('kode', 'LIKE', "$kode%")->latest('kode')->count();
        $kode = $kode . Str::padLeft($unique + 1,4,0);

        $sum = 0;

        $transactionitems = TransactionPending::where('session', session()->get('session'))->get();
        // dd($transactionitems);
        foreach($transactionitems as $data)
        {
           $sum += $data->quantity * $data->harga;
        }

        $pajak = (11/100) * $sum;


        $transaksi = Transaction::create([
            'kode' => $kode,
            'nama_pemesan' => $request->name,
            'nomorhp' => $request->nomorhp,
            'subtotal' => $sum,
            'pajak' => $pajak,
            'total' => $sum + $pajak,
            'session'  => session()->get('session'),
        ]);


        foreach($transactionitems as $data)
        {
            // dd

            TransactionItems::create([
                'product_id' => $data->product_id,
                'quantity' => $data->quantity,
                'harga'    => $data->harga,
                'transaction_id' => $transaksi->id,
                'session'  => session()->get('session'),
            ]);

            $data = TransactionPending::find($data->id)->delete();
        }

        return redirect('transaction/'. $id.'/'. $transaksi->id);
    }
}

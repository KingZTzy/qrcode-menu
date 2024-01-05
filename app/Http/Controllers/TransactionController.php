<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index($id, $id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $table = Table::find($id);
        return view('invoicetransaksi', [
            'transaction' => $transaction,
            'table' => $table,
        ]);
    }
 
    public function transaction($id, $id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $table = Table::find($id);
        return view('transactions_qrcode', [
            'transaction' => $transaction,
            'table' => $table,
        ]);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function index($id){
        $product = Table::find($id);
        return view('admin.qrcode',['product'=>$product]);
    }
}

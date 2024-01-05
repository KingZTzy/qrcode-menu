<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// use Session;

class MejaMakanController extends Controller
{
    //
    public function index()
    {
        $tables = Table::get();
        $tgl = Carbon::now()->locale('id');
        $tgl->settings(['formatFunction' => 'translatedFormat']);
        $waktu = $tgl->format('l, d F Y');


        return view('admin.mejamakan',['tables'=>$tables,'waktu' =>$waktu]);
    }

    public function kasir()
    {
        return view('kasir.kasir',);
    }

    public function store(Request $request)
    {
        Table::create([
            'no_meja'        => $request->no_meja,
            'nama_meja'        => $request->nama_meja,
        ]);

        Session::flash('berhasil','Meja Makan Berhasil Ditambahkan');
        return redirect('/admin/meja-makan');
    }

    public function update(Request $request, $id)
    {
        $Table = Table::find($id);

        Table::updateOrCreate([
            'id'=>$id,
        ],[
            'no_meja'        => $request->no_meja,
            'nama_meja'        => $request->nama_meja,
        ]);

        Session::flash('berhasil','Meja Makan Berhasil Ditambahkan');
        return redirect('/admin/meja-makan');
    }

    public function destroy($id)
    {
        // dd('tset?');

        $Table=Table::find($id);
        $Table->delete();

        return redirect('/admin/meja-makan');
    }
}

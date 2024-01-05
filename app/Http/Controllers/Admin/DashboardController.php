<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use PDF;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $products = Product::get();
        $category = Category::get();
        $tables = Table::get();
        $status = Status::get();

        $tgl = Carbon::now()->locale('id');
        $tgl->settings(['formatFunction' => 'translatedFormat']);
        $waktu = $tgl->format('l, d F Y');

        return view('admin.dashboard', ['products'=>$products,'category'=>$category,'tables'=>$tables, 'status'=>$status, 'waktu' =>$waktu]);
    }

    public function create_pdf($id)
    {
      $data = Table::find($id);
    //   dd($data);
      // share data to view'
        return view('pdf.pdfgenerate', ['data'=>$data]);

    //   view()->share('tables',$data);
    //   $pdf = PDF::loadView('pdf.pdfgenerate', ['data'=>$data]);
    //   // download PDF file with download method
    //   return $pdf->download('table '.Str::slug($data->nama_meja).'.pdf');
    }

    public function destroy($id)
    {
        $Table=Table::find($id);
        $Table->delete();

        return redirect('/admin/dashboard');
    }

    public function update(Request $request, $id)
    {
        $Table = Table::find($id);

        Table::updateOrCreate([
            'id'=>$id,
        ],[
            'no_meja' => $request->no_meja,
        ]);

        Session::flash('berhasil','Meja Makan Berhasil Perbarui');
        return redirect('/admin/dashboard');
    }


    public function store(Request $request)
    {
        Table::create([
            'no_meja'        => $request->no_meja,
        ]);

        Session::flash('berhasil','Meja Makan Berhasil Ditambahkan');
        return redirect('/admin/dashboard');
    }
}

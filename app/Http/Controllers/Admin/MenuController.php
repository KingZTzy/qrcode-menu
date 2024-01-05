<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// use Session;

class MenuController extends Controller
{
    //
    public function index()
    {
        $products = Product::get();
        $category = Category::get();
        // $status = Status::get();
        $tgl = Carbon::now()->locale('id');
        $tgl->settings(['formatFunction' => 'translatedFormat']);
        $waktu = $tgl->format('l, d F Y');


        return view('admin.menu',['products'=>$products,'category'=>$category,'waktu' =>$waktu]);
    }

    public function store(Request $request)
    {
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('upload/product'), $image);

        Product::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'image'       => $image,
            'status'      => 1,
            'description' => $request->description
        ]);

        Session::flash('berhasil','Menu Berhasil Ditambahkan');
        return redirect('/admin/menu');
    }

    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $product = Product::find($id);
        // dd($product);
        if ($request->file('image')) {

            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/product'), $image);

        } else {

            $image = $product->image ? $product->image : null;

        }
        // $product = Product::find($request->id);
        $product->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'price'       => $request->price,
            'category_id' => $request->category_id,
            // 'status'      => $request->status,
            'image'       => $image,
            'description' => $request->description
        ]);

        Session::flash('berhasil','Menu Berhasil Dirubah');
        return redirect('/admin/menu');
    }

    public function destroy(Request $request,$id)
    {
        // dd('test');

      Product::where('id',$id)->delete();
      return back();
    }

    public function updatetoogle(Request $request)
    {
        $user = Product::find($request->menu_id);
        $user->status = $request->status;
        $user->save();
        // dd($user);

        return response()->json([
            'success'        => 'Status change successfully.',
            'current_status' => $request->status
        ]);
    }
}

<?php

namespace App\Http\Controllers\Bride;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::where('user_id',Auth::user()->id)->get();
        return view('bride.gallery', compact(['galleries']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fotos'   => 'required',
            'fotos.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        ]);

        foreach($request->file('fotos') as $result) {

            $foto = time().'.'.$result->extension();
            $result->move(public_path('upload/gallery'), $foto);

            Gallery::create([
                'user_id' => Auth::user()->id,
                'foto'    => $foto
            ]);

        }

        return redirect()->to('/bride/gallery')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096'
        ]);

        $gallery = Gallery::find($id);

        if ($request->file('foto')) {

            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('upload/gallery'), $foto);

        } else {

            $foto = $gallery->foto ? $gallery->foto : null;

        }

        $gallery->update([
            'user_id' => Auth::user()->id,
            'foto' => $foto
        ]);

        return redirect()->to('/bride/gallery')->with('success', 'Data Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        File::delete(public_path('upload/gallery/'.$gallery->foto));
        $gallery->delete();

        return redirect()->to('/bride/gallery')->with('success', 'Data Berhasil di Hapus');
    }
}

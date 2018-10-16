<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Katalog;
use App\Kategori;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $data = DB::table('katalog')
        //     ->orderBy('id', 'asc')
        //     ->get();

        $data = Katalog::with('categories')->get();

        return view('admin.katalog.katalog', ['katalog' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori')
            ->orderBy('id', 'asc')
            ->get();
        return view('admin.katalog.tambah-katalog', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $tambah = new Katalog();
        $idp = str_slug($request['nama_produk'], '_') . "_" . str_random(8);
        $tambah->id_produk = $idp;
        $tambah->nama_produk = $request['nama_produk'];
        $tambah->model_produk = $request['model_produk'];
        
        $checkboxValue = $request->input('check_kategori');

        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        
        $file       = $request->file('foto_produk');
        $namaFoto = pathinfo($file->getClientOriginalName());
        $fileName   =  $idp . "." . $namaFoto['extension'];
        $request->file('foto_produk')->move("images/katalog/", $fileName);

        $tambah->foto_produk = $fileName;
        $tambah->save();

        $kategori = Kategori::find($checkboxValue);
        $tambah->categories()->attach($kategori);

        // if(!empty($checkboxValue)){
        //     foreach($checkboxValue as $kategori){
        //         $tambah_kategori = new ProdukKategori();
        //         $tambah_kategori->id_produk = $idp;
        //         $tambah_kategori->nama_produk = $request['nama_produk'];
        //         $tambah_kategori->nama_kategori = $kategori;

        //         $tambah_kategori->save();
        //     }
        // }


        return redirect('admin/katalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Katalog $katalog)
    {
        
        return view('admin.katalog.show', compact('katalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Katalog::find($id);
        $kategories = $data->categories;

        return view('admin.katalog.ubah-katalog',  ['produk' => $data, 'kat' => $kategories]);
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
        $update = Katalog::where('id', $id)->first();
        $update->nama_produk = $request['nama_produk'];
        $update->model_produk = $request['model_produk'];
        
        $checkboxValue = $request->input('check_kategori');

        if($request->file('foto_produk') != "")
        {
            $file       = $request->file('foto_produk');
            $namaFoto = pathinfo($file->getClientOriginalName());
            $fileName   = str_slug($request['nama_produk'], '_') . "_" . str_random(8). "." . $namaFoto['extension'];
            $request->file('foto_produk')->move("images/katalog/", $fileName);
            $update->foto_produk = $fileName;
        } 
        else
        {
            $update->foto_produk = $update->foto_produk;
        }
        
        $update->update();

        
        DB::table('katalog_kategori')->where('katalog_id', $id)->delete();

        $kategori = Kategori::find($checkboxValue);
        $update->categories()->attach($kategori);


        return redirect('admin/katalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Katalog::find($id)->delete();

        return redirect('admin/katalog');
    }
}

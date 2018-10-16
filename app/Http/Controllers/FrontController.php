<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Katalog;
use App\Kategori;

class FrontController extends Controller
{
    public function tampilKatalog() {
        
        // $data = DB::table('katalog')
        //     ->orderBy('id', 'asc')
        //     ->get();
        // return view('katalog', ['katalog' => $data]);

        $data = Katalog::with('categories')->get();

        return view('katalog', ['katalog' => $data]);
    }
    
    public function tampilKatalogDetail(Katalog $katalog)
    {
        
        return view('katalog-detail', compact('katalog'));
    }

    public function cariKategori($id){
        
        $cat = Kategori::find($id);

        $kategoris = $cat->katalogs;
        
        return view('cari-kategori', ['kategoris' => $kategoris]);


    }

    public function cariKategoriForm(Request $request){
        $kat = $request['catID'];
        $cat = Kategori::find($kat);

        $kategoris = $cat->katalogs;
        
        return view('cari-kategori', ['kategoris' => $kategoris]);
    }

}

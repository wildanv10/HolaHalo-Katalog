@extends('templates.index')
@section('content')

<div class="row mt-5">
    <div class="col-md-12">
        <div class="row mb-4">
            <form method="POST" action="{{url('/cariKategori')}}">
            {!! csrf_field() !!}
            <select name="catID" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach(App\Kategori::all() as $kategori)
                <option value="{{$kategori->id}}" class="option">{{$kategori->nama_kategori}}</option>
                @endforeach
            </select>
            <button id="btnCari" type="submit">Cari</button>  
            </form>
        </div>
        <div class="row">
            <div class="kotak-berita col-md-4 mb-3">
                <img src="{{asset('images/katalog/'.$katalog->foto_produk)}}" alt="{{$katalog->nama_produk}}">
                <div class="keterangan-berita">
                    <div class="tag-berita">
                        Rp. xxx.xxx
                    </div>
                    <div class="judul-berita">
                        {{$katalog->nama_produk}}
                    </div>
                    <div class="meta-berita">
                        <i class="admin-berita">
                            @foreach($katalog->categories as $kategori)
                                <a href="#"> {{$kategori->nama_kategori}}</a>
                                ,
                            @endforeach
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
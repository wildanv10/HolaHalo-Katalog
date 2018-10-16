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
            @foreach($kategoris as $data)
            <div class="kotak-berita col-md-4 mb-3">
                <img src="{{asset('images/katalog/'.$data->foto_produk)}}" alt="$data->nama_produk">
                <div class="keterangan-berita">
                    <div class="tag-berita">
                        Rp. xxx.xxx
                    </div>
                    <div class="judul-berita">
                        <a href="{{ url('katalog/'.$data->id) }}"> {{$data->nama_produk}} </a>
                    </div>
                    <div class="meta-berita">
                        <i class="admin-berita">
                            @foreach($data->categories as $kategori)
                                <a href="{{url('kategori/'.$kategori->id)}}"> {{$kategori->nama_kategori}}</a>
                                ,
                            @endforeach
                        </i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
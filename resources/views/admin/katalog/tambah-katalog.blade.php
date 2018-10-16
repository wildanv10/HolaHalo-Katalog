@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Tambah Produk
    </div>
    <div class="card-body">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          
          <form action="{{ url('admin/katalog') }}" method="POST" enctype="multipart/form-data">

          {!! csrf_field() !!}

          <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Nama Model</label>
              <input type="text" name="model_produk" class="form-control" required>
          </div>

          <div class="form-group">
              <label>Foto Produk</label>
              <input type="file" id="inputgambar" name="foto_produk" class="validate form-control" accept="image/*"  required>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <br>
            @foreach($kategori as $data)
            <label class="checkbox-inline m-2"><input type="checkbox" value="{{$data->id}}" name="check_kategori[]">{{$data->nama_kategori}}</label>
            @endforeach
          </div>

          <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>

            <a href="{{ url('admin/katalog') }} "> <button class="btn btn-link float-right">Batal</button></a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

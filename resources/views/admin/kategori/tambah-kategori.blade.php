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
          
          <form action="{{ url('admin/kategori') }}" method="POST" enctype="multipart/form-data">

          {!! csrf_field() !!}

          <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="nama_kategori" class="form-control" required autofocus>
          </div>

          <button type="submit" class="btn btn-primary float-right">Submit</button>

          </form>

            <a href="{{ url('admin/kategori') }} "> <button class="btn btn-link float-right">Batal</button></a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Ubah Produk
    </div>
    <div class="card-body">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          
        <form action="{{ url('admin/katalog/'.$produk->id) }}" method="post" enctype="multipart/form-data">
          <div class="row">
          
            <div class="col-md-4">
              <div class="form-group">
                <img class="card-img-top" src="{{ asset('images/katalog/'.$produk->foto_produk)  }}">
              </div>
            </div>

            <div class="col-md-8">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
                  
              <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama_produk" value="{{$produk->nama_produk}}" class="form-control" required>
              </div>
                  
              <div class="form-group">
                  <label>Model Produk</label>
                  <input type="text" name="model_produk" value="{{$produk->model_produk}}" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" id="inputgambar" name="foto_produk" accept="image/*" class="validate form-control">
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <br>
                
                @foreach(App\Kategori::all() as $data)
                  <label class="checkbox-inline m-2"><input type="checkbox" value="{{$data->id}}" name="check_kategori[]"
                    <?php
                    foreach($kat as $kategori){
                      if($kategori->id == $data->id){
                        echo "checked";
                      }
                    }
                      
                    ?>
                  >
                    {{$data->nama_kategori}}
                  </label>
                @endforeach

              </div>
            </div>
          </div>
      
          <button type="submit" class="btn btn-outline-primary float-right">Ubah</button>
        </form>

          <a href="{{ url('admin/katalog') }} "> <button class="btn btn-link float-right">Batal</button></a>

        <!-- Hapus Button -->
        <form action=" {{url('admin/katalog/'.$produk->id) }} " method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
                      
          <!-- Memanggil Modal-->
          <a data-toggle="modal" data-target="#modalHapus">
            <button type="button" class="btn btn-outline-danger">
              <i class="fa fa-trash fa-lg"></i>
              Hapus
            </button>
          </a>

          <!-- Logout Modal-->
          <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Produk?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Akan Menghapus Produk Ini?</div>
                <div class="modal-footer">
                  <button class="btn btn-link" type="button" data-dismiss="modal">Batal</button>
                    <!-- Button Hapusnya Disini-->
                  <button type="submit" class="btn btn-danger">
                    Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
        
        <!-- Hapus Button Sampe Sini -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

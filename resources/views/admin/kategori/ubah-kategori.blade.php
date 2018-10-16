@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Ubah Kategori
    </div>
    <div class="card-body">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          
        <form action="{{ url('admin/kategori/'.$kategori->id) }}" method="post" enctype="multipart/form-data">
          <div class="row">

            <div class="col-md-12">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
                  
              <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control" required>
              </div>
            </div>
          </div>
      
          <button type="submit" class="btn btn-outline-primary float-right">Ubah</button>
        </form>

          <a href="{{ url('admin/kategori') }} "> <button class="btn btn-link float-right">Batal</button></a>

        <!-- Hapus Button -->
        <form action=" {{url('admin/kategori/'.$kategori->id) }} " method="post">
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
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Akan Menghapus Kategori Ini?</div>
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

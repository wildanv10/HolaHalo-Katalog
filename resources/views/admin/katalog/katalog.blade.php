@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3">
                <a href=" {{url('admin/katalog/create')}} "> <button type="button" class="btn btn-primary btn-lg">Tambah Produk</button></a>
            </div>
            <div class="card">
                <div class="card-header">Katalog</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <th>
                            <td>Nama Produk</td>
                            <td>Model Produk</td>
                            <td>Kategori</td>
                            <td></td>
                        </th>
                        
                        <?php $no = 1; ?>
                        @foreach($katalog as $data)
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>{{$data->nama_produk}}</td>
                            <td>{{$data->model_produk}}</td>
                            <td>
                                <?php $nokat = 1;?>
                                @foreach($data->categories as $kategori)
                                    {{$kategori->nama_kategori}}, 
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('admin/katalog/'.$data->id.'/edit') }}">
                                    Ubah
                                </a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </table>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection

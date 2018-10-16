@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href=" {{url('admin/kategori/create')}} "> <button type="button" class="btn btn-primary btn-lg">Tambah Kategori</button></a>
            </div>
            <div class="card">
                <div class="card-header">Kategori</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <th>
                            <td>Nama Kategori</td>
                            <td></td>
                        </th>
                        
                        <?php $no = 1; ?>
                        @foreach($kategori as $data)
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>{{$data->nama_kategori}}</td>
                            <td>
                                <a href="{{ url('admin/kategori/'.$data->id.'/edit') }}">
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

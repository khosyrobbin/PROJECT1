@extends('layout.template')
@section('title','Skripsi')

@section('content')
    <a href="/skripsi/add" class="btn btn-sm btn-info">Tambah</a><br>
    <table class="table table-bordered">
        <thead>
            <th>NO</th>
            <th>JUDUL</th>
            <th>ABSTRAK</th>
            <th>FILE</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($skripsi as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->abstrak }}</td>
                    <td><img src="{{ url('file_skripsi/'.$data->file) }}" width="100px"></td>
                    <td>
                        <a href="/skripsi/detail/{{ $data->id_skripsi }}" class="btn btn-sm btn-warning">DETAIL</a>
                        <a href="" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="" class="btn btn-sm btn-danger">DELETE</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

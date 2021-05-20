@extends('layout.template')
@section('title','Mahasiswa')

@section('content')
    <a href="/mahasiswa/add" class="btn btn-sm btn-info">Tambah</a><br>
    <table class="table table-bordered">
        <thead>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>JURUSAN</th>
            <th>NO TELPON</th>
            <th>FOTO</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($mahasiswa as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->no_telpon }}</td>
                    <td><img src="{{ url('foto_mhs/'.$data->foto) }}" width="100px"></td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="" class="btn btn-sm btn-danger">DELETE</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

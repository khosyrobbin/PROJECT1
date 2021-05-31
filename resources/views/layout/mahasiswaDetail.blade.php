@extends('layout.template')
@section('title','Detail Mahasiswa')

@section('content')

    <div>
        <table class="table">
            <tr>
                <th><img src="{{url('foto_mhs/'.$mahasiswa->foto)}}" width="150px"></th>
            </tr>
            <tr>
                <th width="100px">NIM</th>
                <th width="30px">:</th>
                <th>{{$mahasiswa->nim}}</th>
            </tr>
            <tr>
                <th width="100px">Nama</th>
                <th width="30px">:</th>
                <th>{{$mahasiswa->nama}}</th>
            </tr>
            <tr>
                <th width="100px">Jurusan</th>
                <th width="30px">:</th>
                <th>{{$mahasiswa->jurusan}}</th>
            </tr>
            <tr>
                <th width="100px">No Telepon</th>
                <th width="30px">:</th>
                <th>{{$mahasiswa->no_telpon}}</th>
            </tr>
            <tr>
                <th width="100px">Angkatan</th>
                <th width="30px">:</th>
                <th>{{$mahasiswa->angkatan}}</th>
            </tr>
            <th>
                <a href="/mahasiswa" class="btn btn-success tbn-sm">Kembali</a>
            </th>
        </table>
    </div>

@endsection

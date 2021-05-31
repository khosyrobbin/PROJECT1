@extends('layout.template')
@section('title','Detail Dosen')

@section('content')

    <div>
        <table class="table">
            <tr>
                <th><img src="{{url('foto_dosen/'.$dosen->foto)}}" width="150px"></th>
            </tr>
            <tr>
                <th width="100px">NIP</th>
                <th width="30px">:</th>
                <th>{{$dosen->nip}}</th>
            </tr>
            <tr>
                <th width="100px">Nama</th>
                <th width="30px">:</th>
                <th>{{$dosen->nama_dosen}}</th>
            </tr>
            <tr>
                <th width="100px">Jurusan</th>
                <th width="30px">:</th>
                <th>{{$dosen->jurusan}}</th>
            </tr>
            <tr>
                <th width="100px">No Telepon</th>
                <th width="30px">:</th>
                <th>{{$dosen->no_telpon}}</th>
            </tr>
            <tr>
                <th width="100px">Pendidikan</th>
                <th width="30px">:</th>
                <th>{{$dosen->pendidikan}}</th>
            </tr>
            <th>
                <a href="/dosen" class="btn btn-success tbn-sm">Kembali</a>
            </th>
        </table>
    </div>

@endsection

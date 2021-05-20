@extends('layout.template')
@section('title','Detail Skripsi')

@section('content')
    <div>
        <table class="table">
            <tr>
                <th width="100px">Judul</th>
                <th width="30px">:</th>
                <th>{{$skripsi->judul}}</th>
            </tr>
            <tr>
                <th width="100px">Abstrak</th>
                <th width="30px">:</th>
                <th>{{$skripsi->abstrak}}</th>
            </tr>
            <tr>
                <th width="100px">File</th>
                <th width="30px">:</th>
                <th><embed src="{{url('file_skripsi/'.$skripsi->file)}}" width="800px" height="500px"></th>
            </tr>
            <th>
                <a href="/skripsi" class="btn btn-success tbn-sm">Kembali</a>
            </th>
        </table>
    </div>
@endsection

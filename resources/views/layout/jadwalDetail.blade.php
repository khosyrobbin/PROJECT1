@extends('layout.template')
@section('title','Detail Jadwal')

@section('content')

    <div>
        <table class="table">
            <tr>
                <th width="100px">Hari</th>
                <th width="30px">:</th>
                <th>{{$jadwal->hari}}</th>
            </tr>
            <tr>
                <th width="100px">Tanggal</th>
                <th width="30px">:</th>
                <th>{{$jadwal->tanggal}}</th>
            </tr>
            <tr>
                <th width="100px">Waktu</th>
                <th width="30px">:</th>
                <th>{{$jadwal->waktu}}</th>
            </tr>
            <tr>
                <th width="100px">Ruangan</th>
                <th width="30px">:</th>
                <th>{{$jadwal->ruangan}}</th>
            </tr>
            <th>
                <a href="/jadwal" class="btn btn-success tbn-sm">Kembali</a>
            </th>
        </table>
    </div>

@endsection

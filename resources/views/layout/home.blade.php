@extends('layout.template')
@section('title','Home')

@section('content')

    @if (auth()->user()->level==1)
        {{-- Admin --}}
    @else

    @endif
    <h1>SELAMAT DATANG</h1>
    <h3>Nama            :  {{ Auth::user()->nama_lengkap }}</h3>
    <h3>Email           :  {{ Auth::user()->email }}</h3>
    <h3>
        @if (auth()->user()->level==1)
        Level           : Admin
        @elseif (auth()->user()->level==2)
        NIM             :  {{ Auth::user()->nim }} <br><br>
        Level           : Mahasiswa
        @elseif (auth()->user()->level==3)
        Level           : Dosen
        @endif
    </h3>
@endsection

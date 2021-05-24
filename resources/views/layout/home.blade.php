@extends('layout.template')
@section('title','Home')

@section('content')
    <h1>SELAMAT DATANG</h1>
    <h3>NIM             :  {{ Auth::user()->nim }}</h3>
    <h3>Nama            :  {{ Auth::user()->nama_lengkap }}</h3>
    <h3>Email           :  {{ Auth::user()->email }}</h3>
    <h3>Program Studi   :  {{ Auth::user()->prostud }}</h3>
@endsection

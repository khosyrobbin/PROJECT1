@extends('layout.template')
@section('title','Bimbingan')

@section('content')
<form action="/bimbingan/simpan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content" style="height:600px">
        <div class="rows">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control @error('nip') is-invalid @enderror">
                    {{-- <select name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror">
                        <option value="">--PILIH NIP--</option>
                        @foreach ($bimbingan as $item)
                            <option value="{{$item->nip}}">{{$item->nama_dosen}}</option>
                        @endforeach
                    </select> --}}
                    <div class="text-danger">
                        @error('nip')
                            NIP Salah/Kosong
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>NIM</label>
                    {{-- <input name="nim" class="form-control @error('nim') is-invalid @enderror"> --}}
                    <select name="nim" id="nim" class="form-control" @error('nim') is-invalid @enderror">
                        <option value="">--PILIH NIM--</option>
                        @foreach ($bimbingan as $data)
                            <option value="{{$data->nim}}">{{$data->nim}}-{{$data->nama}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                        @error('nim')
                            NIM Salah/Kosong
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label>NAMA MAHASISWA</label>
                    <input name="nama" class="form-control @error('nama') is-invalid @enderror">
                    <div class="text-danger">
                        @error('nama')
                            NAMA Salah/Kosong
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date">
                    <div class="text-danger">
                        @error('tanggal')
                            tanggal Salah/Kosong
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                    <div class="text-danger">
                        @error('keterangan')
                            Keterangan Salah/Kosong
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection

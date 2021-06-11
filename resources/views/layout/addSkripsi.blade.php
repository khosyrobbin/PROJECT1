@extends('layout.template')
@section('title','Skripsi')

@section('content')
    <form action="/skripsi/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIM</label>
                        <input name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ Auth::user()->nim }}" readonly>
                        {{-- <select name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror">
                            <option value="1941720011">1941720011</option>
                            @foreach ($mahasiswa as $data)
                                <option value="{{$data->nim}}">{{$data->nama}} - {{$data->nim}}</option>
                            @endforeach
                        </select> --}}
                        <div class="text-danger">
                            @error('nim')
                                NIM Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" class="form-control @error('judul') is-invalid @enderror">
                        <div class="text-danger">
                            @error('judul')
                                Judul Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Abstrak</label>
                        <input name="abstrak" class="form-control @error('abstrak') is-invalid @enderror">
                        <div class="text-danger">
                            @error('abstrak')
                                Abstrak Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                        <div class="text-danger">
                            @error('file')
                                File Salah/Kosong
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

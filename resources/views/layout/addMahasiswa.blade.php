@extends('layout.template')
@section('title','Tambah Mahasiswa')

@section('content')
    <form action="/mahasiswa/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIM</label>
                        <input name="nim" class="form-control @error('nim') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nim')
                                NIM Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input name="nama" class="form-control @error('nama') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama')
                                Nama Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <input name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                        <div class="text-danger">
                            @error('jurusan')
                                Jurusan Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input name="no_telpon" class="form-control @error('no_telpon') is-invalid @enderror">
                        <div class="text-danger">
                            @error('no_telpon')
                                No Telepon Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Angkatan</label>
                        <input name="angkatan" class="form-control @error('angkatan') is-invalid @enderror">
                        <div class="text-danger">
                            @error('angkatan')
                                Angkatan Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto Mahasiswa</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        <div class="text-danger">
                            @error('foto')
                                Foto Salah/Kosong
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

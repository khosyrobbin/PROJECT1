@extends('layout.template')
@section('title','Tambah Dosen')

@section('content')
    <form action="/dosen/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIP</label>
                        <input name="nip" class="form-control @error('nip') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nip')
                                NIP Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama_dosen')
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
                        <label>Pendidikan</label>
                        <input name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                        <div class="text-danger">
                            @error('pendidikan')
                                Pendidikan Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto Guru</label>
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

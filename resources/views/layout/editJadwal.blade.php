@extends('layout.template')
@section('title','Edit Jadwal')

@section('content')
    <form action="/jadwal/update/{{$jadwal->id_jadwal}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Hari</label>
                        <input name="hari" class="form-control @error('hari') is-invalid @enderror" value="{{$jadwal->hari}}">
                        <div class="text-danger">
                            @error('hari')
                                Hari Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$jadwal->tanggal}}">
                        <div class="text-danger">
                            @error('tanggal')
                                Tanggal Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{$jadwal->waktu}}">
                        <div class="text-danger">
                            @error('waktu')
                                Waktu Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ruangan</label>
                        <input type="ruangan" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" value="{{$jadwal->ruangan}}">
                        <div class="text-danger">
                            @error('ruangan')
                                Ruangan Salah/Kosong
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

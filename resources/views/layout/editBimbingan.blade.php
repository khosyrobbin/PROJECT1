@extends('layout.template')
@section('title','Edit Bimbingan')

@section('content')
    <form action="/bimbingan/update/{{$bimbingan->id_bimbingan}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">

                    {{-- <div class="form-group">
                        <label>NIP</label>
                        <input name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{$bimbingan->nip}}" readonly>
                        <select name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror">
                            @foreach ($dosen as $d)
                                <option value="{{$d->nip}}" @if ($bimbingan->nip==$d->nip)
                                    selected = 'selected'
                                @endif>{{$d->nama_dosen}}-{{$d->nip}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('nip')
                                NIP Salah/Kosong
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="form-group">
                        <label>NIM</label>
                        <input name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{$bimbingan->nim}}" readonly>
                        <select name="nim" id="nim" class="form-control" @error('nim') is-invalid @enderror">
                            @foreach ($mahasiswa as $mhs)
                                <option value="{{$mhs->nim}}" @if ($bimbingan->nim==$mhs->nim)
                                    selected = 'selected'
                                @endif>{{$mhs->nama}}-{{$mhs->nim}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('nim')
                                NIM Salah/Kosong
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date" min="2021-06-11" value="{{$bimbingan->tanggal}}">
                        <div class="text-danger">
                            @error('tanggal')
                                tanggal Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{$bimbingan->keterangan}}">
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

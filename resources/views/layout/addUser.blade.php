@extends('layout.template')
@section('title','User')

@section('content')
    <form action="/user/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>email</label>
                        <input name="email" class="form-control @error('email') is-invalid @enderror">
                        <div class="text-danger">
                            @error('email')
                                email Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="name" class="form-control @error('name') is-invalid @enderror">
                        <div class="text-danger">
                            @error('name')
                                Username Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" class="form-control @error('password') is-invalid @enderror">
                        <div class="text-danger">
                            @error('password')
                                Password Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                            <option value="">--PILIH LEVEL--</option>
                            <option value="1">Admin</option>
                            <option value="2">Mahasiswa</option>
                            <option value="3">Dosen</option>
                        </select>
                        <div class="text-danger">
                            @error('level')
                                Level Salah/Kosong
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

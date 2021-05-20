@extends('layout.template')
@section('title','Dosen')

@section('content')
    {{-- PESAN --}}
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
            {{session('pesan')}}.
        </div>
    @endif
    <a href="/dosen/add" class="btn btn-sm btn-info">Tambah</a><br>
    
    {{-- search --}}
    <p>Cari dosen :</p>
    <form action="/dosen/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Dosen .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead>
                <th>NO</th>
                <th>NIP</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>PENDIDIKAN</th>
                <th>NO TELPON</th>
                <th>FOTO</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($dosen as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama_dosen }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td>{{ $data->pendidikan }}</td>
                        <td>{{ $data->no_telpon }}</td>
                        <td><img src="{{ url('foto_dosen/'.$data->foto) }}" width="100px"></td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="" class="btn btn-sm btn-danger">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

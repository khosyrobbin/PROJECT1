@extends('layout.template')
@section('title','Bimbingan')

@section('content')
    {{-- PESAN --}}
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
            {{session('pesan')}}.
        </div>
    @endif
    <a href="/bimbingan/add" class="btn btn-sm btn-info">Tambah</a><br>

    {{-- search --}}
    <p>Cari Bimbingan :</p>
    <form action="/bimbingan/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Bimbingan .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <nav class="box-body">
        <table class="table table-striped table-hover">
            <thead>
                <th>NO</th>
                <th>NAMA DOSEN</th>
                <th>NAMA MAHASISWA</th>
                <th>TANGGAL</th>
                <th>KETERANGAN</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($bimbingan as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_dosen }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <a href="/bimbingan/edit/{{ $data->id_bimbingan }}" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="" class="btn btn-sm btn-danger">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        Halaman : {{ $bimbingan->currentPage() }} <br/>
        Jumlah Data : {{ $bimbingan->total() }} <br/>
        {{ $bimbingan->links() }}
    </nav>
@endsection

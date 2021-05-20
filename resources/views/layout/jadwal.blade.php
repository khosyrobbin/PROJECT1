@extends('layout.template')
@section('title','Jadwal')

@section('content')
    {{-- PESAN --}}
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
            {{session('pesan')}}.
        </div>
    @endif
    <a href="/jadwal/add" class="btn btn-sm btn-info">Tambah</a><br>

    {{-- search --}}
    <p>Cari Jadwal :</p>
    <form action="/jadwal/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Jadwal .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead>
                <th>NO</th>
                <th>HARI</th>
                <th>TANGGAL</th>
                <th>WAKTU</th>
                <th>RUANGAN</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($jadwal as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->hari }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->waktu }}</td>
                        <td>{{ $data->ruangan }}</td>
                        <td>
                            <a href="/jadwal/edit/{{ $data->id_jadwal }}" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="" class="btn btn-sm btn-danger">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        Halaman : {{ $jadwal->currentPage() }} <br/>
        Jumlah Data : {{ $jadwal->total() }} <br/>
        {{ $jadwal->links() }}
    </div>
@endsection

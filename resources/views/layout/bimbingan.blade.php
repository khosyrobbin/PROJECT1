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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_bimbingan }}">
                                DELETE
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            {{-- delete notif --}}
    @foreach ($bimbingan as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_bimbingan }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERINGATAN!!</h4>
              </div>
              <div class="modal-body">
                <p>Yakin menghapus data {{ $data->id_bimbingan }} ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <a href="/bimbingan/delete/{{ $data->id_bimbingan }}" class="btn btn-outline">YES</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    @endforeach

        <br/>
        Halaman : {{ $bimbingan->currentPage() }} <br/>
        Jumlah Data : {{ $bimbingan->total() }} <br/>
        {{ $bimbingan->links() }}
    </nav>
@endsection

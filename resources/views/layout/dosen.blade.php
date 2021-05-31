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
    <td>
        @if (auth()->user()->level==1)
        <a href="/dosen/add" class="btn btn-sm btn-info">Tambah</a><br>
        @endif
    </td>

    {{-- search --}}
    <p>Cari dosen :</p>
    <form action="/dosen/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Dosen .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <th>NO</th>
                <th>NIP</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>PENDIDIKAN</th>
                <th>NO TELPON</th>
                <th>FOTO</th>
                <th>ACTION</th>
            </thead>
            <tbody class="table">
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
                            <a href="/dosen/detail/{{ $data->nip }}" class="btn btn-sm btn-warning">DETAIL</a>

                            @if (auth()->user()->level==1)
                                <a href="/dosen/edit/{{ $data->nip }}" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->nip }}">
                                    DELETE
                                </button>
                            @elseif (auth()->user()->level==2)
                            @elseif (auth()->user()->level==3)
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- delete notif --}}
    @foreach ($dosen as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->nip }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERINGATAN!!</h4>
              </div>
              <div class="modal-body">
                <p>Yakin menghapus data {{ $data->nama_dosen }} ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <a href="/dosen/delete/{{ $data->nip }}" class="btn btn-outline">YES</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    @endforeach

        <br/>
        Halaman : {{ $dosen->currentPage() }} <br/>
        Jumlah Data : {{ $dosen->total() }} <br/>
        {{ $dosen->links() }}
    </div>
@endsection

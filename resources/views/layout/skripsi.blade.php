@extends('layout.template')
@section('title','Skripsi')

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

        @elseif (auth()->user()->level==2)
            <a href="/skripsi/add" class="btn btn-sm btn-info">Tambah</a><br>
        @elseif (auth()->user()->level==3)

        @endif
    </td>

    {{-- search --}}
    <p>Cari Skripsi :</p>
    <form action="/skripsi/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Skripsi .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <th>NO</th>
                <th>NAMA</th>
                <th>JUDUL</th>
                <th>ABSTRAK</th>
                <th>FILE</th>
                <th>ACTION</th>
            </thead>
            <tbody class="table">
                <?php $no=1; ?>
                @foreach ($skripsi as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->abstrak }}</td>
                        <td>{{ $data->file }}</td>
                        <td>
                            <a href="/skripsi/detail/{{ $data->id_skripsi }}" class="btn btn-sm btn-warning">DETAIL</a>

                            @if (auth()->user()->level==1)
                                <a href="/skripsi/edit/{{ $data->id_skripsi }}" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_skripsi }}">
                                    DELETE
                                </button>
                            @elseif (auth()->user()->level==2)
                                <a href="/skripsi/edit/{{ $data->id_skripsi }}" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_skripsi }}">
                                    DELETE
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            {{-- delete notif --}}
    @foreach ($skripsi as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_skripsi }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERINGATAN!!</h4>
              </div>
              <div class="modal-body">
                <p>Yakin menghapus data {{ $data->judul }} ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <a href="/skripsi/delete/{{ $data->id_skripsi }}" class="btn btn-outline">YES</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    @endforeach

        <br/>
        Halaman : {{ $skripsi->currentPage() }} <br/>
        Jumlah Data : {{ $skripsi->total() }} <br/>
        {{ $skripsi->links() }}
    </div>
@endsection

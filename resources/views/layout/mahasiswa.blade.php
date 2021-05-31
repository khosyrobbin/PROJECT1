@extends('layout.template')
@section('title','Mahasiswa')

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
            <a href="/mahasiswa/add" class="btn btn-sm btn-info">Tambah</a><br>
        @endif
    </td>

    {{-- search --}}
    <p>Cari Mahasiswa :</p>
    <form action="/mahasiswa/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Mahasiswa .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>JURUSAN</th>
                <th>NO TELPON</th>
                <th>FOTO</th>
                <th>ACTION</th>
            </thead>
            <tbody class="table">
                <?php $no=1; ?>
                @foreach ($mahasiswa as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td>{{ $data->no_telpon }}</td>
                        <td><img src="{{ url('foto_mhs/'.$data->foto) }}" width="100px"></td>
                        <td>
                            <a href="/mahasiswa/detail/{{ $data->nim }}" class="btn btn-sm btn-warning">DETAIL</a>
                            @if (auth()->user()->level==1)
                                <a href="/mahasiswa/edit/{{ $data->nim }}" class="btn btn-sm btn-primary">EDIT</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->nim }}">
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
    @foreach ($mahasiswa as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->nim }}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERINGATAN!!</h4>
              </div>
              <div class="modal-body">
                <p>Yakin menghapus data {{ $data->nama }} ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                <a href="/mahasiswa/delete/{{ $data->nim }}" class="btn btn-outline">YES</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    @endforeach

        <br/>
        Halaman : {{ $mahasiswa->currentPage() }} <br/>
        Jumlah Data : {{ $mahasiswa->total() }} <br/>
        {{ $mahasiswa->links() }}
    </div>
@endsection

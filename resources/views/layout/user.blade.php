@extends('layout.template')
@section('title','User')

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
        <a href="/user/add" class="btn btn-sm btn-info">Tambah</a><br>
    </td>


    {{-- search --}}
    <p>Cari User :</p>
    <form action="/user/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari User .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <th>NO</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>Action</th>
            </thead>
            <tbody class="table">
                <?php $no=1; ?>
                @foreach ($user as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->password}}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="" class="btn btn-sm btn-danger">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        Halaman : {{ $user->currentPage() }} <br/>
        Jumlah Data : {{ $user->total() }} <br/>
        {{ $user->links() }}
    </div>
@endsection

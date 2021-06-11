@extends('layout.template')
@section('title','Dosen Pembimbing')

@section('content')
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
        </thead>
        <tbody class="table">
            <?php $no=1; ?>
            @foreach ($bimbingan as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_dosen }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->pendidikan }}</td>
                    <td>{{ $data->no_telpon }}</td>
                    <td><img src="{{ url('foto_dosen/'.$data->foto) }}" width="100px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

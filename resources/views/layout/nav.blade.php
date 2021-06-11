<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <li class="{{request()->is('/')?'active': ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    @if (auth()->user()->level==1)
        <li class="{{request()->is('mahasiswa')?'active': ''}}"><a href="/mahasiswa"><i class="fa fa-user-circle"></i> <span>Data Mahasiswa</span></a></li>
        <li class="{{request()->is('dosen')?'active': ''}}"><a href="/dosen"><i class="fa fa-id-card"></i> <span>Data Dosen</span></a></li>
        <li class="{{request()->is('bimbingan')?'active': ''}}"><a href="/bimbingan"><i class="fa fa-book"></i> <span>Data Bimbingan</span></a></li>
        {{-- <li class="{{request()->is('tanggapan')?'active': ''}}"><a href="/tanggapan"><i class="fa fa-comments"></i> <span>Tanggapan</span></a></li> --}}
        {{-- <li class="{{request()->is('user')?'active': ''}}"><a href="/user"><i class="fa fa-user"></i> <span>User</span></a></li> --}}

    @elseif (auth()->user()->level==2)
        <li class="{{request()->is('skripsi')?'active': ''}}"><a href="/skripsi"><i class="fa fa-clipboard"></i> <span>Data Skripsi</span></a></li>
        <li class="{{request()->is('bimbingan')?'active': ''}}"><a href="/bimbingan"><i class="fa fa-book"></i> <span>Data Bimbingan</span></a></li>
        <li class="{{request()->is('jadwal')?'active': ''}}"><a href="/jadwal"><i class="fa fa-calendar"></i> <span>Data Jadwal</span></a></li>
        {{-- <li class="{{request()->is('dosbim')?'active': ''}}"><a href="/dosbim"><i class="fa fa-calendar"></i> <span>Dosen Pembimbing</span></a></li> --}}

    @elseif (auth()->user()->level==3)
        <li class="{{request()->is('bimbingan')?'active': ''}}"><a href="/bimbingan"><i class="fa fa-book"></i> <span>Data Bimbingan</span></a></li>
        <li class="{{request()->is('skripsi')?'active': ''}}"><a href="/skripsi"><i class="fa fa-clipboard"></i> <span>Data Skripsi</span></a></li>
        {{-- <li class="{{request()->is('tanggapan')?'active': ''}}"><a href="/tanggapan"><i class="fa fa-comments"></i> <span>Tanggapan</span></a></li> --}}
        <li class="{{request()->is('jadwal')?'active': ''}}"><a href="/jadwal"><i class="fa fa-calendar"></i> <span>Data Jadwal</span></a></li>
    @endif
    {{-- <li class="{{request()->is('mahasiswa')?'active': ''}}"><a href="/mahasiswa"><i class="fa fa-user-circle"></i> <span>Data Mahasiswa</span></a></li>
    <li class="{{request()->is('dosen')?'active': ''}}"><a href="/dosen"><i class="fa fa-id-card"></i> <span>Data Dosen</span></a></li>
    <li class="{{request()->is('bimbingan')?'active': ''}}"><a href="/bimbingan"><i class="fa fa-book"></i> <span>Data Bimbingan</span></a></li>
    <li class="{{request()->is('jadwal')?'active': ''}}"><a href="/jadwal"><i class="fa fa-calendar"></i> <span>Data Jadwal</span></a></li>
    <li class="{{request()->is('skripsi')?'active': ''}}"><a href="/skripsi"><i class="fa fa-clipboard"></i> <span>Data Skripsi</span></a></li>
    <li class="{{request()->is('tanggapan')?'active': ''}}"><a href="/tanggapan"><i class="fa fa-comments"></i> <span>Tanggapan</span></a></li> --}}
</ul>

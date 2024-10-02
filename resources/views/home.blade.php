@extends('template')
@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container mt-1">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
  </ol>
</nav>
<h4 class="text-center ">Data Pasien  </h4>
<h5 class="text-center">Periode Tanggal <b>{{$tglawal}}</b> s/d <b>{{$tglakhir}}</b></h5>
  
<div class="container bg-white p-3 mt-3">
  
  <form action="/home" method="post" name="periode" target="">
    @csrf
    <div class="row mb-2">
      <div class="col-lg-4">
        <input name="tglawal" type="date" value="$tglawal" id="tglawal" class="form-control " size="10">
      </div>
      <div class="col-lg-4">
        <input name="tglakhir" type="date" value="$tglakhir" id="tglakhir" class="form-control" size="10">
      </div>
      <div class="col-lg-3">
        <input type="submit" class="btn btn-success" name="btnperiode" value="tampilkan">
      </div>
    </div>
  </form>

      <!-- Button trigger modal -->

    <!-- TAble -->
    <table id="example" class="table mt-2" style="width:100%">
      <thead>
          
              <th>No. Pasien</th>
              <th>Nama</th>
              <th>Tgl Lahir</th>
              <th>Alamat</th>
              <th>Tgl Kunjungan</th>
              <th>Opsi</th>
          
         
      </thead>
      <tbody>
        @foreach ($pasien as $user)
        <tr>
          <td> {{ $user->no_pasien }}</td>
          <td> {{ $user->nama }}</td>
          <td> {{ $user->tgl_lahir }}</td>
          <td> {{ $user->alamat }}</td>
          <td> {{ $user->tgl_kunjungan }}</td>
          <td><a name="" id="" class="btn btn-success" href="/diagnosa/{{ $user->no_trans }}" role="button"><i class="fas fa-pencil-alt    "></i></a>
            <a name="" id="" class="btn btn-warning ms-1" href="/profil/{{ $user->no_pasien }}" role="button"><i class="fas fa-address-card     "></i></a></td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    
    <a name="" id="" class="btn btn-success col-12  mt-2 update me-2 " type="submit" href="/laporan/{{ $tglawal }}/{{ $tglakhir }}" role="button">  Cetak Laporan</a>
    <p style="color:rgb(29, 150, 86);" class="text-center mt-4"><b>&copy; 2023 PUSKESMAS WELAHAN 1</b></p>
@endsection



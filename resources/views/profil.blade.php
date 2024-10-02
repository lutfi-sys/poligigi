@extends('template')
@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container mt-1">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
      <li class="breadcrumb-item"><a href="/home">Data Pasien</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
    <h6 class="text-end"><?php echo 'PASIEN '.$nopasien.' - '.$nama;?></h6> 
    <h6 class="text-end"><?php echo 'ALAMAT '.$alamat;?></h6>
    
</nav>


<div class="container bg-white p-3 mt-3">
    <ol>
      
      @foreach($trans as $pasien)
      <h5 class="text-center "> PUSKESMAS WELAHAN 1</h5>
      <h5 class="text-center ">TANGGAL {{$pasien->tgl_kunjungan}}</h5>
          <ol class="fw-bold" type="A">
            <li >IDENTITAS PASIEN</li>
            <table>
                
                    <tr><td class="fw-normal"> NAMA </td><td class="fw-normal"> : {{ $pasien->nama }}</td></tr>
                    <tr><td class="fw-normal">KEPALA KK </td><td class="fw-normal"> : {{ $pasien->kepala_kk }}</td></tr>
                    <tr><td class="fw-normal">NO PASIEN </td><td class="fw-normal"> : {{ $pasien->no_pasien }}</td></tr>
                    <tr><td class="fw-normal">TANGGAL LAHIR </td><td class="fw-normal"> : {{ $pasien->tgl_lahir }}</td></tr>
                    <tr><td class="fw-normal">ALAMAT </td><td class="fw-normal"> : {{ $pasien->alamat }}</td></tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    
            </table>
        
            <li>ANAMNESI</li>
            <table>
              <tr><td class="fw-normal">SUHU TUBUH</td><td class="fw-normal"> : {{ $pasien->suhu }}</td></tr>
              <tr><td class="fw-normal">BERAT BADAN</td><td class="fw-normal"> : {{ $pasien->bb }}</td></tr>
              <tr><td class="fw-normal">TENSI DARAH</td><td class="fw-normal"> : {{ $pasien->tensi }}</td></tr>
              <tr><td></td><td></td><td></td><td></td></tr>

            </table>
            
            <li>HASIL </li>
            <table>
              <tr><td class="fw-normal">DIAGNOSA</td><td class="fw-normal"> : {{ $pasien->diagnosa }}</td></tr>
              <tr><td class="fw-normal">OBAT</td><td class="fw-normal"> : {{ $pasien->obat }}</td></tr>
              <tr><td></td><td></td><td></td><td></td></tr>
          
            </table>
            
        </ol>
        <a name="" id="" class="btn btn-success col-12  mt-2 update fas fa-address-card me-2 " type="submit" href="/pdf/{{ $pasien->no_trans }}" role="button">  Cetak</a>
      <hr>
      @endforeach
    </ol> 
</div>
<div class="container bg-light p-1 ">
  <tbody>
    <div class="row">
      <div class="col-8 text-center mt-1">
        <h6 style="color:rgb(25, 111, 65);">Cetak Riwayat Kunjungan Pasien -------------------------------------></h6>
      </div>
      <div class="col-4" >
        <a name="" id="" class="btn btn-success mt col-10  update  " type="submit" href="/riwayat/{{ $pasien->no_pasien }}" role="button">  Riwayat Kunjungan</a>
      </div>
      
    </div>
  </tbody>

</div>
<p style="color:rgb(29, 150, 86);" class="text-center mt-4"><b>&copy; 2023 PUSKESMAS WELAHAN 1</b></p>
@endsection







@extends('template')
@section('content')


<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container mt-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/beranda">Home</a></li>
          <li class="breadcrumb-item"><a href="/home">Data Pasien</a></li>
          <li class="breadcrumb-item active" aria-current="page">Gejala Pasien</li>
        </ol>
       
        <h6 class="text-end"><?php echo 'Pasien '.$no_pasien.' - '.$nama;?></h6> 
        <h6 class="text-end"><?php echo 'Alamat '.$alamat;?></h6>  
        
      </nav>
     

      <div class="container bg-white p-3 mt-3">
        <h3 class="text-center">Gejala Pasien</h5>    
      {{-- Data cekbox --}}
      <form action="{{url('cekdiagnosa')}}" method="post"><input type="hidden" value="no_pasien" name="nopasien">
        @csrf
        
      <div class="form-check"><input class="form-check-input"  type="checkbox" value="1" id="g1" name="g1" ><label class="form-check-label" for="flexCheckDefault">Nyeri Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g2" name="g2"><label class="form-check-label" for="flexCheckDefault">Pembengkakan Gusi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g3" name="g3" ><label class="form-check-label" for="flexCheckDefault">Sensitivitas Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g4" name="g4"><label class="form-check-label" for="flexCheckDefault">Abses Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g5" name="g5"><label class="form-check-label" for="flexCheckDefault">Rasa Pahit Dimulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g6" name="g6"><label class="form-check-label" for="flexCheckDefault">Perasaan Tidak Nyaman Saat Mengunyah</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g7" name="g7"><label class="form-check-label" for="flexCheckDefault">Bau Mulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g8" name="g8"><label class="form-check-label" for="flexCheckDefault">Flek Putih Pada Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g9" name="g9"><label class="form-check-label" for="flexCheckDefault">Gigi Berlubang</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g10" name="g10"><label class="form-check-label" for="flexCheckDefault">Patah atau Retak Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g11" name="g11"><label class="form-check-label" for="flexCheckDefault">Berubah Warna Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g12" name="g12"><label class="form-check-label" for="flexCheckDefault">Tidak Nyaman Saat Tidur</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g13" name="g13"><label class="form-check-label" for="flexCheckDefault">Pendarahan Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g14" name="g14"><label class="form-check-label" for="flexCheckDefault">Gusi Mundur</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g15" name="g15"><label class="form-check-label" for="flexCheckDefault">Pus Disekitar Gusi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g16" name="g16"><label class="form-check-label" for="flexCheckDefault">Nyeri Gusi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g17" name="g17"><label class="form-check-label" for="flexCheckDefault">Kelambatan Erupsi Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g18" name="g18"><label class="form-check-label" for="flexCheckDefault">Gigi Tumbuh Ditempat yang Salah</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g19" name="g19"><label class="form-check-label" for="flexCheckDefault">Gigi Tidak Terbentuk dengan Baik</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g20" name="g20"><label class="form-check-label" for="flexCheckDefault">Kista Gigi</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g21" name="g21"><label class="form-check-label" for="flexCheckDefault">Gigi yang Terputus</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g22" name="g22"><label class="form-check-label" for="flexCheckDefault">Masalah Pencernaan</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g23" name="g23"><label class="form-check-label" for="flexCheckDefault">Nyeri Ronggamulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g24" name="g24"><label class="form-check-label" for="flexCheckDefault">Masalah Berbicara</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g25" name="g25"><label class="form-check-label" for="flexCheckDefault">Perubahan Gigi Tetangga</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g26" name="g26"><label class="form-check-label" for="flexCheckDefault">Rasa Pahit Tidak Enak Dimulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g27" name="g27"><label class="form-check-label" for="flexCheckDefault">Nyeri Rahang</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g28" name="g28"><label class="form-check-label" for="flexCheckDefault">Nyeri Sendi Tempo</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g29" name="g29"><label class="form-check-label" for="flexCheckDefault">Bunyi Buka Mulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g30" name="g30"><label class="form-check-label" for="flexCheckDefault">Pembengkakan Rahang</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g31" name="g31"><label class="form-check-label" for="flexCheckDefault">Nyeri Menelan</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g32" name="g32"><label class="form-check-label" for="flexCheckDefault">Demam</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g33" name="g33"><label class="form-check-label" for="flexCheckDefault">Pembengkakan Kelenjar Ludah</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g34" name="g34"><label class="form-check-label" for="flexCheckDefault">Sulit Membuka Mulut</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g35" name="g35"><label class="form-check-label" for="flexCheckDefault">Luka Bibir</label></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="g36" name="g36"><label class="form-check-label" for="flexCheckDefault">Bentol Kecil</label></div>
      {{-- akhir checkbox --}}
      <input type="hidden" value="{{ $no_pasien }}" name="nopasien">
      
      <button class="btn btn-success col-12  mt-2 update" type="submit"><span class="me-2"><i class="fas fa-plus-circle"></i></span>Diagnosa</button>
    </form>
  </div>
    
  <p style="color:rgb(29, 150, 86);" class="text-center mt-4"><b>&copy; 2023 PUSKESMAS WELAHAN 1</b></p>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Diagnosa extends Controller
{
    //
    public function show($user)
    {
        $gejala=array('nyeri_gigi', 'pembengkakan_gusi', 'sensitivitas_gigi', 'abses_gigi', 'rasa_pahit_dimulut', 'perasaan_tnyaman_saat_mengunyah', 'bau_mulut', 'flek_putig_pdgigi', 'gigi_berlubang', 'patah_retak_gigi', 'rubah_warna_gigi', 'tnyaman_saat_tidur', 'pendarahan_gigi', 'gusi_mundur', 'pus_sekitar_gusi', 'nyeri_gusi', 'kelambatan_erupsi_gigi', 'gigi_tumbuh_tempatsalah', 'gigi_tterbenruk_denganbaik', 'kista_gigi', 'gigi_ygterputus', 'masalah_pencernaan', 'nyeri_ronggamulut', 'masalah_berbicara', 'perubahan_gigi_tetangga', 'rpahit_tenak_mulut', 'nyeri_rahang', 'nyeri_sendi_tempo', 'bunyi_buka_mulut', 'pembengkakan_rahang', 'nyeri_menelan', 'demam', 'pembengkakan_kelenjar_ludah', 'sulit_membuka_mulut', 'luka_bibir', 'bentol_kecil');
        $penyakit=array('PERIODONTITIS APIKALIS AKUT KARENA PULPA','KARIES EMAIL','PULPITIS','GUSI & JARINGAN PERIODENTAL& TULANG ALVEOLA','GANGGUAN PERKEMBANGAN DAN ERUPSI GIGI','GIGI TERBENAM','ATRISI GIGI PARAH','ANOMALI DENTO FASIAL TERMASUK MAL OKLUSI','GIGI AVULSI KARENA PENYAKIT SISTEMIK','KISTA RONGGA MULUT','PENYAKIT RAHANG LAINNYA','PENYAKIT KELENJAR LIUR','PENYAKIT BIBIR DAN MUKOSA MULUT LAINNYA','GIGI TAMBAHAN','ANOMALI DENTO FASIAL TERMASUK MAL OKLUSI','BERCAK KAPUR GIGI','GANGGUAN PERKEMBANGAN GIGI','GANGGUAN STRUKTUR GIGI BAWAAN','GANGGUAN ERUPSI GIGI','SINDROM TUMBUH GIGI','GIGI IMPAKSI','KARIES DENTIN','KARIES SEMENTUM','KARIES GIGI','KARIES GIGI LAINNYA','KARIES GIGI, UNSPESIFIK','ABRASI  GIGI','EROSI GIGI','GANGGUAN RESORPSI GIGI','ANKILOSIS GIGI','KALKULUS GIGI','DISKOLORISASI GIGI','NEKROSIS PULPA','DEGENERASI PULPA','PEMBENTUKAN JARINGAN KERAS DI PULPA ABNORMAL','PERIODONTITIS APIKAL KRONIS','ABSES PERIAPIKAL DENGAN SINUS','ABSES PERIAPIKAL TANPA SINUS','PENYAKIT JARINGAN PULPA DAN PERIAPIKAL UNSPESIFIK LAIN','RADANG GUSI KRONIS','PERIODONTITIS AKUT','PERIODONTITIS KRONIS','PERIODONTOSIS','PENYAKIT PERIODONTAL LAINNYA','PENYAKIT PERIODONTAL UNSPESIFIK','RESESI GINGIVA','PEMBESARAN GUSI','LESI GUSI DAN TULANG ALVEOLAR','MALOKLUSI GIGI','MALPOSISI GIGI','GANGGUAN SENDI TEMPOROMANDIBULA','GIGI AVULSI','ATROFI TULANG ALVEOLAR EDENTULOUS','APIKAL FENESTRASI','ABSES KELENJAR LUDAH','MUCOCELE','ABSES PERIAPIKAL','FRAKTUR GIGI','FRAKTUR MANDIBULA','DISLOKASI GIGI');
        $jtot = DB::table('data_penyakit')->count();
        
       
        $t2=array();
        $jpe=array();
        $kode=array();
        $katagejala=array();
        for($j=0;$j<sizeof($penyakit);$j++){
            $jpe[$j] = DB::table('data_penyakit')->where('diagnosa', $penyakit[$j])->count();

            // Mendapatkan kode
            $temp = DB::table('data_penyakit')
            ->join('diagnosa', 'diagnosa.uraian', '=', 'data_penyakit.diagnosa')
            ->select('diagnosa.kode')
            ->where('data_penyakit.diagnosa',$penyakit[$j])
            ->limit(1)
            ->get();
        
            foreach ($temp as $kd){
                $kode[$j]=$kd->kode;
            }
            
            for ($i=0; $i < sizeof($gejala); $i++) { 
                $gj= strval($gejala[$i]);
                $katagejala[$i]='Ya';
                $jge = DB::table('data_penyakit')->where($gj,'0')->where('diagnosa', $penyakit[$j])->count();
                $t2[$j][]=$jge;
                # code...
            }
        }
        
    //    var_dump($t2);
    //     die;
    $users = DB::table('pasien')
    ->where('no_trans', '=', $user)
    ->get();
    foreach ($users as $pasien){
        $nama=$pasien->nama;
        $nopasien=$pasien->no_trans;
        $alamat=$pasien->alamat;
    }
        return view('gejala', [
            'nama'=>$nama,
            'no_pasien'=>$nopasien,
            'alamat'=>$alamat,



            'jumlah' => $jtot,
            'jpenyakit'=>$jpe,
            'penyakit'=>$penyakit,
            'kode'=>$kode,
            'gejala'=>$gejala,
            't2'=>$t2,
            'katagejala'=>$katagejala,
        ]);
    }


    public function cek(Request $request)
    {
        // RedirectResponse
        
        // $g3=$request->g3;
       
        $gejala=array('nyeri_gigi', 'pembengkakan_gusi', 'sensitivitas_gigi', 'abses_gigi', 'rasa_pahit_dimulut', 'perasaan_tnyaman_saat_mengunyah', 'bau_mulut', 'flek_putig_pdgigi', 'gigi_berlubang', 'patah_retak_gigi', 'rubah_warna_gigi', 'tnyaman_saat_tidur', 'pendarahan_gigi', 'gusi_mundur', 'pus_sekitar_gusi', 'nyeri_gusi', 'kelambatan_erupsi_gigi', 'gigi_tumbuh_tempatsalah', 'gigi_tterbenruk_denganbaik', 'kista_gigi', 'gigi_ygterputus', 'masalah_pencernaan', 'nyeri_ronggamulut', 'masalah_berbicara', 'perubahan_gigi_tetangga', 'rpahit_tenak_mulut', 'nyeri_rahang', 'nyeri_sendi_tempo', 'bunyi_buka_mulut', 'pembengkakan_rahang', 'nyeri_menelan', 'demam', 'pembengkakan_kelenjar_ludah', 'sulit_membuka_mulut', 'luka_bibir', 'bentol_kecil');
        $penyakit=array('PERIODONTITIS APIKALIS AKUT KARENA PULPA','KARIES EMAIL','PULPITIS','GUSI & JARINGAN PERIODENTAL& TULANG ALVEOLA','GANGGUAN PERKEMBANGAN DAN ERUPSI GIGI','GIGI TERBENAM','ATRISI GIGI PARAH','ANOMALI DENTO FASIAL TERMASUK MAL OKLUSI','GIGI AVULSI KARENA PENYAKIT SISTEMIK','KISTA RONGGA MULUT','PENYAKIT RAHANG LAINNYA','PENYAKIT KELENJAR LIUR','PENYAKIT BIBIR DAN MUKOSA MULUT LAINNYA','GIGI TAMBAHAN','ANOMALI DENTO FASIAL TERMASUK MAL OKLUSI','BERCAK KAPUR GIGI','GANGGUAN PERKEMBANGAN GIGI','GANGGUAN STRUKTUR GIGI BAWAAN','GANGGUAN ERUPSI GIGI','SINDROM TUMBUH GIGI','GIGI IMPAKSI','KARIES DENTIN','KARIES SEMENTUM','KARIES GIGI','KARIES GIGI LAINNYA','KARIES GIGI, UNSPESIFIK','ABRASI  GIGI','EROSI GIGI','GANGGUAN RESORPSI GIGI','ANKILOSIS GIGI','KALKULUS GIGI','DISKOLORISASI GIGI','NEKROSIS PULPA','DEGENERASI PULPA','PEMBENTUKAN JARINGAN KERAS DI PULPA ABNORMAL','PERIODONTITIS APIKAL KRONIS','ABSES PERIAPIKAL DENGAN SINUS','ABSES PERIAPIKAL TANPA SINUS','PENYAKIT JARINGAN PULPA DAN PERIAPIKAL UNSPESIFIK LAIN','RADANG GUSI KRONIS','PERIODONTITIS AKUT','PERIODONTITIS KRONIS','PERIODONTOSIS','PENYAKIT PERIODONTAL LAINNYA','PENYAKIT PERIODONTAL UNSPESIFIK','RESESI GINGIVA','PEMBESARAN GUSI','LESI GUSI DAN TULANG ALVEOLAR','MALOKLUSI GIGI','MALPOSISI GIGI','GANGGUAN SENDI TEMPOROMANDIBULA','GIGI AVULSI','ATROFI TULANG ALVEOLAR EDENTULOUS','APIKAL FENESTRASI','ABSES KELENJAR LUDAH','MUCOCELE','ABSES PERIAPIKAL','FRAKTUR GIGI','FRAKTUR MANDIBULA','DISLOKASI GIGI');
        $jtot = DB::table('data_penyakit')->count();
        
       
        $t2=array();
        $jpe=array();
        $kode=array();
        $obat=array();
        $katagejala=array();
        for($j=0;$j<sizeof($penyakit);$j++){
            $jpe[$j] = DB::table('data_penyakit')->where('diagnosa', $penyakit[$j])->count();

            // Mendapatkan kode
            $temp = DB::table('data_penyakit')
            ->join('diagnosa', 'diagnosa.uraian', '=', 'data_penyakit.diagnosa')
            ->select('diagnosa.kode','diagnosa.obat')
            ->where('data_penyakit.diagnosa',$penyakit[$j])
            ->limit(1)
            ->get();
        
            foreach ($temp as $kd){
                $kode[$j]=$kd->kode;
                $obat[$j]=$kd->obat;
            }

            for ($i=0; $i < sizeof($gejala); $i++) { 
                $gj= strval($gejala[$i]);
                $cekgejala = $request->input('g'.($i+1));
                if($cekgejala!=1){
                    $cekgejala=0;
                    $katagejala[$i]='Tidak';
                }else{
                    $katagejala[$i]='Ya';
                }

                $jge = DB::table('data_penyakit')->where($gj,$cekgejala)->where('diagnosa', $penyakit[$j])->count();
                $t2[$j][]=$jge;
                # code...
            }
        }
        
        
    //    var_dump($katagejala);
    //     die;
        
        $nopasien= $request->input('nopasien');
        $users = DB::table('pasien')
        ->where('no_trans', '=', $nopasien)
        ->get();
        foreach ($users as $pasien){
            $nama=$pasien->nama;
            $nopasien=$pasien->no_trans;
            $alamat=$pasien->alamat;
        }

        return view('gejalahasil', [
            'nama'=>$nama,
            'no_pasien'=>$nopasien,
            'alamat'=>$alamat,



            'jumlah' => $jtot,
            'jpenyakit'=>$jpe,
            'penyakit'=>$penyakit,
            'kode'=>$kode,
            'obat'=>$obat,
            'gejala'=>$gejala,
            't2'=>$t2,
            'katagejala'=>$katagejala,
        ]);
    }
}


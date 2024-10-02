<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class Laporan extends Controller
{
    public function index($user) 
    {
        users = DB::table('pasien')
        ->where('no_pasien', '=', $user)
        ->get();
        foreach ($users as $pasien){
            $nama=$pasien->nama;
            $nopasien=$pasien->no_pasien;
            $alamat=$pasien->alamat;
            $tglahir=$pasien->tgl_lahir;
            $kkk=$pasien->kepala_kk;
            $suhu=$pasien->suhu;
            $bb=$pasien->bb;
            $tensi=$pasien->tensi;
            $diagnosa=$pasien->diagnosa;
            $obat=$pasien->obat;
            


        }
        $html = ' 
        
    <h3 class="text-center"></h3>

            <table>
                <tr><td><b>DKK JEPARA</b></td><td></td><td></td><b>POLI GIGI</b><td></td></tr>
                <tr><td>PUSKESMAS</td><td> : WELAHAN 1</td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                

            </table>

            <table>

                    
                    <tr><td>NAMA</td><td> : '.$nama.'</td><td>TANGGAL LAHIR</td><td> : '.$tglahir.'</td></tr>
                    <tr><td>NO PASIEN</td><td> : '.$user.'</td><td>KEPALA KK</td><td> : '.$kkk.'</td></tr>
                    <tr><td>ALAMAT</td><td> : '.$alamat.'</td><td></td></tr>
                    
                   
                
            </table>
            <table>
                    <tr><td><b>ANAMNESI</b></td><td></td><td></td><td></td></tr>
                    <tr><td>SUHU TUBUH</td><td> : '.$suhu.'</td><td>BERAT BADAN</td><td> : '.$bb.'</td></tr>
                    <tr><td>TENSI DARAH</td><td> : '.$tensi.'</td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr><td><b>HASIL DIAGNOSA :</b></td><td></td><td></td><td></td></tr>
            </table>

            <table  border="1px" >
                <tr>
                    <td><b>DIAGNOSA</b></td><td><b>OBAT</b></td>
                </tr>
                <tr>
                    <td>'.$diagnosa.'</td><td>'.$obat.'</td>
                </tr>
                
            </table>

        
              ';
        PDF::SetTitle('laporan');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('laporan.pdf');
    }
}
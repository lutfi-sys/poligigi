<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index($user) 
    {

        $users = DB::table('pasien')
        ->where('no_trans', '=', $user)
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
            $tgl_kunjungan=$pasien->tgl_kunjungan;
            


        }
        $html = ' 
        <body>
        <header>
        <table>
                <tr><td width="70px"><b><img src="image/logo pkm.jpg" class="rounded float-end" width="55px" sizes="" srcset=""></b></td><td width="250px"><b>PUSKESMAS WELAHAN 1 </b><br><b>POLI GIGI DAN MULUT</b><br><font size="9">Jln Raya Welahan - Jepara km 25 Kec. Welahan Kab. Jepara Welahan, Jawa Tengah, Indonesia</font></td></tr>

         </table>
         <hr size="5">
         </header>

         <h4 style="color:green; text-align: center;"><center> LAPORAN DIAGNOSA PASIEN</center> </h4>

            <table>
                <tr><td><b>DKK JEPARA</b></td><td></td><td></td><b>POLI GIGI</b><td></td></tr>
                <tr><td>PUSKESMAS</td><td> : WELAHAN 1</td><td></td><td></td></tr>
                <tr><td>TANGGAL </td><td> : '.$tgl_kunjungan.'</td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                
            </table>

            <table>

                    
                    <tr><td>NAMA</td><td> : '.$nama.'</td><td>TANGGAL LAHIR</td><td> : '.$tglahir.'</td></tr>
                    <tr><td>NO PASIEN</td><td> : '.$nopasien.'</td><td>KEPALA KK</td><td> : '.$kkk.'</td></tr>
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
            </body>
        
           ';
           
           PDF::setFooterCallback(function($pdf) {

            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Puskesmas Welahan 1', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });
        PDF::SetTitle('laporan');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('laporan.pdf');
    }
    public function laporan($tglawal, $tglakhir)
    {
        $html = ' 
        <table>
                <tr><td width="70px"><b><img src="image/logo pkm.jpg" class="rounded float-end" width="55px" sizes="" srcset=""></b></td><td width="250px"><b>PUSKESMAS WELAHAN 1 </b><br><b>POLI GIGI DAN MULUT</b><br><font size="9">Jln Raya Welahan - Jepara km 25 Kec. Welahan Kab. Jepara Welahan, Jawa Tengah, Indonesia</font></td></tr>

         </table>
         <hr size="5">
        <h4 style=" text-align: center;">LAPORAN PASIEN  </h4>
        <h4 style=" text-align: center;">PERIODE TANGGAL '.$tglawal.' s/d '.$tglakhir.'</h4>
            <table border="1">
                    <tr>
                        <td width="30px"><b>No</b></td>
                        <td width="70px"><b>No Pasien</b></td>
                        <td width="130px"><b>Nama</b></td>
                        <td><b>Tgl Lahir</b></td>
                        <td width="120px"><b>Alamat</b></td>
                        <td><b>Tgl Kunjungan</b></td>
                    </tr>';
        $users = DB::select('select * from pasien where tgl_kunjungan between ? and ?',[$tglawal,$tglakhir]);
        $no=0;
        foreach ($users as $pasien){
            $no++;
            $nama=$pasien->nama;
            $tgl_lahir=$pasien->tgl_lahir;
            $nopasien=$pasien->no_pasien;
            $alamat=$pasien->alamat;
            $tgl_kunjungan=$pasien->tgl_kunjungan;
            $html.='  <tr>
            <td width="30px">'.$no.'</td><td width="70px">'.$nopasien.'</td><td>'.$nama.'</td><td>'.$tgl_lahir.'</td><td>'.$alamat.'</td><td>'.$tgl_kunjungan.'</td></tr>';
        }
        $html .= '         
        </table>

           ';
           PDF::setFooterCallback(function($pdf) {

            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Puskesmas Welahan 1', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });
        PDF::SetTitle('laporan');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('laporan periode.pdf');
    }

    public function riwayat($user) 
    {
       
        $html = ' 
       
        <body>
        <table>
                <tr><td width="70px"><b><img src="image/logo pkm.jpg" class="rounded float-end" width="55px" sizes="" srcset=""></b></td><td width="250px"><b>PUSKESMAS WELAHAN 1 </b><br><b>POLI GIGI DAN MULUT</b><br><font size="9">Jln Raya Welahan - Jepara km 25 Kec. Welahan Kab. Jepara Welahan, Jawa Tengah, Indonesia</font></td></tr>

         </table>
         <hr size="5">
        <h4 style=" text-align: center;">LAPORAN RIWAYAT PASIEN  </h4>
           ';
        $users = DB::table('pasien')
        ->where('no_pasien', '=', $user)
        ->get();
        // $html='';
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
            $tgl_kunjungan=$pasien->tgl_kunjungan;
            $html .= ' 
    <h3 class="text-center"></h3>

            <table>
                <tr><td><b>DKK JEPARA</b></td><td></td><td></td><b>POLI GIGI</b><td></td></tr>
                <tr><td>PUSKESMAS</td><td> : WELAHAN 1</td><td></td><td></td></tr>
                <tr><td>TANGGAL </td><td> : '.$tgl_kunjungan.'</td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                

            </table>

            <table>

                    
                    <tr><td>NAMA</td><td> : '.$nama.'</td><td>TANGGAL LAHIR</td><td> : '.$tglahir.'</td></tr>
                    <tr><td>NO PASIEN</td><td> : '.$nopasien.'</td><td>KEPALA KK</td><td> : '.$kkk.'</td></tr>
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



        }
        $html.='</body>';//.$footer;


        PDF::setFooterCallback(function($pdf) {

            // Position at 15 mm from bottom
            $pdf->SetY(-15);
            // Set font
            $pdf->SetFont('helvetica', 'I', 8);
            // Page number
            $pdf->Cell(0, 10, 'Puskesmas Welahan 1', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
        });
        PDF::SetTitle('laporan');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('laporan.pdf');
        
       
    }
}
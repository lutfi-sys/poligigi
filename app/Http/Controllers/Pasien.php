<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Pasien extends Controller
{
    public function index(): View{
        $users = DB::select('select * from pasien ');
        $tglawal = '2023-01-01';
        $tglakhir = '2023-12-30';
        return view('home', [
            'pasien' => $users,
            'tglawal'=> $tglawal,
            'tglakhir'=> $tglakhir,
        ]);
       
    }
    public function showData(Request $request)
    {
        // Ambil data periode dari database sesuai tanggal awal dan tanggal akhir yang dikirimkan melalui formulir
        $tglawal = $request->input('tglawal');
        $tglakhir = $request->input('tglakhir');

        // Misalnya, menggunakan eloquent untuk mengambil data periode
        $users = DB::select('select * from pasien where tgl_kunjungan between ? and ?',[$tglawal,$tglakhir]);
        return view('home', [
                  'pasien' => $users,
                  'tglawal'=> $tglawal,
                  'tglakhir'=> $tglakhir,
                   
                 ]);
    }
    public function cetakdata($tglawal, $tglakhir):view{
        $users = DB::with('pasien')->whereBetween('tgl_kunjungan',[$tglawal, $tglakhir])->get();

        return view('home', [
            'pasien' => $users,
            
           
        ]);
    }
    
    public function show(): View
    {
        $nama =array();
        $no_pasien =array();
        $alamat= array();

        return view('gejala', [
            'no_pasien' => $no_pasien,
            'nama'=>$nama,
            'alamat'=>$alamat,
        ]);
    }
    public function view($user): View
    {
        $users = DB::table('pasien')
        ->where('no_pasien', '=', $user)
        ->get();
        foreach ($users as $pasien){
            $nama=$pasien->nama;
            $nopasien=$pasien->no_pasien;
            $alamat=$pasien->alamat;
        }

            return view('profil', [
                'trans'=>$users,
                'nama'=>$nama,
                'nopasien'=>$nopasien,
                'alamat'=>$alamat,
                
    
            ]);
    }
    
}
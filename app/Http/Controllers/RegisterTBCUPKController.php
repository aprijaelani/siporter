<?php

namespace App\Http\Controllers;

use App\RegisterTBCUPK;
use App\DaftarTerduga;
use Illuminate\Http\Request;
use Auth;
use PDF;
use App\NamaFaskes;
use App\KartuPengobatan;
use DB;
use App\JadwalPerjanjian;
use Carbon\Carbon;

class RegisterTBCUPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $data_user = Auth::user();
            if ($data_user->level == 1) {
                $now = Carbon::now()->toDateString();
                $twoDays = Carbon::now()->addDays(2)->toDateString();
                $oneDays = Carbon::now()->addDays(1)->toDateString();
                $sekarang = Carbon::now()->toDateString(); 

                $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                if (empty($data_user)) {
                    return redirect('/');
                }

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                $datas = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with('daftar_terduga')->get();

                return view('tb03.list',compact('datas','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
            }else{
                $now = Carbon::now()->toDateString();
                $twoDays = Carbon::now()->addDays(2)->toDateString();
                $oneDays = Carbon::now()->addDays(1)->toDateString();
                $sekarang = Carbon::now()->toDateString(); 

                $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                if (empty($data_user)) {
                    return redirect('/');
                }

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                $datas = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with(['daftar_terduga' => function($query) {
                    $data_user = Auth::user();
                    $query->where('faskes_id', $data_user->faskes_id);}])->get();

                return view('tb03.list',compact('datas','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
            }
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegisterTBCUPK  $registerTBCUPK
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterTBCUPK $registerTBCUPK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegisterTBCUPK  $registerTBCUPK
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterTBCUPK $registerTBCUPK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegisterTBCUPK  $registerTBCUPK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterTBCUPK $registerTBCUPK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegisterTBCUPK  $registerTBCUPK
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterTBCUPK $registerTBCUPK)
    {
        //
    }

    public function prints()
    {
        $data_user = Auth::user();
        if (empty($data_user)) {
            return redirect('/');
        }
        if ($data_user->level == 1) {
            $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
            $count = DaftarTerduga::count();
            $faskes_id = $data_user->faskes_id;
            $pasiens = KartuPengobatan::with('daftar_terduga.nama_faskes','permohonan_lab')->get();
            // print_r($pasiens->toArray());exit;   
            // print_r($pasiens->toArray());exit;
            $pdf = PDF::loadView('tb03.print',compact('faskes','count','pasiens'))->setPaper('a4', 'landscape');
            // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
            return $pdf->stream('Register TBC UPK.pdf');
        }else{            
            $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
            $count = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->count();
            $faskes_id = $data_user->faskes_id;
            $pasiens = KartuPengobatan::with('daftar_terduga.nama_faskes','permohonan_lab')->get();
            // print_r($pasiens->toArray());exit;   
            // print_r($pasiens->toArray());exit;
            $pdf = PDF::loadView('tb03.print',compact('faskes','count','pasiens'))->setPaper('a4', 'landscape');
            // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
            return $pdf->stream('Register TBC UPK.pdf');
        }
        // return view('tb06.daftar_terduga_tb_prints',compact('pasiens'));
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            if (!empty($request->start_date)) {
                $start_date = date('Y-m-d',strtotime($request->start_date));
            }
            if (!empty($request->end_date)) {
                $end_date = date('Y-m-d',strtotime($request->end_date));
            }
            $data_user = Auth::user();
            if (empty($data_user)) {
                return redirect('/');
            }

            if ($data_user->level == 1) {
                 if ($request->action == 'Cetak') {
                    $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                    $count = DaftarTerduga::count();
                    $pasiens = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with('daftar_terduga')->whereBetween('created_at',[$start_date, $end_date])->get();
                    // print_r($pasiens->toArray());exit;
                    $pdf = PDF::loadView('tb03.print',compact('faskes','count','pasiens'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Register TBC UPK.pdf');
                }else{
                    if (!empty($request->start_date)) {
                    $start_date = date('Y-m-d',strtotime($request->start_date));
                    }
                    
                    if (!empty($request->end_date)) {
                        $end_date = date('Y-m-d',strtotime($request->end_date));
                    }
                    $now = Carbon::now()->toDateString();
                    $twoDays = Carbon::now()->addDays(2)->toDateString();
                    $oneDays = Carbon::now()->addDays(1)->toDateString();
                    $sekarang = Carbon::now()->toDateString();
                    // print_r($twoDays);exit;

                    $data_user = Auth::user();
                    $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                    if (empty($data_user)) {
                        return redirect('/');
                    }

                    $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                    $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                    $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                    $datas = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with(['daftar_terduga' => function($query) {
                    $data_user = Auth::user();
                    $query->where('faskes_id', $data_user->faskes_id);}])->whereBetween('created_at',[$start_date, $end_date])->get();

                    // $datas = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('created_at',[$start_date, $end_date])->get();

                    return view('tb03.list',compact('datas','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
                }
            }else{

                if ($request->action == 'Cetak') {

                    $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                    $count = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->count();
                    $pasiens = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with(['daftar_terduga' => function($query) {
                    $data_user = Auth::user();
                    $query->where('faskes_id', $data_user->faskes_id);}])->whereBetween('created_at',[$start_date, $end_date])->get();
                    // print_r($pasiens->toArray());exit;
                    $pdf = PDF::loadView('tb03.print',compact('faskes','count','pasiens'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Register TBC UPK.pdf');
                }else{
                    if (!empty($request->start_date)) {
                    $start_date = date('Y-m-d',strtotime($request->start_date));
                    }
                    
                    if (!empty($request->end_date)) {
                        $end_date = date('Y-m-d',strtotime($request->end_date));
                    }
                    $now = Carbon::now()->toDateString();
                    $twoDays = Carbon::now()->addDays(2)->toDateString();
                    $oneDays = Carbon::now()->addDays(1)->toDateString();
                    $sekarang = Carbon::now()->toDateString();
                    // print_r($twoDays);exit;

                    $data_user = Auth::user();
                    $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                    if (empty($data_user)) {
                        return redirect('/');
                    }

                    $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                    $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                    $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                    $datas = KartuPengobatan::with('hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','daftar_terduga.kecamatan','daftar_terduga.kelurahan')->with(['daftar_terduga' => function($query) {
                    $data_user = Auth::user();
                    $query->where('faskes_id', $data_user->faskes_id);}])->whereBetween('created_at',[$start_date, $end_date])->get();

                    // $datas = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('created_at',[$start_date, $end_date])->get();

                    return view('tb03.list',compact('datas','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
                }

            }
        }else{
            return redirect('/');
        }
        
    }
}

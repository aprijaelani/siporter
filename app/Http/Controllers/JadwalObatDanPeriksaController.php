<?php

namespace App\Http\Controllers;

use App\JadwalObatDanPeriksa;
use Illuminate\Http\Request;
use App\DaftarTerduga;
use App\JadwalPerjanjian;
use App\PeriksaUlang;
use App\KartuPengobatan;
use Auth;
use DB;
use PDF;
use Validator, Response;
use Carbon\Carbon;

class JadwalObatDanPeriksaController extends Controller
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
            $nama_faskes = $data_user->load('nama_faskes');
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
            // print_r($data_kartu_pengobatan->toArray());exit;
            if (empty($data_user)) {
                return redirect('/');
            }
            $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
            $jadwal_perjanjians = JadwalPerjanjian::with('daftar_terduga','nama_faskes')->get();
            $jadwal_periksas = PeriksaUlang::with('daftar_terduga','nama_faskes')->get();
            $kartu_pengobatans = KartuPengobatan::with('daftar_terduga.nama_faskes')->orderBy('id','desc')->with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->get();

            $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();       
            $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            
            return view('tb02.jadwal_obat_dan_periksa',compact('pasiens','jadwal_perjanjians','jadwal_periksas','data_user','count_notification','notification','kartu_pengobatans','list_min_duas','list_min_satus','list_min_nows'));
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
        if (!empty($request->tanggal)) {
            $request->tanggal = date('Y-m-d',strtotime($request->tanggal));
        }
        if (!empty($tanggal_harus_kembali = $request->tanggal_harus_kembali)) {
            $tanggal_harus_kembali = $request->tanggal_harus_kembali = date('Y-m-d',strtotime($tanggal_harus_kembali = $request->tanggal_harus_kembali));
        }
        $pasien_tb_02 = new JadwalPerjanjian;
        $pasien_tb_02->kartu_pengobatan_id = $request->kartu_pengobatan_id;
        $pasien_tb_02->tanggal = $request->tanggal;
        $pasien_tb_02->tahap_pengobatan = $request->tahap_pengobatan;
        $pasien_tb_02->jumlah_obat = $request->jumlah_obat; 
        $pasien_tb_02->tanggal_harus_kembali = $request->tanggal_harus_kembali;
        $pasien_tb_02->status_kembali = $request->status_kembali;
        $pasien_tb_02->save();
        return response ()->json ($pasien_tb_02);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function periksa(Request $request)
    {
        if (!empty($request->tanggal_janji)) {
            $request->tanggal_janji = date('Y-m-d',strtotime($request->tanggal_janji));
        }
        $pasien_tb_02_periksa               = new PeriksaUlang;
        $pasien_tb_02_periksa->kartu_pengobatan_id    = $request->kartu_pengobatan_id;
        $pasien_tb_02_periksa->tanggal_janji= $request->tanggal_janji;
        $pasien_tb_02_periksa->bulan_ke     = $request->bulan_ke;
        $pasien_tb_02_periksa->status_janji = $request->status_janji;
        $pasien_tb_02_periksa->save();
        return response ()->json ($pasien_tb_02_periksa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JadwalObatDanPeriksa  $jadwalObatDanPeriksa
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalObatDanPeriksa $jadwalObatDanPeriksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalObatDanPeriksa  $jadwalObatDanPeriksa
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalObatDanPeriksa $jadwalObatDanPeriksa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JadwalObatDanPeriksa  $jadwalObatDanPeriksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!empty($request->tanggal)) {
            $request->tanggal = date('Y-m-d',strtotime($request->tanggal));
        }
        if (!empty($request->tanggal_harus_kembali)) {
            $request->tanggal_harus_kembali = date('Y-m-d',strtotime($request->tanggal_harus_kembali));
        }
        $pasien_tb_02 = JadwalPerjanjian::where('id',$request->id)->update([ 
            'tanggal'               => $request->tanggal, 
            'tahap_pengobatan'      => $request->tahap_pengobatan, 
            'jumlah_obat'           => $request->jumlah_obat, 
            'tanggal_harus_kembali' => $request->tanggal_harus_kembali, 
            'status_kembali'        => $request->status_kembali,
        ]);

        return response ()->json ($pasien_tb_02);

    }

    public function updatePeriksa(Request $request)
    {
        if (!empty($request->tanggal_janji)) {
            $request->tanggal_janji = date('Y-m-d',strtotime($request->tanggal_janji));
        }
        $pasien_tb_02 = PeriksaUlang::where('id',$request->id)->update([
            'tanggal_janji'=> $request->tanggal_janji,
            'bulan_ke'     => $request->bulan_ke,
            'status_janji' => $request->status_janji,
        ]);

        return response ()->json ($pasien_tb_02);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalObatDanPeriksa  $jadwalObatDanPeriksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tb02 = JadwalPerjanjian::find($request->id);
        $tb02->delete();
        
        return redirect("/tb02");
    }

    public function delete_periksa(Request $request)
    {
        $tb02 = PeriksaUlang::find($request->id);
        $tb02->delete();
        
        return response ()->json ($tb02);
    }

    public function getDataJadwal(Request $request){
        $jadwal_perjanjians = JadwalPerjanjian::where('id',$request->id)->with('daftar_terduga','nama_faskes')->first();
        return response ()->json ($jadwal_perjanjians);
    }

    public function getDataPeriksa(Request $request){
        $jadwal_perjanjians = PeriksaUlang::where('id',$request->id)->with('daftar_terduga','nama_faskes')->first();
        return response ()->json ($jadwal_perjanjians);
    }

    public function detail($id){
        if (Auth::check()) {
            $data_user = Auth::user();
            $now = Carbon::now()->toDateString();
            $twoDays = Carbon::now()->addDays(2)->toDateString();
            $oneDays = Carbon::now()->addDays(1)->toDateString();
            $sekarang = Carbon::now()->toDateString();
            // print_r($twoDays);exit;

            $count_notification = DB::table('jadwal_perjanjians')
                                    ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                    ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                    ->select('jadwal_perjanjians.*')
                                    ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                    ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                    ->where('jadwal_perjanjians.deleted_at', null)
                                    ->count();  
            // print_r($data_kartu_pengobatan->toArray());exit;
            if (empty($data_user)) {
                return redirect('/');
            }
            $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
            $jadwal_perjanjians = JadwalPerjanjian::with('daftar_terduga','nama_faskes')->get();
            $jadwal_periksas = PeriksaUlang::with('daftar_terduga','nama_faskes')->get();
            $kartu_pengobatans = KartuPengobatan::with('daftar_terduga.nama_faskes','jadwal_perjanjian')->where('id',$id)->first();

            $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            // print_r(json_decode(json_encode($kartu_pengobatans)));exit;
            return view('tb02.detail',compact('pasiens','jadwal_perjanjians','jadwal_periksas','data_user','count_notification','notification','kartu_pengobatans','list_min_duas','list_min_satus','list_min_nows'));
        }else{
            return redirect('/');
        }
    }

    public function detail_periksa_ulang($id){
        if (Auth::check()) {        
            $now = Carbon::now()->toDateString();
            $twoDays = Carbon::now()->addDays(2)->toDateString();
            $oneDays = Carbon::now()->addDays(1)->toDateString();
            $sekarang = Carbon::now()->toDateString();
            $data_user = Auth::user();

            $count_notification = DB::table('jadwal_perjanjians')
                                    ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                    ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                    ->select('jadwal_perjanjians.*')
                                    ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                    ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                    ->where('jadwal_perjanjians.deleted_at', null)
                                    ->count();  
            // print_r($data_kartu_pengobatan->toArray());exit;
            $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            // print_r($data_kartu_pengobatan->toArray());exit;
            if (empty($data_user)) {
                return redirect('/');
            }
            $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
            $jadwal_perjanjians = JadwalPerjanjian::with('daftar_terduga','nama_faskes')->get();
            $jadwal_periksas = PeriksaUlang::with('daftar_terduga','nama_faskes')->get();
            $kartu_pengobatans = KartuPengobatan::with('periksa_ulang','daftar_terduga.nama_faskes','jadwal_perjanjian')->where('id',$id)->first();
            // print_r(json_decode(json_encode($kartu_pengobatans)));exit;
            return view('tb02.detail_periksa_ulang',compact('pasiens','jadwal_perjanjians','jadwal_periksas','data_user','count_notification','notification','kartu_pengobatans','list_min_duas','list_min_satus','list_min_nows'));
        }else{
            return redirect('/');
        }
    }

    public function prints($id)
    {
        $data_kartu_pengobatan =KartuPengobatan::with('daftar_terduga.nama_faskes','jadwal_perjanjian')->where('id',$id)->first();
        // print_r(json_decode(json_encode($data_kartu_pengobatan)));exit;
        $pdf = PDF::loadView('tb02.prints',compact('data_kartu_pengobatan'))->setPaper('a4', 'portrait');
        // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
        return $pdf->stream('Kartu Pengobatan.pdf');
        // return view('tb06.daftar_terduga_tb_prints',compact('pasiens'));
    }

    public function calendar(){
        $now = Carbon::now()->toDateString();
        $twoDays = Carbon::now()->addDays(2)->toDateString();
        // print_r($twoDays);exit;

        $notification = JadwalPerjanjian::whereBetween('tanggal_harus_kembali', [$now,$twoDays])->with('daftar_terduga.permohonan_lab.nama_faskes')->first();
        $count_notification = JadwalPerjanjian::whereBetween('tanggal_harus_kembali', [$now,$twoDays])->count();
        // print_r($data_kartu_pengobatan->toArray());exit;
        $data_user = Auth::user();
        if (empty($data_user)) {
            return redirect('/');
        }
        $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
        $jadwal_perjanjians = JadwalPerjanjian::with('daftar_terduga','nama_faskes')->get();
        $jadwal_periksas = PeriksaUlang::with('daftar_terduga','nama_faskes')->get();
        return view('tb02.calendar',compact('pasiens','jadwal_perjanjians','jadwal_periksas','data_user','count_notification','notification'));
    }
}

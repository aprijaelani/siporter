<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarTerduga;
use Alert;
use PDF;
use Auth; 
use DB;
use App\NamaFaskes; 
use App\Kelurahan;
use App\Kecamatan;
use App\JadwalPerjanjian;
use App\User;
use Carbon\Carbon;
use App\KartuPengobatan;

class DaftarTerdugaTBController extends Controller
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
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();     
                if (empty($data_user)) {
                    return redirect('/');
                }
                $pasiens = DaftarTerduga::orderBy('id', 'desc')->get();
                $kecamatans = Kecamatan::orderBy('nama', 'asc')->get();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();       
                // print_r($list_min_duas->toArray());exit;
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get(); 
            }else{
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
                if (empty($data_user)) {
                    return redirect('/');
                }
                $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->orderBy('id', 'desc')->get();
                $kecamatans = Kecamatan::orderBy('nama', 'asc')->get();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();       
                // print_r($list_min_duas->toArray());exit;
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            }

            return view('tb06.daftar_terduga_tb',compact('pasiens','nama_faskes','data_user','kecamatans','kelurahans','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
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
        if (!empty($request->tanggal_lahir)) {
            $request->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
        }
        $data_user = Auth::user();
        $pasien_tb_06 = new DaftarTerduga;
        $pasien_tb_06->nik = $request->nik;
        $pasien_tb_06->bpjs = $request->bpjs;
        $pasien_tb_06->nama_lengkap = $request->nama_lengkap;
        $pasien_tb_06->umur = $request->umur; 
        $pasien_tb_06->berat_badan = $request->berat_badan; 
        $pasien_tb_06->tanggal_lahir = $request->tanggal_lahir; 
        $pasien_tb_06->tinggi_badan = $request->tinggi_badan; 
        $pasien_tb_06->jenis_kelamin = $request->jenis_kelamin;
        $pasien_tb_06->alamat = $request->alamat;
        $pasien_tb_06->rt = $request->rt;
        $pasien_tb_06->rw = $request->rw;
        $pasien_tb_06->kota = $request->kota;   
        $pasien_tb_06->kecamatan_id = $request->kecamatan;
        $pasien_tb_06->kelurahan_id = $request->kelurahan;
        $pasien_tb_06->faskes_id = $data_user->faskes_id;
        $pasien_tb_06->status = $request->status;
        $pasien_tb_06->save();
        return response ()->json ($pasien_tb_06);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
                $data = DaftarTerduga::with('kecamatan','kelurahan')->where('id',$id)->first();
                // print_r(json_decode(json_encode($data)));exit;

                $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                if ($data->no_identitas_sediaan_dahak == '') {
                    $data->no_identitas_sediaan_dahak = $faskes->kode;
                }
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
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
                $data = DaftarTerduga::with('kecamatan','kelurahan')->where('id',$id)->first();
                // print_r(json_decode(json_encode($data)));exit;

                $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                if ($data->no_identitas_sediaan_dahak == '') {
                    $data->no_identitas_sediaan_dahak = $faskes->kode;
                }
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            }

            return view('tb06.daftar_terduga_tb_detail',compact('data','faskes','data_user','count_notification','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas'));
        }else{
            return redirect('/');
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
                $data = DaftarTerduga::with('kecamatan','kelurahan')->where('id',$id)->first();
                // print_r(json_decode(json_encode($data)));exit;

                $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                if ($data->no_identitas_sediaan_dahak == '') {
                    $data->no_identitas_sediaan_dahak = $faskes->kode;
                }
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
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
                $data = DaftarTerduga::with('kecamatan','kelurahan')->where('id',$id)->first();
                // print_r(json_decode(json_encode($data)));exit;

                $faskes = NamaFaskes::where('id',$data_user->faskes_id)->first();
                if ($data->no_identitas_sediaan_dahak == '') {
                    $data->no_identitas_sediaan_dahak = $faskes->kode;
                }
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            }

            return view('tb06.daftar_terduga_tb_edit',compact('data','faskes','data_user','count_notification','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas'));
        }else{
            return redirect('/');
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request'
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->tanggal_a)) {
            $request->tanggal_a = date('Y-m-d',strtotime($request->tanggal_a));
        }
        if (!empty($request->tanggal_b)) {
            $request->tanggal_b = date('Y-m-d',strtotime($request->tanggal_b));
        }
        if (!empty($request->tanggal_c)) {
            $request->tanggal_c = date('Y-m-d',strtotime($request->tanggal_c));
        }
        if (!empty($request->tanggal_didaftar)) {
            $request->tanggal_didaftar = date('Y-m-d',strtotime($request->tanggal_didaftar));
        }
        if (!empty($request->tanggal_mikroskopis)) {
            $request->tanggal_mikroskopis = date('Y-m-d',strtotime($request->tanggal_mikroskopis));
        }
        if (!empty($request->tanggal_lahir)) {
            $request->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
        }
        if (!empty($request->tanggal_expert)) {
            $request->tanggal_expert = date('Y-m-d',strtotime($request->tanggal_expert));
        }
        if (!empty($request->tanggal_biakan)) {
            $request->tanggal_biakan = date('Y-m-d',strtotime($request->tanggal_biakan));
        }
        if (!empty($request->tanggal_mulai_pengobatan)) {
            $request->tanggal_mulai_pengobatan = date('Y-m-d',strtotime($request->tanggal_mulai_pengobatan));
        }
        DaftarTerduga::where('id',$id)->update([
            'nik'           => $request->nik,
            'bpjs'           => $request->bpjs, 
            'nama_lengkap'  => $request->nama_lengkap, 
            'umur'          => $request->umur, 
            'tanggal_lahir'          => $request->tanggal_lahir,
            'berat_badan'          => $request->berat_badan,  
            'jenis_kelamin' => $request->jenis_kelamin, 
            'alamat' => $request->alamat,
            'wanita_usia_subur' => $request->wanita_usia_subur,
            'tinggi_badan' => $request->tinggi_badan, 
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kota' => $request->kota,
            'kecamatan_id' => $request->kecamatan, 
            'kelurahan_id' => $request->kelurahan,
            'no_identitas_sediaan_dahak' => $request->no_identitas_sediaan_dahak,
            'tanggal_didaftar' => $request->tanggal_didaftar,
            'dirujuk_oleh' => $request->dirujuk_oleh,
            'lokasi_anatomi_penyakit' => $request->lokasi_anatomi_penyakit,
            'total_skoring_tb_anak' => $request->total_skoring_tb_anak,
            'foto_toraks' => $request->foto_toraks,
            'status_hiv' => $request->status_hiv,
            'riwayat_diabetes_melitus' => $request->riwayat_diabetes_melitus,
            'tanggal_a' => $request->tanggal_a,
            'tanggal_b' => $request->tanggal_b,
            'tanggal_c' => $request->tanggal_c,
            'tanggal_mikroskopis' => $request->tanggal_mikroskopis,
            'hasil_a' => $request->hasil_a,
            'hasil_b' => $request->hasil_b,
            'hasil_c' => $request->hasil_c,
            'tanggal_expert' => $request->tanggal_expert,
            'hasil_expert' => $request->hasil_expert,
            'tanggal_biakan' => $request->tanggal_biakan,
            'hasil_biakan' => $request->hasil_biakan,
            'no_reg_lab' => $request->no_reg_lab,
            'tanggal_mulai_pengobatan' => $request->tanggal_mulai_pengobatan,
            'dirujuk_ke' => $request->dirujuk_ke,
            'keterangan' => $request->keterangan,
            ]);
        Alert::success('Success', 'TB 06 Berhasil Diperbarui');
        // flash()->overlay('TB 06 Berhasil Diperbarui');
        return redirect("/tb06");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tb06 = DaftarTerduga::find($request->id);
        $tb06->delete();

        $kartu_pengobatans = KartuPengobatan::where('pasien_id', $request->id)->get();

        foreach ($kartu_pengobatans as $key => $kartu_pengobatan) {
            $hasil_pemeriksaan_dahak = \App\HasilPemeriksaanDahak::where('kartu_pengobatan_id',$kartu_pengobatan->id);
            $jadwal_perjanjian = \App\JadwalPerjanjian::where('kartu_pengobatan_id',$kartu_pengobatan->id);
            $kontak_serumah = \App\KontakSerumah::where('kartu_pengobatan_id',$kartu_pengobatan->id);
            $periksa_ulang = \App\PeriksaUlang::where('kartu_pengobatan_id',$kartu_pengobatan->id);
            $tahap_awal = \App\TahapAwal::where('kartu_pengobatan_id',$kartu_pengobatan->id);
            $tahap_lanjutan = \App\TahapLanjutan::where('kartu_pengobatan_id',$kartu_pengobatan->id);

            $hasil_pemeriksaan_dahak->delete();
            $jadwal_perjanjian->delete();
            $periksa_ulang->delete();
            $kontak_serumah->delete();
            $tahap_awal->delete();
            $tahap_lanjutan->delete();
            $kartu_pengobatan->delete();
        }

        $register_laboratorium = \App\PermohonanLab::where('pasien_id',$request->id);

        $register_laboratorium->delete();

        return redirect("/tb06");
    }

    public function prints()
    {
        if (Auth::check()) {
            $data_user = Auth::user();
            if ($data_user->level == 1) {
                if (empty($data_user)) {
                    return redirect('/');
                }
                $pasiens = DaftarTerduga::all();
                $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens'))->setPaper('a4', 'landscape');
                // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                return $pdf->stream('Daftar Terduga TB.pdf');
                // return view('tb06.daftar_terduga_tb_prints',compact('pasiens'));
            }else{                
                if (empty($data_user)) {
                    return redirect('/');
                }
                $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
                $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens'))->setPaper('a4', 'landscape');
                // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                return $pdf->stream('Daftar Terduga TB.pdf');
                // return view('tb06.daftar_terduga_tb_prints',compact('pasiens'));
            }
        }else{
            return redirect('/');
        }
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            $data_user = Auth::user();
            if ($data_user->level == 1) {
                $nama_faskes = $data_user->load('nama_faskes');
                $now = Carbon::now()->toDateString();
                $twoDays = Carbon::now()->addDays(2)->toDateString();
                $oneDays = Carbon::now()->addDays(1)->toDateString();
                $sekarang = Carbon::now()->toDateString();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                // print_r($twoDays);exit;

                $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                if (!empty($request->start_date)) {
                    $start_date = date('Y-m-d',strtotime($request->start_date));
                }
                if (!empty($request->end_date)) {
                    $end_date = date('Y-m-d',strtotime($request->end_date));
                }
                if (empty($data_user)) {
                    return redirect('/');
                }

                if ($request->action == 'Cetak') {
                    $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                    $pasiens = DaftarTerduga::whereBetween('created_at',[$start_date, $end_date])->with('nama_faskes')->get();
                    $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens','detail_user'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Daftar Terduga TB.pdf');
                }else{
                    $kecamatans = Kecamatan::all();
                    $kelurahans = Kelurahan::all();


                    $pasiens = DaftarTerduga::whereBetween('created_at',[$start_date, $end_date])->get();

                    return view('tb06.daftar_terduga_tb',compact('pasiens','nama_faskes','data_user','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas','count_notification'));
                }
            }else{

                $nama_faskes = $data_user->load('nama_faskes');
                $now = Carbon::now()->toDateString();
                $twoDays = Carbon::now()->addDays(2)->toDateString();
                $oneDays = Carbon::now()->addDays(1)->toDateString();
                $sekarang = Carbon::now()->toDateString();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                // print_r($twoDays);exit;

                $count_notification = DB::table('jadwal_perjanjians')
                                        ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                        ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                        ->select('jadwal_perjanjians.*')
                                        ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                        ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                        ->where('jadwal_perjanjians.deleted_at', null)
                                        ->count();  

                if (!empty($request->start_date)) {
                    $start_date = date('Y-m-d',strtotime($request->start_date));
                }
                if (!empty($request->end_date)) {
                    $end_date = date('Y-m-d',strtotime($request->end_date));
                }
                if (empty($data_user)) {
                    return redirect('/');
                }

                if ($request->action == 'Cetak') {
                    $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                    $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('created_at',[$start_date, $end_date])->with('nama_faskes')->get();
                    $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens','detail_user'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Daftar Terduga TB.pdf');
                }else{
                    $kecamatans = Kecamatan::all();
                    $kelurahans = Kelurahan::all();


                    $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('created_at',[$start_date, $end_date])->get();

                    return view('tb06.daftar_terduga_tb',compact('pasiens','nama_faskes','data_user','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas','count_notification'));
                }
            }
        
        }else{
            return redirect('/');
        }
    }
}
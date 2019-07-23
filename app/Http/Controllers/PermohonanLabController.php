<?php

namespace App\Http\Controllers;

use App\PermohonanLab;
use Illuminate\Http\Request;
use App\DaftarTerduga;
use Response;
use Alert;
use App\Dokter;
use App\JadwalPerjanjian;
use Auth;
use App\Faskes;
use DB;
use Carbon\Carbon;

class PermohonanLabController extends Controller
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
                // print_r($twoDays);exit;

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
                $pasiens = DaftarTerduga::all();
                $dokters = Dokter::all();
                $faskes = faskes::where('id',$data_user->faskes_id)->first();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                
                return view('tb05.permohonan_lab',compact('pasiens','nama_faskes','faskes','dokters','data_user','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
            }else{
                $nama_faskes = $data_user->load('nama_faskes');
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

                if (empty($data_user)) {
                    return redirect('/');
                }
                $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->get();
                $dokters = Dokter::all();
                $faskes = faskes::where('id',$data_user->faskes_id)->first();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                
                return view('tb05.permohonan_lab',compact('pasiens','nama_faskes','faskes','dokters','data_user','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
                
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
        if (!empty($request->txtTanggalPengambilanDahakTerakhirShow)) {
            $request->txtTanggalPengambilanDahakTerakhirShow = date('Y-m-d',strtotime($request->txtTanggalPengambilanDahakTerakhirShow));
        }
        if (!empty($request->txtTanggalPengirimanSediaanShow)) {
            $request->txtTanggalPengirimanSediaanShow = date('Y-m-d',strtotime($request->txtTanggalPengirimanSediaanShow));
        }
        if (!empty($request->txtTanggalTampakVisualShow)) {
            $request->txtTanggalTampakVisualShow = date('Y-m-d',strtotime($request->txtTanggalTampakVisualShow));
        }
        if (!empty($request->txtTanggalSewaktu1Show)) {
            $request->txtTanggalSewaktu1Show = date('Y-m-d',strtotime($request->txtTanggalSewaktu1Show));
        }
        if (!empty($request->txtTanggalPagiShow)) {
            $request->txtTanggalPagiShow = date('Y-m-d',strtotime($request->txtTanggalPagiShow));
        }
        if (!empty($request->txtTanggalSewaktu2Show)) {
            $request->txtTanggalSewaktu2Show = date('Y-m-d',strtotime($request->txtTanggalSewaktu2Show));
        }
        PermohonanLab::create([
            'faskes_id' => $request->cmbNamaFaskes,
            'dokter_id' => $request->cmbNamaTimAhliKlinis,
            'pasien_id' => $request->pasien_id,
            'pengobatan_ke' => $request->pengobatan_ke,
            'tanggal_pengambilan_dahak_terakhir' => $request->txtTanggalPengambilanDahakTerakhirShow,
            'tanggal_pengiriman_sediaan' => $request->txtTanggalPengirimanSediaanShow,
            'alasan_pemeriksaan' => $request->optAlasanPemeriksaan,
            'pemeriksaan_ulang_pengobatan' => $request->txtPemeriksaanUlangPengobatan,
            'pemeriksaan_ulang_pasca_pengobatan' => $request->txtPemeriksaanUlangPascaPengobatan,
            'no_Reg_tb_or_tb_MDR_Faskes' => $request->txtNoRegTBMDRFaskes,
            'no_reg_tb_or_tb_mdr_kab_kota' => $request->txtNoRegTBMDRKab,
            'jenis_terduga' => $request->jenis_terduga,
            'jenis_dan_jumlah_pemeriksaan' => $request->jenis_dan_jumlah_pemeriksaan,
            'klasifikasi_penyakit' => $request->klasifikasi_penyakit,
            'lokasi' => $request->txtLokasi,
            'status_hiv' => $request->optHIV,
            'tipe_spesimen' => $request->optSpesimen,
            'nanah_lendir_1' => $request->chkNanahLendir0,
            'nanah_lendir_2' => $request->chkNanahLendir1,
            'nanah_lendir_3' => $request->chkNanahLendir2,
            'bercak_darah_1' => $request->chkBercakDarah0,
            'bercak_darah_2' => $request->chkBercakDarah1,
            'bercak_darah_3' => $request->chkBercakDarah2,
            'telepon' => $request->telepon,
            'air_liur_1' => $request->chkAirLiur0,
            'air_liur_2' => $request->chkAirLiur1,
            'air_liur_3' => $request->chkAirLiur2,
            'tanggal' => $request->txtTanggalTampakVisualShow,
            'nama_jelas_dokter_pengirim' => $request->txtNamaDokterPengirim,
            ]);
        Alert::success('Success', 'Register Laboratorium Berhasil');
        return redirect("/tb05");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PermohonanLab  $permohonanLab
     * @return \Illuminate\Http\Response
     */
    public function show(PermohonanLab $permohonanLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PermohonanLab  $permohonanLab
     * @return \Illuminate\Http\Response
     */
    public function edit(PermohonanLab $permohonanLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PermohonanLab  $permohonanLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermohonanLab $permohonanLab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PermohonanLab  $permohonanLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermohonanLab $permohonanLab)
    {
        //
    }

    public function getDataPasien(Request $request)
    {
        $pasiens = DaftarTerduga::where('id',$request->id)->first();
        return Response::json($pasiens);
    }

    public function getDataPasienTb(Request $request)
    {
        $pasiens = PermohonanLab::where('id',$request->id)->with('daftar_terduga')->first();
        return Response::json($pasiens);
    }
}

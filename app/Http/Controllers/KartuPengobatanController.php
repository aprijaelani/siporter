<?php

namespace App\Http\Controllers;

use App\KartuPengobatan;
use Illuminate\Http\Request;
use App\DaftarTerduga;
use App\KontakSerumah;
use App\PermohonanLab;
use App\HasilPemeriksaanDahak;
use Alert;
use PDF;
use Auth;
use App\Kelurahan;
use App\Kecamatan;
use App\JadwalPerjanjian;
use Carbon\Carbon;
use App\TahapAwal;
use DB;
use App\TahapLanjutan;

class KartuPengobatanController extends Controller
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
                // print_r($twoDays);exit;
                $nama_faskes = $data_user->load('nama_faskes');
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
                $data_pasiens = PermohonanLab::orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->get();
                $pasiens = $data_pasiens;
                // print_r($pasiens->toArray());exit;

                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();
                $data_kartu_pengobatan = KartuPengobatan::with('daftar_terduga')->get();
                
                // print_r($data_kartu_pengobatan->toArray());exit;

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                // print_r($data_kartu_pengobatan->toArray());exit;
                return view('tb01.kartu_pengobatan',compact('pasiens','nama_faskes','data_user','kecamatans','kelurahans','data_kartu_pengobatan','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
            }else{                
                $now = Carbon::now()->toDateString();
                $twoDays = Carbon::now()->addDays(2)->toDateString();
                $oneDays = Carbon::now()->addDays(1)->toDateString();
                $sekarang = Carbon::now()->toDateString();
                // print_r($twoDays);exit;
                $nama_faskes = $data_user->load('nama_faskes');
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
                $data_pasiens = PermohonanLab::orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->where('faskes_id',$data_user->faskes_id)->get();
                $pasiens = $data_pasiens->where('faskes_id',$data_user->faskes_id);
                // print_r($pasiens->toArray());exit;

                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();
                $data_kartu_pengobatan = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->get();
                
                // print_r($data_kartu_pengobatan->toArray());exit;

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                // print_r($data_kartu_pengobatan->toArray());exit;
                return view('tb01.kartu_pengobatan',compact('pasiens','nama_faskes','data_user','kecamatans','kelurahans','data_kartu_pengobatan','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
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
        if (!empty($request->txtTanggalAnjurShow)) {
            $request->txtTanggalAnjurShow = date('Y-m-d',strtotime($request->txtTanggalAnjurShow));
        }
        if (!empty($request->txtTanggalPreTestShow)) {
            $request->txtTanggalPreTestShow = date('Y-m-d',strtotime($request->txtTanggalPreTestShow));
        }
        if (!empty($request->txtTanggalTestShow)) {
            $request->txtTanggalTestShow = date('Y-m-d',strtotime($request->txtTanggalTestShow));
        }
        if (!empty($request->txtTanggalPostTestShow)) {
            $request->txtTanggalPostTestShow = date('Y-m-d',strtotime($request->txtTanggalPostTestShow));
        }
        if (!empty($request->txtPDPTanggalRujukanShow)) {
            $request->txtPDPTanggalRujukanShow = date('Y-m-d',strtotime($request->txtPDPTanggalRujukanShow));
        }
        if (!empty($request->txtTanggalMulaiPPKShow)) {
            $request->txtTanggalMulaiPPKShow = date('Y-m-d',strtotime($request->txtTanggalMulaiPPKShow));
        }

        if (!empty($request->txtTanggalMulaiARTShow)) {
            $request->txtTanggalMulaiARTShow = date('Y-m-d',strtotime($request->txtTanggalMulaiARTShow));
        }

        if (!empty($request->txtTanggalHasilShow)) {
            $request->txtTanggalHasilShow = date('Y-m-d',strtotime($request->txtTanggalHasilShow));
        }

        if (!empty($request->foto_toraks)) {
            $request->foto_toraks = date('Y-m-d',strtotime($request->foto_toraks));
        }

        if (!empty($request->biopsi_jarum)) {
            $request->biopsi_jarum = date('Y-m-d',strtotime($request->biopsi_jarum));
        }

        $kartu_pengobatan = KartuPengobatan::create([
            'permohonan_lab_id' => $request->permohonan_lab_id,
            'pasien_id' => $request->pasien_id,
            'telepon' => $request->txtTelp,
            'nama_pmo' => $request->txtNamaPMO,
            'telepon_pmo' => $request->txtTelpPMO,
            'alamat_pmo' => $request->txtAlamatPMO,
            'tahun' => $request->txtTahun,
            'no_reg_tb03_upk' => $request->txtNoRegTB03UPK,
            'nama_upk' => $request->txtNamaUPK,
            'no_reg_tb03_kab_kota' => $request->txtNoRegTB03Kab,
            'parut_bcg' => $request->cmbBCG,
            'klasifikasi_penyakit' => $request->cmbKlasifikasi,
            'dirujuk_oleh' => $request->cmbDirujuk,
            'riwayat_pengobatan_sebelumnya' => $request->cmbRiwayat,
            'lokasi' => $request->txtLokasi,
            'tipe_pasien' => $request->cmbTipePasien,
            'jenis_oat' => $request->cmbJenisOAT,
            'tahap_intensif' => $request->cmbTahapIntensif,
            'catatan' => $request->txtCatatan,
            'empatkdt' => $request->txtEKDT,
            'ppk' => $request->cmb_ppk,
            'hrt' => $request->cmb_hrt,
            'duakdt' => $request->txtDKDT,
            'streptomisin' => $request->txtStrep,
            'sthambutol' => $request->txtEtham,
            'tanggal_dianjurkan' => $request->txtTanggalAnjurShow,
            'tanggal_pre_test' => $request->txtTanggalPreTestShow,
            'tanggal_post_test' => $request->txtTanggalPostTestShow,
            'tempat_test' => $request->txtTempatTest,
            'tanggal_test' => $request->txtTanggalTestShow,
            'hasil_test' => $request->cmbHasilTest,
            'nama_upk2' => $request->txtPDPNamaUPK,
            'no_reg_pra_art' => $request->txtPDPNoReg,
            'tanggal_rujukan_pdp' => $request->txtPDPTanggalRujukanShow,
            'tanggal_mulai_ppk' => $request->txtTanggalMulaiPPKShow,
            'tanggal_mulai_art' => $request->txtTanggalMulaiARTShow,
            'hasil_akhir_pengobatan' => $request->cmbHasilAkhir,
            'tanggal_hasil' => $request->txtTanggalHasilShow,
            'tipe_diagnosis'=> $request->tipeDiagnosis,
            'status_hiv' => $request->status_hiv,
            'uji_tuberkulin'=> $request->uji_tuberkulin,
            'dirujuk_lainnya'=> $request->txtDirujuk ,
            'nomor_seri'=> $request->nomor_seri,
            'foto_toraks'=> $request->foto_toraks,
            'biopsi_jarum_halus'=> $request->biopsi_jarum,
            'kesan'=> $request->kesan,
            'hasil_selain_dahak'=> $request->contoh_uji_selain_dahak,
            'sumber_obat'=> $request->sumber_obat,
            'kontak_erat'=> $request->kontak_erat,
            'hasil'=> $request->txthasil,
            'biakan_hasil_contoh_uji_selain_dahak'=>$request->sebutkan_biakan_hasil_contoh_uji_selain_dahak,
            'riwayat_dm'=> $request->riwayat_dm,
            'hasil_tes_dm'=> $request->hasil_tes_dm,
            'terampil_dm'=> $request->terampil_dm,
            'tipe_pasien_lain'=> $request->txtTipePasien,
            'pindahan_nama_faskes'=> $request->nama_faskes_pindahan,
            'pindahan_kabupaten'=> $request->kabupaten_pindahan,
            'pindahan_alamat'=> $request->alamat_faskes_pindahan,
            'pindahan_provinsi' => $request->provinsi_pindahan,
            'sumber_obat_lain_lain' => $request->sumber_obat_lain_lain,
            ]);

        for ($i=0; $i <sizeof($request->nama_lengkap); $i++) { 
            $tanggal_periksa[$i] = $request->tanggal_periksa[$i];
            if (!empty($tanggal_periksa[$i])) {
                $tanggal_periksa[$i] = date('Y-m-d',strtotime($tanggal_periksa[$i]));
            }
            $nama_lengkap[$i] = $request->nama_lengkap[$i];
            $jenis_kelamin_kontak_serumah[$i] = $request->jenis_kelamin_kontak_serumah[$i];
            $umur[$i] = $request->umur[$i];
            $hasil[$i] = $request->hasil[$i];
            $tindak_lanjut[$i] = $request->tindak_lanjut[$i];
            $insert[$i] = KontakSerumah::create([
                'kartu_pengobatan_id' => $kartu_pengobatan->id,
                'nama_lengkap' => $nama_lengkap[$i],
                'jenis_kelamin' => $jenis_kelamin_kontak_serumah[$i],
                'umur' => $umur[$i],
                'tanggal_periksa' => $tanggal_periksa[$i],
                'tindak_lanjut' => $tindak_lanjut[$i],
                'hasil' => $hasil[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->bulan); $i++) { 
            $tanggal_pemeriksaan_dahak[$i] = $request->tanggal_pemeriksaan_dahak[$i];
            if (!empty($tanggal_pemeriksaan_dahak[$i])) {
                $tanggal_pemeriksaan_dahak[$i] = date('Y-m-d',strtotime($tanggal_pemeriksaan_dahak[$i]));
            }
            $bulan[$i] = $request->bulan[$i];
            $tanggal_pemeriksaan_dahak[$i] = $tanggal_pemeriksaan_dahak[$i];
            $no_reg_lab[$i] = $request->no_reg_lab[$i];
            $bta[$i] = $request->bta[$i];
            $bb[$i] = $request->bb[$i];
            $insert[$i] = HasilPemeriksaanDahak::create([
                'kartu_pengobatan_id' => $kartu_pengobatan->id,
                'bulan' => $bulan[$i],
                'tanggal' => $tanggal_pemeriksaan_dahak[$i],
                'no_reg_lab' => $no_reg_lab[$i],
                'bta' => $bta[$i],
                'bb' => $bb[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->tahap_awal_bulan); $i++) {
            $insert[$i] = TahapAwal::create([
                'tahap_awal_bulan' => $request->tahap_awal_bulan[$i],
                'kartu_pengobatan_id' => $kartu_pengobatan->id,
                'tanggal_1_checklist' => $request->tanggal_1_checklist[$i],
                'tanggal_1_strip' => $request->tanggal_1_strip[$i],
                'tanggal_2_checklist' => $request->tanggal_2_checklist[$i],
                'tanggal_2_strip' => $request->tanggal_2_strip[$i],
                'tanggal_3_checklist' => $request->tanggal_3_checklist[$i],
                'tanggal_3_strip' => $request->tanggal_3_strip[$i],
                'tanggal_4_checklist' => $request->tanggal_4_checklist[$i],
                'tanggal_4_strip' => $request->tanggal_4_strip[$i],
                'tanggal_5_checklist' => $request->tanggal_5_checklist[$i],
                'tanggal_5_strip' => $request->tanggal_5_strip[$i],
                'tanggal_6_checklist' => $request->tanggal_6_checklist[$i],
                'tanggal_6_strip' => $request->tanggal_6_strip[$i],
                'tanggal_7_checklist' => $request->tanggal_7_checklist[$i],
                'tanggal_7_strip' => $request->tanggal_7_strip[$i],
                'tanggal_8_checklist' => $request->tanggal_8_checklist[$i],
                'tanggal_8_strip' => $request->tanggal_8_strip[$i],
                'tanggal_9_checklist' => $request->tanggal_9_checklist[$i],
                'tanggal_9_strip' => $request->tanggal_9_strip[$i],
                'tanggal_10_checklist' => $request->tanggal_10_checklist[$i],
                'tanggal_10_strip' => $request->tanggal_10_strip[$i],
                'tanggal_11_checklist' => $request->tanggal_11_checklist[$i],
                'tanggal_11_strip' => $request->tanggal_11_strip[$i],
                'tanggal_12_checklist' => $request->tanggal_12_checklist[$i],
                'tanggal_12_strip' => $request->tanggal_12_strip[$i],
                'tanggal_13_checklist' => $request->tanggal_13_checklist[$i],
                'tanggal_13_strip' => $request->tanggal_13_strip[$i],
                'tanggal_14_checklist' => $request->tanggal_14_checklist[$i],
                'tanggal_14_strip' => $request->tanggal_14_strip[$i],
                'tanggal_15_checklist' => $request->tanggal_15_checklist[$i],
                'tanggal_15_strip' => $request->tanggal_15_strip[$i],
                'tanggal_16_checklist' => $request->tanggal_16_checklist[$i],
                'tanggal_16_strip' => $request->tanggal_16_strip[$i],
                'tanggal_17_checklist' => $request->tanggal_17_checklist[$i],
                'tanggal_17_strip' => $request->tanggal_17_strip[$i],
                'tanggal_18_checklist' => $request->tanggal_18_checklist[$i],
                'tanggal_18_strip' => $request->tanggal_18_strip[$i],
                'tanggal_19_checklist' => $request->tanggal_19_checklist[$i],
                'tanggal_19_strip' => $request->tanggal_19_strip[$i],
                'tanggal_20_checklist' => $request->tanggal_20_checklist[$i],
                'tanggal_20_strip' => $request->tanggal_20_strip[$i],
                'tanggal_21_checklist' => $request->tanggal_21_checklist[$i],
                'tanggal_21_strip' => $request->tanggal_21_strip[$i],
                'tanggal_22_checklist' => $request->tanggal_22_checklist[$i],
                'tanggal_22_strip' => $request->tanggal_22_strip[$i],
                'tanggal_23_checklist' => $request->tanggal_23_checklist[$i],
                'tanggal_23_strip' => $request->tanggal_23_strip[$i],
                'tanggal_24_checklist' => $request->tanggal_24_checklist[$i],
                'tanggal_24_strip' => $request->tanggal_24_strip[$i],
                'tanggal_25_checklist' => $request->tanggal_25_checklist[$i],
                'tanggal_25_strip' => $request->tanggal_25_strip[$i],
                'tanggal_26_checklist' => $request->tanggal_26_checklist[$i],
                'tanggal_26_strip' => $request->tanggal_26_strip[$i],
                'tanggal_27_checklist' => $request->tanggal_27_checklist[$i],
                'tanggal_27_strip' => $request->tanggal_27_strip[$i],
                'tanggal_28_checklist' => $request->tanggal_28_checklist[$i],
                'tanggal_28_strip' => $request->tanggal_28_strip[$i],
                'tanggal_29_checklist' => $request->tanggal_29_checklist[$i],
                'tanggal_29_strip' => $request->tanggal_29_strip[$i],
                'tanggal_30_checklist' => $request->tanggal_30_checklist[$i],
                'tanggal_30_strip' => $request->tanggal_30_strip[$i],
                'tanggal_31_checklist' => $request->tanggal_31_checklist[$i],
                'tanggal_31_strip' => $request->tanggal_31_strip[$i],
                'jumlah' => $request->jumlah[$i],
                'berat_badan' => $request->berat_badan[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->tahap_lanjutan_bulan); $i++) {
            $insert[$i] = TahapLanjutan::create([
                'tahap_lanjutan_bulan' => $request->tahap_lanjutan_bulan[$i],
                'kartu_pengobatan_id' => $kartu_pengobatan->id,
                'tanggal_lanjutan_1_checklist' => $request->tanggal_lanjutan_1_checklist[$i],
                'tanggal_lanjutan_1_strip' => $request->tanggal_lanjutan_1_strip[$i],
                'tanggal_lanjutan_2_checklist' => $request->tanggal_lanjutan_2_checklist[$i],
                'tanggal_lanjutan_2_strip' => $request->tanggal_lanjutan_2_strip[$i],
                'tanggal_lanjutan_3_checklist' => $request->tanggal_lanjutan_3_checklist[$i],
                'tanggal_lanjutan_3_strip' => $request->tanggal_lanjutan_3_strip[$i],
                'tanggal_lanjutan_4_checklist' => $request->tanggal_lanjutan_4_checklist[$i],
                'tanggal_lanjutan_4_strip' => $request->tanggal_lanjutan_4_strip[$i],
                'tanggal_lanjutan_5_checklist' => $request->tanggal_lanjutan_5_checklist[$i],
                'tanggal_lanjutan_5_strip' => $request->tanggal_lanjutan_5_strip[$i],
                'tanggal_lanjutan_6_checklist' => $request->tanggal_lanjutan_6_checklist[$i],
                'tanggal_lanjutan_6_strip' => $request->tanggal_lanjutan_6_strip[$i],
                'tanggal_lanjutan_7_checklist' => $request->tanggal_lanjutan_7_checklist[$i],
                'tanggal_lanjutan_7_strip' => $request->tanggal_lanjutan_7_strip[$i],
                'tanggal_lanjutan_8_checklist' => $request->tanggal_lanjutan_8_checklist[$i],
                'tanggal_lanjutan_8_strip' => $request->tanggal_lanjutan_8_strip[$i],
                'tanggal_lanjutan_9_checklist' => $request->tanggal_lanjutan_9_checklist[$i],
                'tanggal_lanjutan_9_strip' => $request->tanggal_lanjutan_9_strip[$i],
                'tanggal_lanjutan_10_checklist' => $request->tanggal_lanjutan_10_checklist[$i],
                'tanggal_lanjutan_10_strip' => $request->tanggal_lanjutan_10_strip[$i],
                'tanggal_lanjutan_11_checklist' => $request->tanggal_lanjutan_11_checklist[$i],
                'tanggal_lanjutan_11_strip' => $request->tanggal_lanjutan_11_strip[$i],
                'tanggal_lanjutan_12_checklist' => $request->tanggal_lanjutan_12_checklist[$i],
                'tanggal_lanjutan_12_strip' => $request->tanggal_lanjutan_12_strip[$i],
                'tanggal_lanjutan_13_checklist' => $request->tanggal_lanjutan_13_checklist[$i],
                'tanggal_lanjutan_13_strip' => $request->tanggal_lanjutan_13_strip[$i],
                'tanggal_lanjutan_14_checklist' => $request->tanggal_lanjutan_14_checklist[$i],
                'tanggal_lanjutan_14_strip' => $request->tanggal_lanjutan_14_strip[$i],
                'tanggal_lanjutan_15_checklist' => $request->tanggal_lanjutan_15_checklist[$i],
                'tanggal_lanjutan_15_strip' => $request->tanggal_lanjutan_15_strip[$i],
                'tanggal_lanjutan_16_checklist' => $request->tanggal_lanjutan_16_checklist[$i],
                'tanggal_lanjutan_16_strip' => $request->tanggal_lanjutan_16_strip[$i],
                'tanggal_lanjutan_17_checklist' => $request->tanggal_lanjutan_17_checklist[$i],
                'tanggal_lanjutan_17_strip' => $request->tanggal_lanjutan_17_strip[$i],
                'tanggal_lanjutan_18_checklist' => $request->tanggal_lanjutan_18_checklist[$i],
                'tanggal_lanjutan_18_strip' => $request->tanggal_lanjutan_18_strip[$i],
                'tanggal_lanjutan_19_checklist' => $request->tanggal_lanjutan_19_checklist[$i],
                'tanggal_lanjutan_19_strip' => $request->tanggal_lanjutan_19_strip[$i],
                'tanggal_lanjutan_20_checklist' => $request->tanggal_lanjutan_20_checklist[$i],
                'tanggal_lanjutan_20_strip' => $request->tanggal_lanjutan_20_strip[$i],
                'tanggal_lanjutan_21_checklist' => $request->tanggal_lanjutan_21_checklist[$i],
                'tanggal_lanjutan_21_strip' => $request->tanggal_lanjutan_21_strip[$i],
                'tanggal_lanjutan_22_checklist' => $request->tanggal_lanjutan_22_checklist[$i],
                'tanggal_lanjutan_22_strip' => $request->tanggal_lanjutan_22_strip[$i],
                'tanggal_lanjutan_23_checklist' => $request->tanggal_lanjutan_23_checklist[$i],
                'tanggal_lanjutan_23_strip' => $request->tanggal_lanjutan_23_strip[$i],
                'tanggal_lanjutan_24_checklist' => $request->tanggal_lanjutan_24_checklist[$i],
                'tanggal_lanjutan_24_strip' => $request->tanggal_lanjutan_24_strip[$i],
                'tanggal_lanjutan_25_checklist' => $request->tanggal_lanjutan_25_checklist[$i],
                'tanggal_lanjutan_25_strip' => $request->tanggal_lanjutan_25_strip[$i],
                'tanggal_lanjutan_26_checklist' => $request->tanggal_lanjutan_26_checklist[$i],
                'tanggal_lanjutan_26_strip' => $request->tanggal_lanjutan_26_strip[$i],
                'tanggal_lanjutan_27_checklist' => $request->tanggal_lanjutan_27_checklist[$i],
                'tanggal_lanjutan_27_strip' => $request->tanggal_lanjutan_27_strip[$i],
                'tanggal_lanjutan_28_checklist' => $request->tanggal_lanjutan_28_checklist[$i],
                'tanggal_lanjutan_28_strip' => $request->tanggal_lanjutan_28_strip[$i],
                'tanggal_lanjutan_29_checklist' => $request->tanggal_lanjutan_29_checklist[$i],
                'tanggal_lanjutan_29_strip' => $request->tanggal_lanjutan_29_strip[$i],
                'tanggal_lanjutan_30_checklist' => $request->tanggal_lanjutan_30_checklist[$i],
                'tanggal_lanjutan_30_strip' => $request->tanggal_lanjutan_30_strip[$i],
                'tanggal_lanjutan_31_checklist' => $request->tanggal_lanjutan_31_checklist[$i],
                'tanggal_lanjutan_31_strip' => $request->tanggal_lanjutan_31_strip[$i],
                'jumlah' => $request->lanjutan_jumlah[$i],
                'berat_badan' => $request->lanjutan_berat_badan[$i],
            ]);
        }

        Alert::success('Success', 'Kartu Pengobatan Berhasil Dibuat');
        return redirect("/tb01");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KartuPengobatan  $kartuPengobatan
     * @return \Illuminate\Http\Response
     */
    public function show(KartuPengobatan $kartuPengobatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KartuPengobatan  $kartuPengobatan
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
                $nama_faskes = $data_user->load('nama_faskes');

                $pasiens = PermohonanLab::orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->get();
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();
                $data_kartu_pengobatan = KartuPengobatan::where('id',$id)->with('kontak_serumah','hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','tahap_awal','tahap_lanjutan')->first();
                // print_r(json_decode(json_encode($data_kartu_pengobatan)));

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                // print_r(json_decode(json_encode($data_kartu_pengobatan)));exit;
                return view('tb01.edit_kartu_pengobatan',compact('data_user','pasiens','kecamatans','kelurahans','data_kartu_pengobatan','notification','count_notification','list_min_nows','list_min_satus','list_min_duas','nama_faskes'));
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
                $nama_faskes = $data_user->load('nama_faskes');

                $pasiens = PermohonanLab::orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->get();
                $kecamatans = Kecamatan::all();
                $kelurahans = Kelurahan::all();
                $data_kartu_pengobatan = KartuPengobatan::where('id',$id)->with('kontak_serumah','hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','tahap_awal','tahap_lanjutan')->first();
                // print_r(json_decode(json_encode($data_kartu_pengobatan)));

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                // print_r(json_decode(json_encode($data_kartu_pengobatan)));exit;
                return view('tb01.edit_kartu_pengobatan',compact('data_user','pasiens','kecamatans','kelurahans','data_kartu_pengobatan','notification','count_notification','list_min_nows','list_min_satus','list_min_duas','nama_faskes'));        
            }
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KartuPengobatan  $kartuPengobatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print("<pre>".print_r($request->all(),true)."</pre>");exit;
        if (!empty($request->txtTanggalAnjurShow)) {
            $request->txtTanggalAnjurShow = date('Y-m-d',strtotime($request->txtTanggalAnjurShow));
        }
        if (!empty($request->txtTanggalPreTestShow)) {
            $request->txtTanggalPreTestShow = date('Y-m-d',strtotime($request->txtTanggalPreTestShow));
        }
        if (!empty($request->txtTanggalTestShow)) {
            $request->txtTanggalTestShow = date('Y-m-d',strtotime($request->txtTanggalTestShow));
        }
        if (!empty($request->txtTanggalPostTestShow)) {
            $request->txtTanggalPostTestShow = date('Y-m-d',strtotime($request->txtTanggalPostTestShow));
        }
        if (!empty($request->txtPDPTanggalRujukanShow)) {
            $request->txtPDPTanggalRujukanShow = date('Y-m-d',strtotime($request->txtPDPTanggalRujukanShow));
        }
        if (!empty($request->txtTanggalMulaiPPKShow)) {
            $request->txtTanggalMulaiPPKShow = date('Y-m-d',strtotime($request->txtTanggalMulaiPPKShow));
        }

        if (!empty($request->txtTanggalMulaiARTShow)) {
            $request->txtTanggalMulaiARTShow = date('Y-m-d',strtotime($request->txtTanggalMulaiARTShow));
        }

        if (!empty($request->txtTanggalHasilShow)) {
            $request->txtTanggalHasilShow = date('Y-m-d',strtotime($request->txtTanggalHasilShow));
        }

        if (!empty($request->foto_toraks)) {
            $request->foto_toraks = date('Y-m-d',strtotime($request->foto_toraks));
        }

        if (!empty($request->biopsi_jarum)) {
            $request->biopsi_jarum = date('Y-m-d',strtotime($request->biopsi_jarum));
        }

        $kartu_pengobatan = KartuPengobatan::where('id',$id)->update([
            'pasien_id' => $request->pasien_id,
            'telepon' => $request->txtTelp,
            'nama_pmo' => $request->txtNamaPMO,
            'telepon_pmo' => $request->txtTelpPMO,
            'alamat_pmo' => $request->txtAlamatPMO,
            'tahun' => $request->txtTahun,
            'no_reg_tb03_upk' => $request->txtNoRegTB03UPK,
            'nama_upk' => $request->txtNamaUPK,
            'no_reg_tb03_kab_kota' => $request->txtNoRegTB03Kab,
            'parut_bcg' => $request->cmbBCG,
            'klasifikasi_penyakit' => $request->cmbKlasifikasi,
            'dirujuk_oleh' => $request->cmbDirujuk,
            'riwayat_pengobatan_sebelumnya' => $request->cmbRiwayat,
            'lokasi' => $request->txtLokasi,
            'tipe_pasien' => $request->cmbTipePasien,
            'jenis_oat' => $request->cmbJenisOAT,
            'tahap_intensif' => $request->cmbTahapIntensif,
            'catatan' => $request->txtCatatan,
            'empatkdt' => $request->txtEKDT,
            'duakdt' => $request->txtDKDT,
            'streptomisin' => $request->txtStrep,
            'sthambutol' => $request->txtEtham,
            'tanggal_dianjurkan' => $request->txtTanggalAnjurShow,
            'tanggal_pre_test' => $request->txtTanggalPreTestShow,
            'tanggal_post_test' => $request->txtTanggalPostTestShow,
            'tempat_test' => $request->txtTempatTest,
            'tanggal_test' => $request->txtTanggalTestShow,
            'hasil_test' => $request->cmbHasilTest,
            'nama_upk2' => $request->txtPDPNamaUPK,
            'ppk' => $request->cmb_ppk,
            'hrt' => $request->cmb_hrt,
            'no_reg_pra_art' => $request->txtPDPNoReg,
            'tanggal_rujukan_pdp' => $request->txtPDPTanggalRujukanShow,
            'tanggal_mulai_ppk' => $request->txtTanggalMulaiPPKShow,
            'tanggal_mulai_art' => $request->txtTanggalMulaiARTShow,
            'hasil_akhir_pengobatan' => $request->cmbHasilAkhir,
            'tanggal_hasil' => $request->txtTanggalHasilShow,
            'tipe_diagnosis'=> $request->tipeDiagnosis,
            'status_hiv' => $request->status_hiv,
            'uji_tuberkulin'=> $request->uji_tuberkulin,
            'dirujuk_lainnya'=> $request->txtDirujuk ,
            'nomor_seri'=> $request->nomor_seri,
            'foto_toraks'=> $request->foto_toraks,
            'biopsi_jarum_halus'=> $request->biopsi_jarum,
            'kesan'=> $request->kesan,
            'hasil_selain_dahak'=> $request->contoh_uji_selain_dahak,
            'sumber_obat'=> $request->sumber_obat,
            'kontak_erat'=> $request->kontak_erat,
            'hasil'=> $request->txthasil,
            'biakan_hasil_contoh_uji_selain_dahak'=>$request->sebutkan_biakan_hasil_contoh_uji_selain_dahak,
            'riwayat_dm'=> $request->riwayat_dm,
            'hasil_tes_dm'=> $request->hasil_tes_dm,
            'terampil_dm'=> $request->terampil_dm,
            'tipe_pasien_lain'=> $request->txtTipePasien,
            'pindahan_nama_faskes'=> $request->nama_faskes_pindahan,
            'pindahan_kabupaten'=> $request->kabupaten_pindahan,
            'pindahan_alamat'=> $request->alamat_faskes_pindahan,
            'pindahan_provinsi' => $request->provinsi_pindahan,
            'sumber_obat_lain_lain' => $request->sumber_obat_lain_lain,
            ]);

        for ($i=0; $i <sizeof($request->nama_lengkap_edit); $i++) { 
            $tanggal_periksa_edit[$i] = $request->tanggal_periksa_edit[$i];
            if (!empty($tanggal_periksa_edit[$i])) {
                $tanggal_periksa_edit[$i] = date('Y-m-d',strtotime($tanggal_periksa_edit[$i]));
            }
            $kontak_serumah_id[$i] = $request->kontak_serumah_id[$i];
            $nama_lengkap_edit[$i] = $request->nama_lengkap_edit[$i];
            $jenis_kelamin_kontak_serumah_edit[$i] = $request->jenis_kelamin_kontak_serumah_edit[$i];
            $umur_edit[$i] = $request->umur_edit[$i];
            $hasil_edit[$i] = $request->hasil_edit[$i];
            $tanggal_periksa_edit[$i] = $request->tanggal_periksa_edit[$i];
            $tindak_lanjut_edit[$i] = $request->tindak_lanjut_edit[$i];
            $update[$i] = KontakSerumah::where('id',$kontak_serumah_id[$i])->update([
                'nama_lengkap' => $nama_lengkap_edit[$i],
                'jenis_kelamin' => $jenis_kelamin_kontak_serumah_edit[$i],
                'umur' => $umur_edit[$i],
                'tanggal_periksa' => $tanggal_periksa_edit[$i],
                'tindak_lanjut' => $tindak_lanjut_edit[$i],
                'hasil' => $hasil_edit[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->nama_lengkap); $i++) { 
            $tanggal_periksa[$i] = $request->tanggal_periksa[$i];
            if (!empty($tanggal_periksa[$i])) {
                $tanggal_periksa[$i] = date('Y-m-d',strtotime($tanggal_periksa[$i]));
            }
            $nama_lengkap[$i] = $request->nama_lengkap[$i];
            $jenis_kelamin_kontak_serumah[$i] = $request->jenis_kelamin_kontak_serumah[$i];
            $umur[$i] = $request->umur[$i];
            $hasil[$i] = $request->hasil[$i];
            $tindak_lanjut[$i] = $request->tindak_lanjut[$i];
            $insert[$i] = KontakSerumah::create([
                'kartu_pengobatan_id' => $id,
                'nama_lengkap' => $nama_lengkap[$i],
                'jenis_kelamin' => $jenis_kelamin_kontak_serumah[$i],
                'umur' => $umur[$i],
                'tanggal_periksa' => $tanggal_periksa[$i],
                'tindak_lanjut' => $tindak_lanjut[$i],
                'hasil' => $hasil[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->bulan_edit); $i++) { 
            $tanggal_pemeriksaan_dahak_edit[$i] = $request->tanggal_pemeriksaan_dahak_edit[$i];
            if (!empty($tanggal_pemeriksaan_dahak_edit[$i])) {
                $tanggal_pemeriksaan_dahak_edit[$i] = date('Y-m-d',strtotime($tanggal_pemeriksaan_dahak_edit[$i]));
            }
            $bulan_edit[$i] = $request->bulan_edit[$i];
            $tanggal_pemeriksaan_id[$i] = $request->tanggal_pemeriksaan_id[$i];
            $tanggal_pemeriksaan_dahak_edit[$i] = $tanggal_pemeriksaan_dahak_edit[$i];
            $no_reg_lab_edit[$i] = $request->no_reg_lab_edit[$i];
            $bta_edit[$i] = $request->bta_edit[$i];
            $bb_edit[$i] = $request->bb_edit[$i];
            $insert[$i] = HasilPemeriksaanDahak::where('id',$tanggal_pemeriksaan_id[$i])->update([ 
                'bulan' => $bulan_edit[$i],
                'tanggal' => $tanggal_pemeriksaan_dahak_edit[$i],
                'no_reg_lab' => $no_reg_lab_edit[$i],
                'bta' => $bta_edit[$i],
                'bb' => $bb_edit[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->bulan); $i++) { 
            $tanggal_pemeriksaan_dahak[$i] = $request->tanggal_pemeriksaan_dahak[$i];
            if (!empty($tanggal_pemeriksaan_dahak[$i])) {
                $tanggal_pemeriksaan_dahak[$i] = date('Y-m-d',strtotime($tanggal_pemeriksaan_dahak[$i]));
            }
            $bulan[$i] = $request->bulan[$i];
            $tanggal_pemeriksaan_dahak[$i] = $tanggal_pemeriksaan_dahak[$i];
            $no_reg_lab[$i] = $request->no_reg_lab[$i];
            $bta[$i] = $request->bta[$i];
            $bb[$i] = $request->bb[$i];
            $insert[$i] = HasilPemeriksaanDahak::create([
                'kartu_pengobatan_id' => $id,
                'bulan' => $bulan[$i],
                'tanggal' => $tanggal_pemeriksaan_dahak[$i],
                'no_reg_lab' => $no_reg_lab[$i],
                'bta' => $bta[$i],
                'bb' => $bb[$i],
            ]);
        }


        for ($i=0; $i <sizeof($request->tahap_awal_bulan); $i++) {
            $insert[$i] = TahapAwal::create([
                'tahap_awal_bulan' => $request->tahap_awal_bulan[$i],
                'kartu_pengobatan_id' => $id,
                'tanggal_1_checklist' => $request->tanggal_1_checklist[$i],
                'tanggal_1_strip' => $request->tanggal_1_strip[$i],
                'tanggal_2_checklist' => $request->tanggal_2_checklist[$i],
                'tanggal_2_strip' => $request->tanggal_2_strip[$i],
                'tanggal_3_checklist' => $request->tanggal_3_checklist[$i],
                'tanggal_3_strip' => $request->tanggal_3_strip[$i],
                'tanggal_4_checklist' => $request->tanggal_4_checklist[$i],
                'tanggal_4_strip' => $request->tanggal_4_strip[$i],
                'tanggal_5_checklist' => $request->tanggal_5_checklist[$i],
                'tanggal_5_strip' => $request->tanggal_5_strip[$i],
                'tanggal_6_checklist' => $request->tanggal_6_checklist[$i],
                'tanggal_6_strip' => $request->tanggal_6_strip[$i],
                'tanggal_7_checklist' => $request->tanggal_7_checklist[$i],
                'tanggal_7_strip' => $request->tanggal_7_strip[$i],
                'tanggal_8_checklist' => $request->tanggal_8_checklist[$i],
                'tanggal_8_strip' => $request->tanggal_8_strip[$i],
                'tanggal_9_checklist' => $request->tanggal_9_checklist[$i],
                'tanggal_9_strip' => $request->tanggal_9_strip[$i],
                'tanggal_10_checklist' => $request->tanggal_10_checklist[$i],
                'tanggal_10_strip' => $request->tanggal_10_strip[$i],
                'tanggal_11_checklist' => $request->tanggal_11_checklist[$i],
                'tanggal_11_strip' => $request->tanggal_11_strip[$i],
                'tanggal_12_checklist' => $request->tanggal_12_checklist[$i],
                'tanggal_12_strip' => $request->tanggal_12_strip[$i],
                'tanggal_13_checklist' => $request->tanggal_13_checklist[$i],
                'tanggal_13_strip' => $request->tanggal_13_strip[$i],
                'tanggal_14_checklist' => $request->tanggal_14_checklist[$i],
                'tanggal_14_strip' => $request->tanggal_14_strip[$i],
                'tanggal_15_checklist' => $request->tanggal_15_checklist[$i],
                'tanggal_15_strip' => $request->tanggal_15_strip[$i],
                'tanggal_16_checklist' => $request->tanggal_16_checklist[$i],
                'tanggal_16_strip' => $request->tanggal_16_strip[$i],
                'tanggal_17_checklist' => $request->tanggal_17_checklist[$i],
                'tanggal_17_strip' => $request->tanggal_17_strip[$i],
                'tanggal_18_checklist' => $request->tanggal_18_checklist[$i],
                'tanggal_18_strip' => $request->tanggal_18_strip[$i],
                'tanggal_19_checklist' => $request->tanggal_19_checklist[$i],
                'tanggal_19_strip' => $request->tanggal_19_strip[$i],
                'tanggal_20_checklist' => $request->tanggal_20_checklist[$i],
                'tanggal_20_strip' => $request->tanggal_20_strip[$i],
                'tanggal_21_checklist' => $request->tanggal_21_checklist[$i],
                'tanggal_21_strip' => $request->tanggal_21_strip[$i],
                'tanggal_22_checklist' => $request->tanggal_22_checklist[$i],
                'tanggal_22_strip' => $request->tanggal_22_strip[$i],
                'tanggal_23_checklist' => $request->tanggal_23_checklist[$i],
                'tanggal_23_strip' => $request->tanggal_23_strip[$i],
                'tanggal_24_checklist' => $request->tanggal_24_checklist[$i],
                'tanggal_24_strip' => $request->tanggal_24_strip[$i],
                'tanggal_25_checklist' => $request->tanggal_25_checklist[$i],
                'tanggal_25_strip' => $request->tanggal_25_strip[$i],
                'tanggal_26_checklist' => $request->tanggal_26_checklist[$i],
                'tanggal_26_strip' => $request->tanggal_26_strip[$i],
                'tanggal_27_checklist' => $request->tanggal_27_checklist[$i],
                'tanggal_27_strip' => $request->tanggal_27_strip[$i],
                'tanggal_28_checklist' => $request->tanggal_28_checklist[$i],
                'tanggal_28_strip' => $request->tanggal_28_strip[$i],
                'tanggal_29_checklist' => $request->tanggal_29_checklist[$i],
                'tanggal_29_strip' => $request->tanggal_29_strip[$i],
                'tanggal_30_checklist' => $request->tanggal_30_checklist[$i],
                'tanggal_30_strip' => $request->tanggal_30_strip[$i],
                'tanggal_31_checklist' => $request->tanggal_31_checklist[$i],
                'tanggal_31_strip' => $request->tanggal_31_strip[$i],
                'jumlah' => $request->jumlah[$i],
                'berat_badan' => $request->berat_badan[$i],

            ]);
        }

        for ($i=0; $i <sizeof($request->tahap_lanjutan_bulan); $i++) {
            $insert[$i] = TahapLanjutan::create([
                'tahap_lanjutan_bulan' => $request->tahap_lanjutan_bulan[$i],
                'kartu_pengobatan_id' => $id,
                'tanggal_lanjutan_1_checklist' => $request->tanggal_lanjutan_1_checklist[$i],
                'tanggal_lanjutan_1_strip' => $request->tanggal_lanjutan_1_strip[$i],
                'tanggal_lanjutan_2_checklist' => $request->tanggal_lanjutan_2_checklist[$i],
                'tanggal_lanjutan_2_strip' => $request->tanggal_lanjutan_2_strip[$i],
                'tanggal_lanjutan_3_checklist' => $request->tanggal_lanjutan_3_checklist[$i],
                'tanggal_lanjutan_3_strip' => $request->tanggal_lanjutan_3_strip[$i],
                'tanggal_lanjutan_4_checklist' => $request->tanggal_lanjutan_4_checklist[$i],
                'tanggal_lanjutan_4_strip' => $request->tanggal_lanjutan_4_strip[$i],
                'tanggal_lanjutan_5_checklist' => $request->tanggal_lanjutan_5_checklist[$i],
                'tanggal_lanjutan_5_strip' => $request->tanggal_lanjutan_5_strip[$i],
                'tanggal_lanjutan_6_checklist' => $request->tanggal_lanjutan_6_checklist[$i],
                'tanggal_lanjutan_6_strip' => $request->tanggal_lanjutan_6_strip[$i],
                'tanggal_lanjutan_7_checklist' => $request->tanggal_lanjutan_7_checklist[$i],
                'tanggal_lanjutan_7_strip' => $request->tanggal_lanjutan_7_strip[$i],
                'tanggal_lanjutan_8_checklist' => $request->tanggal_lanjutan_8_checklist[$i],
                'tanggal_lanjutan_8_strip' => $request->tanggal_lanjutan_8_strip[$i],
                'tanggal_lanjutan_9_checklist' => $request->tanggal_lanjutan_9_checklist[$i],
                'tanggal_lanjutan_9_strip' => $request->tanggal_lanjutan_9_strip[$i],
                'tanggal_lanjutan_10_checklist' => $request->tanggal_lanjutan_10_checklist[$i],
                'tanggal_lanjutan_10_strip' => $request->tanggal_lanjutan_10_strip[$i],
                'tanggal_lanjutan_11_checklist' => $request->tanggal_lanjutan_11_checklist[$i],
                'tanggal_lanjutan_11_strip' => $request->tanggal_lanjutan_11_strip[$i],
                'tanggal_lanjutan_12_checklist' => $request->tanggal_lanjutan_12_checklist[$i],
                'tanggal_lanjutan_12_strip' => $request->tanggal_lanjutan_12_strip[$i],
                'tanggal_lanjutan_13_checklist' => $request->tanggal_lanjutan_13_checklist[$i],
                'tanggal_lanjutan_13_strip' => $request->tanggal_lanjutan_13_strip[$i],
                'tanggal_lanjutan_14_checklist' => $request->tanggal_lanjutan_14_checklist[$i],
                'tanggal_lanjutan_14_strip' => $request->tanggal_lanjutan_14_strip[$i],
                'tanggal_lanjutan_15_checklist' => $request->tanggal_lanjutan_15_checklist[$i],
                'tanggal_lanjutan_15_strip' => $request->tanggal_lanjutan_15_strip[$i],
                'tanggal_lanjutan_16_checklist' => $request->tanggal_lanjutan_16_checklist[$i],
                'tanggal_lanjutan_16_strip' => $request->tanggal_lanjutan_16_strip[$i],
                'tanggal_lanjutan_17_checklist' => $request->tanggal_lanjutan_17_checklist[$i],
                'tanggal_lanjutan_17_strip' => $request->tanggal_lanjutan_17_strip[$i],
                'tanggal_lanjutan_18_checklist' => $request->tanggal_lanjutan_18_checklist[$i],
                'tanggal_lanjutan_18_strip' => $request->tanggal_lanjutan_18_strip[$i],
                'tanggal_lanjutan_19_checklist' => $request->tanggal_lanjutan_19_checklist[$i],
                'tanggal_lanjutan_19_strip' => $request->tanggal_lanjutan_19_strip[$i],
                'tanggal_lanjutan_20_checklist' => $request->tanggal_lanjutan_20_checklist[$i],
                'tanggal_lanjutan_20_strip' => $request->tanggal_lanjutan_20_strip[$i],
                'tanggal_lanjutan_21_checklist' => $request->tanggal_lanjutan_21_checklist[$i],
                'tanggal_lanjutan_21_strip' => $request->tanggal_lanjutan_21_strip[$i],
                'tanggal_lanjutan_22_checklist' => $request->tanggal_lanjutan_22_checklist[$i],
                'tanggal_lanjutan_22_strip' => $request->tanggal_lanjutan_22_strip[$i],
                'tanggal_lanjutan_23_checklist' => $request->tanggal_lanjutan_23_checklist[$i],
                'tanggal_lanjutan_23_strip' => $request->tanggal_lanjutan_23_strip[$i],
                'tanggal_lanjutan_24_checklist' => $request->tanggal_lanjutan_24_checklist[$i],
                'tanggal_lanjutan_24_strip' => $request->tanggal_lanjutan_24_strip[$i],
                'tanggal_lanjutan_25_checklist' => $request->tanggal_lanjutan_25_checklist[$i],
                'tanggal_lanjutan_25_strip' => $request->tanggal_lanjutan_25_strip[$i],
                'tanggal_lanjutan_26_checklist' => $request->tanggal_lanjutan_26_checklist[$i],
                'tanggal_lanjutan_26_strip' => $request->tanggal_lanjutan_26_strip[$i],
                'tanggal_lanjutan_27_checklist' => $request->tanggal_lanjutan_27_checklist[$i],
                'tanggal_lanjutan_27_strip' => $request->tanggal_lanjutan_27_strip[$i],
                'tanggal_lanjutan_28_checklist' => $request->tanggal_lanjutan_28_checklist[$i],
                'tanggal_lanjutan_28_strip' => $request->tanggal_lanjutan_28_strip[$i],
                'tanggal_lanjutan_29_checklist' => $request->tanggal_lanjutan_29_checklist[$i],
                'tanggal_lanjutan_29_strip' => $request->tanggal_lanjutan_29_strip[$i],
                'tanggal_lanjutan_30_checklist' => $request->tanggal_lanjutan_30_checklist[$i],
                'tanggal_lanjutan_30_strip' => $request->tanggal_lanjutan_30_strip[$i],
                'tanggal_lanjutan_31_checklist' => $request->tanggal_lanjutan_31_checklist[$i],
                'tanggal_lanjutan_31_strip' => $request->tanggal_lanjutan_31_strip[$i],
                'jumlah' => $request->lanjutan_jumlah[$i],
                'berat_badan' => $request->lanjutan_berat_badan[$i],
            ]);
        }

        for ($i=0; $i <sizeof($request->tahap_awal_bulan_edit); $i++) {
            $insert[$i] = TahapAwal::where('id',$request->tahap_awal_id[$i])->update([
                'tahap_awal_bulan' => $request->tahap_awal_bulan_edit[$i],
                'tanggal_1_checklist' => $request->edit_tanggal_1_checklist[$i],
                'tanggal_1_strip' => $request->edit_tanggal_1_strip[$i],
                'tanggal_2_checklist' => $request->edit_tanggal_2_checklist[$i],
                'tanggal_2_strip' => $request->edit_tanggal_2_strip[$i],
                'tanggal_3_checklist' => $request->edit_tanggal_3_checklist[$i],
                'tanggal_3_strip' => $request->edit_tanggal_3_strip[$i],
                'tanggal_4_checklist' => $request->edit_tanggal_4_checklist[$i],
                'tanggal_4_strip' => $request->edit_tanggal_4_strip[$i],
                'tanggal_5_checklist' => $request->edit_tanggal_5_checklist[$i],
                'tanggal_5_strip' => $request->edit_tanggal_5_strip[$i],
                'tanggal_6_checklist' => $request->edit_tanggal_6_checklist[$i],
                'tanggal_6_strip' => $request->edit_tanggal_6_strip[$i],
                'tanggal_7_checklist' => $request->edit_tanggal_7_checklist[$i],
                'tanggal_7_strip' => $request->edit_tanggal_7_strip[$i],
                'tanggal_8_checklist' => $request->edit_tanggal_8_checklist[$i],
                'tanggal_8_strip' => $request->edit_tanggal_8_strip[$i],
                'tanggal_9_checklist' => $request->edit_tanggal_9_checklist[$i],
                'tanggal_9_strip' => $request->edit_tanggal_9_strip[$i],
                'tanggal_10_checklist' => $request->edit_tanggal_10_checklist[$i],
                'tanggal_10_strip' => $request->edit_tanggal_10_strip[$i],
                'tanggal_11_checklist' => $request->edit_tanggal_11_checklist[$i],
                'tanggal_11_strip' => $request->edit_tanggal_11_strip[$i],
                'tanggal_12_checklist' => $request->edit_tanggal_12_checklist[$i],
                'tanggal_12_strip' => $request->edit_tanggal_12_strip[$i],
                'tanggal_13_checklist' => $request->edit_tanggal_13_checklist[$i],
                'tanggal_13_strip' => $request->edit_tanggal_13_strip[$i],
                'tanggal_14_checklist' => $request->edit_tanggal_14_checklist[$i],
                'tanggal_14_strip' => $request->edit_tanggal_14_strip[$i],
                'tanggal_15_checklist' => $request->edit_tanggal_15_checklist[$i],
                'tanggal_15_strip' => $request->edit_tanggal_15_strip[$i],
                'tanggal_16_checklist' => $request->edit_tanggal_16_checklist[$i],
                'tanggal_16_strip' => $request->edit_tanggal_16_strip[$i],
                'tanggal_17_checklist' => $request->edit_tanggal_17_checklist[$i],
                'tanggal_17_strip' => $request->edit_tanggal_17_strip[$i],
                'tanggal_18_checklist' => $request->edit_tanggal_18_checklist[$i],
                'tanggal_18_strip' => $request->edit_tanggal_18_strip[$i],
                'tanggal_19_checklist' => $request->edit_tanggal_19_checklist[$i],
                'tanggal_19_strip' => $request->edit_tanggal_19_strip[$i],
                'tanggal_20_checklist' => $request->edit_tanggal_20_checklist[$i],
                'tanggal_20_strip' => $request->edit_tanggal_20_strip[$i],
                'tanggal_21_checklist' => $request->edit_tanggal_21_checklist[$i],
                'tanggal_21_strip' => $request->edit_tanggal_21_strip[$i],
                'tanggal_22_checklist' => $request->edit_tanggal_22_checklist[$i],
                'tanggal_22_strip' => $request->edit_tanggal_22_strip[$i],
                'tanggal_23_checklist' => $request->edit_tanggal_23_checklist[$i],
                'tanggal_23_strip' => $request->edit_tanggal_23_strip[$i],
                'tanggal_24_checklist' => $request->edit_tanggal_24_checklist[$i],
                'tanggal_24_strip' => $request->edit_tanggal_24_strip[$i],
                'tanggal_25_checklist' => $request->edit_tanggal_25_checklist[$i],
                'tanggal_25_strip' => $request->edit_tanggal_25_strip[$i],
                'tanggal_26_checklist' => $request->edit_tanggal_26_checklist[$i],
                'tanggal_26_strip' => $request->edit_tanggal_26_strip[$i],
                'tanggal_27_checklist' => $request->edit_tanggal_27_checklist[$i],
                'tanggal_27_strip' => $request->edit_tanggal_27_strip[$i],
                'tanggal_28_checklist' => $request->edit_tanggal_28_checklist[$i],
                'tanggal_28_strip' => $request->edit_tanggal_28_strip[$i],
                'tanggal_29_checklist' => $request->edit_tanggal_29_checklist[$i],
                'tanggal_29_strip' => $request->edit_tanggal_29_strip[$i],
                'tanggal_30_checklist' => $request->edit_tanggal_30_checklist[$i],
                'tanggal_30_strip' => $request->edit_tanggal_30_strip[$i],
                'tanggal_31_checklist' => $request->edit_tanggal_31_checklist[$i],
                'tanggal_31_strip' => $request->edit_tanggal_31_strip[$i],
                'jumlah' => $request->edit_jumlah[$i],
                'berat_badan' => $request->edit_berat_badan[$i],

            ]);
        }
        // print("<pre>".print_r($request->edit_tanggal_lanjutan_1_checklist,true)."</pre>");exit;



        for ($i=0; $i <sizeof($request->edit_tahap_lanjutan_bulan); $i++) {
            
            $insert[$i] = TahapLanjutan::where('id',$request->tahap_lanjutan_id[$i])->update([
                'tahap_lanjutan_bulan' => $request->edit_tahap_lanjutan_bulan[$i],
                'tanggal_lanjutan_1_checklist' => $request->edit_tanggal_lanjutan_1_checklist[$i],
                'tanggal_lanjutan_1_strip' => $request->edit_tanggal_lanjutan_1_strip[$i],
                'tanggal_lanjutan_2_checklist' => $request->edit_tanggal_lanjutan_2_checklist[$i],
                'tanggal_lanjutan_2_strip' => $request->edit_tanggal_lanjutan_2_strip[$i],
                'tanggal_lanjutan_3_checklist' => $request->edit_tanggal_lanjutan_3_checklist[$i],
                'tanggal_lanjutan_3_strip' => $request->edit_tanggal_lanjutan_3_strip[$i],
                'tanggal_lanjutan_4_checklist' => $request->edit_tanggal_lanjutan_4_checklist[$i],
                'tanggal_lanjutan_4_strip' => $request->edit_tanggal_lanjutan_4_strip[$i],
                'tanggal_lanjutan_5_checklist' => $request->edit_tanggal_lanjutan_5_checklist[$i],
                'tanggal_lanjutan_5_strip' => $request->edit_tanggal_lanjutan_5_strip[$i],
                'tanggal_lanjutan_6_checklist' => $request->edit_tanggal_lanjutan_6_checklist[$i],
                'tanggal_lanjutan_6_strip' => $request->edit_tanggal_lanjutan_6_strip[$i],
                'tanggal_lanjutan_7_checklist' => $request->edit_tanggal_lanjutan_7_checklist[$i],
                'tanggal_lanjutan_7_strip' => $request->edit_tanggal_lanjutan_7_strip[$i],
                'tanggal_lanjutan_8_checklist' => $request->edit_tanggal_lanjutan_8_checklist[$i],
                'tanggal_lanjutan_8_strip' => $request->edit_tanggal_lanjutan_8_strip[$i],
                'tanggal_lanjutan_9_checklist' => $request->edit_tanggal_lanjutan_9_checklist[$i],
                'tanggal_lanjutan_9_strip' => $request->edit_tanggal_lanjutan_9_strip[$i],
                'tanggal_lanjutan_10_checklist' => $request->edit_tanggal_lanjutan_10_checklist[$i],
                'tanggal_lanjutan_10_strip' => $request->edit_tanggal_lanjutan_10_strip[$i],
                'tanggal_lanjutan_11_checklist' => $request->edit_tanggal_lanjutan_11_checklist[$i],
                'tanggal_lanjutan_11_strip' => $request->edit_tanggal_lanjutan_11_strip[$i],
                'tanggal_lanjutan_12_checklist' => $request->edit_tanggal_lanjutan_12_checklist[$i],
                'tanggal_lanjutan_12_strip' => $request->edit_tanggal_lanjutan_12_strip[$i],
                'tanggal_lanjutan_13_checklist' => $request->edit_tanggal_lanjutan_13_checklist[$i],
                'tanggal_lanjutan_13_strip' => $request->edit_tanggal_lanjutan_13_strip[$i],
                'tanggal_lanjutan_14_checklist' => $request->edit_tanggal_lanjutan_14_checklist[$i],
                'tanggal_lanjutan_14_strip' => $request->edit_tanggal_lanjutan_14_strip[$i],
                'tanggal_lanjutan_15_checklist' => $request->edit_tanggal_lanjutan_15_checklist[$i],
                'tanggal_lanjutan_15_strip' => $request->edit_tanggal_lanjutan_15_strip[$i],
                'tanggal_lanjutan_16_checklist' => $request->edit_tanggal_lanjutan_16_checklist[$i],
                'tanggal_lanjutan_16_strip' => $request->edit_tanggal_lanjutan_16_strip[$i],
                'tanggal_lanjutan_17_checklist' => $request->edit_tanggal_lanjutan_17_checklist[$i],
                'tanggal_lanjutan_17_strip' => $request->edit_tanggal_lanjutan_17_strip[$i],
                'tanggal_lanjutan_18_checklist' => $request->edit_tanggal_lanjutan_18_checklist[$i],
                'tanggal_lanjutan_18_strip' => $request->edit_tanggal_lanjutan_18_strip[$i],
                'tanggal_lanjutan_19_checklist' => $request->edit_tanggal_lanjutan_19_checklist[$i],
                'tanggal_lanjutan_19_strip' => $request->edit_tanggal_lanjutan_19_strip[$i],
                'tanggal_lanjutan_20_checklist' => $request->edit_tanggal_lanjutan_20_checklist[$i],
                'tanggal_lanjutan_20_strip' => $request->edit_tanggal_lanjutan_20_strip[$i],
                'tanggal_lanjutan_21_checklist' => $request->edit_tanggal_lanjutan_21_checklist[$i],
                'tanggal_lanjutan_21_strip' => $request->edit_tanggal_lanjutan_21_strip[$i],
                'tanggal_lanjutan_22_checklist' => $request->edit_tanggal_lanjutan_22_checklist[$i],
                'tanggal_lanjutan_22_strip' => $request->edit_tanggal_lanjutan_22_strip[$i],
                'tanggal_lanjutan_23_checklist' => $request->edit_tanggal_lanjutan_23_checklist[$i],
                'tanggal_lanjutan_23_strip' => $request->edit_tanggal_lanjutan_23_strip[$i],
                'tanggal_lanjutan_24_checklist' => $request->edit_tanggal_lanjutan_24_checklist[$i],
                'tanggal_lanjutan_24_strip' => $request->edit_tanggal_lanjutan_24_strip[$i],
                'tanggal_lanjutan_25_checklist' => $request->edit_tanggal_lanjutan_25_checklist[$i],
                'tanggal_lanjutan_25_strip' => $request->edit_tanggal_lanjutan_25_strip[$i],
                'tanggal_lanjutan_26_checklist' => $request->edit_tanggal_lanjutan_26_checklist[$i],
                'tanggal_lanjutan_26_strip' => $request->edit_tanggal_lanjutan_26_strip[$i],
                'tanggal_lanjutan_27_checklist' => $request->edit_tanggal_lanjutan_27_checklist[$i],
                'tanggal_lanjutan_27_strip' => $request->edit_tanggal_lanjutan_27_strip[$i],
                'tanggal_lanjutan_28_checklist' => $request->edit_tanggal_lanjutan_28_checklist[$i],
                'tanggal_lanjutan_28_strip' => $request->edit_tanggal_lanjutan_28_strip[$i],
                'tanggal_lanjutan_29_checklist' => $request->edit_tanggal_lanjutan_29_checklist[$i],
                'tanggal_lanjutan_29_strip' => $request->edit_tanggal_lanjutan_29_strip[$i],
                'tanggal_lanjutan_30_checklist' => $request->edit_tanggal_lanjutan_30_checklist[$i],
                'tanggal_lanjutan_30_strip' => $request->edit_tanggal_lanjutan_30_strip[$i],
                'tanggal_lanjutan_31_checklist' => $request->edit_tanggal_lanjutan_31_checklist[$i],
                'tanggal_lanjutan_31_strip' => $request->edit_tanggal_lanjutan_31_strip[$i],
                'jumlah' => $request->edit_jumlah_lanjutan[$i],
                'berat_badan' => $request->edit_berat_badan_lanjutan[$i],

            ]);
        }

        Alert::success('Success', 'Kartu Pengobatan Berhasil Dibuat');
        return redirect("/tb01");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KartuPengobatan  $kartuPengobatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tb01 = KartuPengobatan::find($request->id);
        $tb01->delete();
        return redirect("/tb01");
    }

    // public function prints($id)
    // {
    //     return view('tb01.prints');
    // }

    public function prints($id)
    {
        $data_kartu_pengobatan = KartuPengobatan::where('id',$id)->with('kontak_serumah','hasil_pemeriksaan_dahak','daftar_terduga.nama_faskes','tahap_awal','tahap_lanjutan')->orderBy('id','desc')->first();
        // print("<pre>".print_r(json_decode(json_encode($data_kartu_pengobatan)),true)."</pre>");exit;
        // print_r(json_decode(json_encode($data_kartu_pengobatan)));exit;
        $pdf = PDF::loadView('tb01.prints',compact('data_kartu_pengobatan'))->setPaper('a4', 'landscape');
        // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
        return $pdf->stream('Kartu Pengobatan.pdf');
        // return view('tb01.prints',compact('data_kartu_pengobatan'));
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            $data_user = Auth::user();
            if (empty($data_user)) {
                return redirect('/');
            }
            if ($data_user->level == 1) {
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

                if ($request->action == 'Cetak') {
                   $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                    $pasiens = DaftarTerduga::whereBetween('created_at',[$start_date, $end_date])->with('nama_faskes')->get();
                    $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens','detail_user'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Daftar Terduga TB.pdf');
                }else{
                    $kecamatans = Kecamatan::all();
                    $kelurahans = Kelurahan::all();
                    $data_kartu_pengobatan = KartuPengobatan::whereBetween('created_at',[$start_date, $end_date])->with('daftar_terduga.permohonan_lab.nama_faskes')->get();

                    $pasiens = PermohonanLab::whereBetween('created_at',[$start_date, $end_date])->orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->get();
                    return view('tb01.kartu_pengobatan',compact('pasiens','data_user','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas','count_notification','data_kartu_pengobatan'));
                }
            }else{
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

                if ($request->action == 'Cetak') {
                   $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                    $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('created_at',[$start_date, $end_date])->with('nama_faskes')->get();
                    $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens','detail_user'))->setPaper('a4', 'landscape');
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints',compact('pasiens'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Daftar Terduga TB.pdf');
                }else{
                    $kecamatans = Kecamatan::all();
                    $kelurahans = Kelurahan::all();
                    $data_kartu_pengobatan = KartuPengobatan::whereBetween('created_at',[$start_date, $end_date])->with('daftar_terduga.permohonan_lab.nama_faskes')->get();

                    $pasiens = PermohonanLab::whereBetween('created_at',[$start_date, $end_date])->orWhereNotIn('sewaktu_satu',['negatif'])->orWhereNotIn('sewaktu_pagi',['negatif'])->orWhereNotIn('sewaktu_dua',['negatif'])->with('daftar_terduga')->get();
                    return view('tb01.kartu_pengobatan',compact('pasiens','data_user','kecamatans','kelurahans','list_min_nows','list_min_satus','list_min_duas','count_notification','data_kartu_pengobatan'));
                }
            }
        }else{
            return redirect('/');
        }
    }

    public function daftarTerduga(Request $request){
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
        $pasien_tb_06->save();

        KartuPengobatan::create(['pasien_id'=>$pasien_tb_06->id]);

        return response ()->json ($pasien_tb_06->id);
    }

    public function delete_kontak(Request $request){
        $kontak_serumah = KontakSerumah::find($request->id)->delete();
        return response()->json($kontak_serumah);

    }

    public function delete_tahap_awal(Request $request){
        $tahap_awal = TahapAwal::find($request->id)->delete();
        return response()->json($tahap_awal);

    }

    public function delete_tahap_lanjutan(Request $request){
        $tahap_lanjutan = TahapLanjutan::find($request->id)->delete();
        return response()->json($tahap_lanjutan);

    }

}

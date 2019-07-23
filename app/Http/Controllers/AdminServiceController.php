<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Merchant;
use App\ServicePoint;
use App\AdminService;
use App\DaftarTerduga;
use DB;
use Charts;
use App\JadwalPerjanjian;
use Carbon\Carbon;
use App\KartuPengobatan;
use App\PermohonanLab;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Merchant $merchant)
    {
        $data_user = Auth::user();
        $admin_services = AdminService::orderBy('id')->with('merchant','service_point')->get();
        return view('service_admin.list_admin_service',compact('data_user','admin_services','service_point'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        $merchants = Merchant::all();
        $service_points = ServicePoint::all();
        return view('service_admin.create_admin_service',compact('data_user','merchants','service_points'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminService::create([
            'nomor_laporan' => request('nomor_laporan'),
            'merchant_id' => request('merchant_id'),
            'service_point_id' => request('service_point_id'),
            'description' => request('description'),
            'status' => 1,
            ]);
        flash()->overlay("Service is Created", 'Greet');
        return redirect("/admin-services");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function show(AdminService $adminService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminService $adminService)
    {
        $data_user = Auth::user();
        $merchants = Merchant::all();
        $service_points = ServicePoint::all();
        $admin_services = AdminService::find('id');
        $nama_merchant = Merchant::whereId($adminService['merchant_id'])->get();
        $nama_service_point = ServicePoint::whereId($adminService['service_point_id'])->get();
        // print($nama_merchant[0]['id']);exit;
        // print_r(json_decode(json_encode($nama_service_point[0]['nama'])));exit;
        return view('service_admin.edit_admin_service',compact('adminService','data_user','merchants','service_points','nama_merchant','nama_service_point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AdminService::where('id',$id)->update([
            'nomor_laporan'         => request('nomor_laporan'),
            'merchant_id'           => request('merchant_id'),
            'service_point_id'      => request('service_point_id'),
            'description'           => request('description'),
            'status'                => 1,
            ]);
        flash()->overlay("Service is Updated", 'Greet');
        return redirect("/admin-services");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminService  $adminService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminService $adminService)
    {
        $admin_service = AdminService::find($request->id);
        $admin_service->delete();
        return redirect("/admin-services");
    }

    public function delete(Request $request)
    {
        $admin_service = AdminService::find($request->id);
        $admin_service->delete();
        return redirect("/admin-services");
    }

    public function report()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        return view('service_admin.report',compact('data_user','services_completed'));
    }

    public function postRepost(Request $request)
    {
        $data_user = Auth::user();
        $date_from = $request['date_from'];
        $date_to =  $request['date_to'];
        $mulai = date('d F Y', strtotime($date_from));
        $selesai = date('d F Y', strtotime($date_to));
        $services_completed = AdminService::where('status',4)->whereDate('created_at','>=',$date_from)->whereDate('created_at','<=',$date_to)->with('merchant','service_point','user','work_order')->get();
        return view('print',compact('data_user','services_completed','mulai','selesai'));

    }

    public function dashboard ()
    {    
        $data_user = Auth::user();
        $now = Carbon::now()->toDateString();
        $twoDays = Carbon::now()->addDays(2)->toDateString();
        $oneDays = Carbon::now()->addDays(1)->toDateString();
        $sekarang = Carbon::now()->toDateString();
        if ($data_user->level == 1) {
        	$count_notification = DB::table('jadwal_perjanjians')
	                                ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
	                                ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
	                                ->select('jadwal_perjanjians.*')
	                                ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
	                                ->where('jadwal_perjanjians.deleted_at', null)
	                                ->count();     
	        $nama_faskes = $data_user->load('nama_faskes');      
	        $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
	        $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
	        $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

	        $jumlah_skoring_tb_anak = KartuPengobatan::with('daftar_terduga')->where('tahap_intensif','Kategori Anak')->get();

	        $jumlah_terdiagnosis_klinis = KartuPengobatan::with('daftar_terduga')->where('tipe_diagnosis','Terdiagnosis Klinis')->count();

	        $kambuh = KartuPengobatan::with('daftar_terduga')->where('riwayat_pengobatan_sebelumnya','Kambuh')->count();

	        $jumlah_suspek = DaftarTerduga::count();

	        $sembuh = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Sembuh')->count();

	        $pengobatan_lengkap = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();

	        $jumlah_bakteriologis = PermohonanLab::withCount('daftar_terduga')->groupBy('pasien_id')->get();
	        $total_bakteriologis = $jumlah_bakteriologis->sum('daftar_terduga_count');

	        // $jumlah_bakteriologis = DaftarTerduga::withCount('permohonan_lab')->where('faskes_id', $data_user->faskes_id)->get();
	        // $testing = $jumlah_bakteriologis->permohonan_lab_count->get();

	        // $hasil_bta = PermohonanLab::with('daftar_terduga')->where('plus_3_sewaktu_1','on')->OrWhere('plus_2_sewaktu_1','on')->OrWhere('plus_1_sewaktu_1','on')->OrWhere('plus_3_sewaktu_2','on')->OrWhere('plus_2_sewaktu_2','on')->OrWhere('plus_1_sewaktu_2','on')->OrWhere('plus_2_sewaktu_1','on')->OrWhere('plus_3_sewaktu_3','on')->OrWhere('plus_2_sewaktu_3','on')->OrWhere('plus_1_sewaktu_3','on')->distinct('pasien_id')->count();
	    
	        $satu = KartuPengobatan::with('daftar_terduga')->where('tipe_diagnosis', 'Terkontaminasi Bakteriologis')->groupBy('pasien_id')->get();
	        $satu = $satu->count();
	        $dua = KartuPengobatan::with('daftar_terduga')->where('tipe_diagnosis', 'Terdiagnosis Klinis')->get();
	        $dua = $dua->count();
	        $tiga = KartuPengobatan::with('daftar_terduga')->where('tahap_intensif','Kategori Anak')->count();
	        $empat = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Sembuh')->count();
	        $lima = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();
	        $enam = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();
	        $tujuh = KartuPengobatan::with('daftar_terduga')->where('riwayat_pengobatan_sebelumnya','Kambuh')->count();
	        $delapan = KartuPengobatan::with('daftar_terduga')->where('klasifikasi_penyakit','Paru')->count();
	        $sembilan = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Gagal')->count();
	        $sepuluh = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Putus Berobat')->count();
	        $sebelas = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Meninggal')->count();
	        $duabelas = KartuPengobatan::with('daftar_terduga')->where('hasil_akhir_pengobatan','Tidak Dievaluasi')->count();
	        $tigabelas = KartuPengobatan::with('daftar_terduga')->where('riwayat_pengobatan_sebelumnya','Baru')->count();
        }else{
	        $count_notification = DB::table('jadwal_perjanjians')
	                                ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
	                                ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
	                                ->select('jadwal_perjanjians.*')
	                                ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
	                                ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
	                                ->where('jadwal_perjanjians.deleted_at', null)
	                                ->count();     
	        $nama_faskes = $data_user->load('nama_faskes');      
	        $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
	        $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
	        $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

	        $jumlah_skoring_tb_anak = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('tahap_intensif','Kategori Anak')->get();

	        $jumlah_terdiagnosis_klinis = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('tipe_diagnosis','Terdiagnosis Klinis')->count();

	        $kambuh = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('riwayat_pengobatan_sebelumnya','Kambuh')->count();

	        $jumlah_suspek = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->count();

	        $sembuh = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Sembuh')->count();

	        $pengobatan_lengkap = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();

	        $jumlah_bakteriologis = PermohonanLab::withCount(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->groupBy('pasien_id')->get();
	        $total_bakteriologis = $jumlah_bakteriologis->sum('daftar_terduga_count');

	        // $jumlah_bakteriologis = DaftarTerduga::withCount('permohonan_lab')->where('faskes_id', $data_user->faskes_id)->get();
	        // $testing = $jumlah_bakteriologis->permohonan_lab_count->get();

	        // $hasil_bta = PermohonanLab::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('plus_3_sewaktu_1','on')->OrWhere('plus_2_sewaktu_1','on')->OrWhere('plus_1_sewaktu_1','on')->OrWhere('plus_3_sewaktu_2','on')->OrWhere('plus_2_sewaktu_2','on')->OrWhere('plus_1_sewaktu_2','on')->OrWhere('plus_2_sewaktu_1','on')->OrWhere('plus_3_sewaktu_3','on')->OrWhere('plus_2_sewaktu_3','on')->OrWhere('plus_1_sewaktu_3','on')->distinct('pasien_id')->count();
	    
	        $satu = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('tipe_diagnosis', 'Terkontaminasi Bakteriologis')->groupBy('pasien_id')->get();
	        $satu = $satu->count();
	        $dua = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('tipe_diagnosis', 'Terdiagnosis Klinis')->get();
	        $dua = $dua->count();
	        $tiga = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('tahap_intensif','Kategori Anak')->count();
	        $empat = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Sembuh')->count();
	        $lima = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();
	        $enam = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Pengobatan Lengkap')->count();
	        $tujuh = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('riwayat_pengobatan_sebelumnya','Kambuh')->count();
	        $delapan = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('klasifikasi_penyakit','Paru')->count();
	        $sembilan = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Gagal')->count();
	        $sepuluh = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Putus Berobat')->count();
	        $sebelas = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Meninggal')->count();
	        $duabelas = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('hasil_akhir_pengobatan','Tidak Dievaluasi')->count();
	        $tigabelas = KartuPengobatan::with(['daftar_terduga' => function($query) {$data_user = Auth::user();$query->where('faskes_id', $data_user->faskes_id);}])->where('riwayat_pengobatan_sebelumnya','Baru')->count();
        	
        }

        return view('dashboard',compact('data_user','count_notification','jumlah_suspek','list_min_nows','list_min_satus','list_min_duas','jumlah_skoring_tb_anak','jumlah_terdiagnosis_klinis','kambuh','sembuh','pengobatan_lengkap','total_bakteriologis','nama_faskes','satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan','sepuluh','sebelas','duabelas','tigabelas'));
    }

    public function schedule()
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',2)->orderBy('id')->with('merchant','service_point','user')->get();
        return view('service_admin.list_schedule_services',compact('data_user','engineer_services'));
    }   

    public function completed()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('service_admin.list_completed_services',compact('data_user','services_completed'));
    }

    public function detailServicesCompleted($id)
    {
        $data_user = Auth::user();
        $detail_services = AdminService::with('merchant','service_point','user','work_order')->find($id);
        return view('service_admin.detail_services_completed',compact('detail_services','data_user'));
    }

    public function test ()
    {
        return view('print');
    }

}

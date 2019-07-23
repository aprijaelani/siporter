<?php

namespace App\Http\Controllers;

use App\RegisterLaboratorium;
use Illuminate\Http\Request;
use App\PermohonanLab;
use App\NamaFaskes;
use PDF;
use App\Dokter;
use App\DaftarTerduga;
use Alert;
use Auth;
use App\User;
use DB;
use Carbon\Carbon;
use App\JadwalPerjanjian;

class RegisterLaboratoriumController extends Controller
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
                $permohonan_labs = PermohonanLab::with('dokter','daftar_terduga.nama_faskes')->get();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();       
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                return view('tb04.register_laboratorium',compact('permohonan_labs','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
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
                $permohonan_labs = PermohonanLab::with('dokter','daftar_terduga.nama_faskes')->where('faskes_id',$data_user->faskes_id)->get();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();       
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                return view('tb04.register_laboratorium',compact('permohonan_labs','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
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
     * @param  \App\RegisterLaboratorium  $registerLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterLaboratorium $registerLaboratorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegisterLaboratorium  $registerLaboratorium
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
                $pasiens = DaftarTerduga::all();
                $dokters = Dokter::all();
                $permohonan_labs = PermohonanLab::where('id',$id)->first();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                return view('tb04.edit_permohonan_lab',compact('pasiens','dokters','permohonan_labs','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
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
                $pasiens = DaftarTerduga::all();
                $dokters = Dokter::all();
                $permohonan_labs = PermohonanLab::where('id',$id)->first();

                $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
                $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

                return view('tb04.edit_permohonan_lab',compact('pasiens','dokters','permohonan_labs','data_user','count_notification','list_min_nows','list_min_satus','list_min_duas'));
            }
        }else{
            return redirect('/');
        }        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegisterLaboratorium  $registerLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->txtTanggalSewaktu1Show)) {
            $request->txtTanggalSewaktu1Show = date('Y-m-d',strtotime($request->txtTanggalSewaktu1Show));
        }
        if (!empty($request->txtTanggalPagiShow)) {
            $request->txtTanggalPagiShow = date('Y-m-d',strtotime($request->txtTanggalPagiShow));
        }
        if (!empty($request->txtTanggalSewaktu2Show)) {
            $request->txtTanggalSewaktu2Show = date('Y-m-d',strtotime($request->txtTanggalSewaktu2Show));
        }
        PermohonanLab::where('id',$id)->update([
            'tanggal_hasil_sewaktu_1' => $request->txtTanggalSewaktu1Show,
            'tanggal_hasil_sewaktu_2' => $request->txtTanggalPagiShow,
            'tanggal_hasil_sewaktu_3' => $request->txtTanggalSewaktu2Show,
            'sewaktu_satu' => $request->sewaktu_satu,
            'sewaktu_pagi' => $request->sewaktu_pagi,
            'sewaktu_dua' => $request->sewaktu_dua,
            'no_reg_lab' => $request->no_reg_lab,
            ]);
        
        Alert::success('Success', 'TB 04 Berhasil Diperbarui');
        // flash()->overlay('TB 06 Berhasil Diperbarui');
        return redirect("/tb04");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegisterLaboratorium  $registerLaboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $datas = PermohonanLab::find($request->id);
        $datas->delete();
        return response()->json($datas);
    }

    public function prints($id)
    {
        $datas = PermohonanLab::where('id',$id)->with('dokter','nama_faskes','daftar_terduga.nama_faskes')->first();
        // print_r(json_decode(json_encode($datas)));exit;
        $pdf = PDF::loadView('tb04.prints', compact('datas'))->setPaper('a4');
        return $pdf->stream('Daftar Terduga TB.pdf');
    }

    public function print_all()
    {
        $datas = PermohonanLab::with('dokter','nama_faskes','daftar_terduga')->get();
        $pdf = PDF::loadView('tb04.print_all', compact('datas'))->setPaper('a4', 'landscape');
        return $pdf->stream('Register Laboratorium.pdf');
    }

    public function search(Request $request)
    {
        if (Auth::check()) {
            $data_user = Auth::user();
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
                }else{
                    $start_date = '0000-00-00';
                }
                if (!empty($request->end_date)) {
                    $end_date = date('Y-m-d',strtotime($request->end_date));
                }else{
                    $end_date = '0000-00-00';
                }
                if (empty($data_user)) {
                    return redirect('/');
                }

                $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                // print_r(json_decode(json_encode($detail_user)));exit;

                if ($request->action == 'Cetak') {
                    // $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('tanggal_didaftar',[$start_date, $end_date])->get();
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens'))->setPaper('a4', 'landscape');
                    // return $pdf->stream('Daftar Terduga TB.pdf');
                    $datas = PermohonanLab::whereBetween('tanggal_pengiriman_sediaan',[$start_date, $end_date])->with('dokter','nama_faskes','daftar_terduga')->get();
                    // print_r($datas->toArray());exit;
                    $pdf = PDF::loadView('tb04.print_all', compact('datas','detail_user'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Register Laboratorium.pdf');
                }else{

                    $permohonan_labs = PermohonanLab::whereBetween('tanggal_pengiriman_sediaan',[$start_date, $end_date])->with('dokter','nama_faskes','daftar_terduga')->get();
                    return view('tb04.register_laboratorium',compact('permohonan_labs','data_user','count_notification','list_min_duas','list_min_nows','list_min_satus'));
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
                }else{
                    $start_date = '0000-00-00';
                }
                if (!empty($request->end_date)) {
                    $end_date = date('Y-m-d',strtotime($request->end_date));
                }else{
                    $end_date = '0000-00-00';
                }
                if (empty($data_user)) {
                    return redirect('/');
                }

                $detail_user = User::where('id',$data_user->id)->with('nama_faskes')->first();
                // print_r(json_decode(json_encode($detail_user)));exit;

                if ($request->action == 'Cetak') {
                    // $pasiens = DaftarTerduga::where('faskes_id',$data_user->faskes_id)->whereBetween('tanggal_didaftar',[$start_date, $end_date])->get();
                    // $pdf = PDF::loadView('tb06.daftar_terduga_tb_prints', compact('pasiens'))->setPaper('a4', 'landscape');
                    // return $pdf->stream('Daftar Terduga TB.pdf');
                    $datas = PermohonanLab::where('faskes_id',$data_user->faskes_id)->whereBetween('tanggal_pengiriman_sediaan',[$start_date, $end_date])->with('dokter','nama_faskes','daftar_terduga')->get();
                    // print_r($datas->toArray());exit;
                    $pdf = PDF::loadView('tb04.print_all', compact('datas','detail_user'))->setPaper('a4', 'landscape');
                    return $pdf->stream('Register Laboratorium.pdf');
                }else{

                    $permohonan_labs = PermohonanLab::where('faskes_id',$data_user->faskes_id)->whereBetween('tanggal_pengiriman_sediaan',[$start_date, $end_date])->with('dokter','nama_faskes','daftar_terduga')->get();
                    return view('tb04.register_laboratorium',compact('permohonan_labs','data_user','count_notification','list_min_duas','list_min_nows','list_min_satus'));
                }
            }
        }else{
            return redirect('/');
        }
        
        
    }
}

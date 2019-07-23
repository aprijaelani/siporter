<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ServicePoint;
use App\AdminService;
use App\NamaFaskes;
use App\JadwalPerjanjian;
use Carbon\Carbon;
use Alert;
use DB;

class UserController extends Controller
{
    public function index(NamaFaskes $namaFaskes)
    {
        if (Auth::check()) {
            $data_user = Auth::user();
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
        	$data_user = Auth::user();
        	$users = User::with('nama_faskes')->get();
            $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

            return view('data_master.user.list_user',compact('data_user','users','namaFaskes','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));        
        }else{
            return redirect('/');
        }
    }

    public function edit(User $user)
    {
        if (Auth::check()) {
            $data_user = Auth::user();
            $now = Carbon::now()->toDateString();
            $twoDays = Carbon::now()->addDays(2)->toDateString();
            $oneDays = Carbon::now()->addDays(1)->toDateString();
            $sekarang = Carbon::now()->toDateString();

            $list_min_duas = JadwalPerjanjian::where('tanggal_harus_kembali',$twoDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_satus = JadwalPerjanjian::where('tanggal_harus_kembali',$oneDays)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();
            $list_min_nows = JadwalPerjanjian::where('tanggal_harus_kembali',$sekarang)->with('kartu_pengobatan.daftar_terduga.nama_faskes')->get();

            $count_notification = DB::table('jadwal_perjanjians')
                                    ->join('kartu_pengobatans', 'kartu_pengobatans.id', '=', 'jadwal_perjanjians.kartu_pengobatan_id')
                                    ->join('daftar_terdugas', 'daftar_terdugas.id', '=', 'kartu_pengobatans.pasien_id')
                                    ->select('jadwal_perjanjians.*')
                                    ->whereBetween('jadwal_perjanjians.tanggal_harus_kembali', [$now,$twoDays])
                                    ->where('daftar_terdugas.faskes_id', $data_user->faskes_id)
                                    ->where('jadwal_perjanjians.deleted_at', null)
                                    ->count();  

        	$nama_faskes = NamaFaskes::all();
        	$data_user = Auth::user();
        	return view('data_master.user.edit_user',compact('user','list_min_nows','data_user','nama_faskes','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
        }else{
            return redirect('/');
        }
        
    }

    public function update ($id)
    {
    	User::where('id',$id)->update([
    		'name'				=>request('name'),
    		'email'				=>request('email'),
    		'telepon'			=>request('telepon'),
            'password' => bcrypt(request('password')),
    		'faskes_id'	=>request('faskes_id'),
    		'level'				=>request('level')
    		]);
        Alert::success('Success', 'Data User Berhasil Diperbaharui');
        return redirect("/user");	
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect("/user");
    }
}

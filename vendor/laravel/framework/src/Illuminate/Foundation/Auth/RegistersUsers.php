<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\ServicePoint;
use App\NamaFaskes;
use App\JadwalPerjanjian;
use Carbon\Carbon;
use DB;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
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
                                ->count();
        // print_r($twoDays);exit;

        $notification = JadwalPerjanjian::whereBetween('tanggal_harus_kembali', [$now,$twoDays])->with('daftar_terduga.permohonan_lab.nama_faskes')->first();
        $count_notification = JadwalPerjanjian::whereBetween('tanggal_harus_kembali', [$now,$twoDays])->count();
        $data_user = Auth::user();
        $nama_faskes = NamaFaskes::all();
        return view('auth.register', compact('nama_faskes','data_user','notification','count_notification','list_min_nows','list_min_satus','list_min_duas'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        return redirect('/user');

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}

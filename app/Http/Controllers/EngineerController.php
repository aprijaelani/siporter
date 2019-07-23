<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Merchant;
use App\ServicePoint;
use App\AdminService;
use App\WorkOrder;
use DB;
use Charts;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',2)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->orderBy('id')->with('merchant','service_point','user')->get();
        return view('spl.engineer.list_services_engineer',compact('data_user','engineer_services'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = Auth::user();
        $service_points = ServicePoint::where('id','=',$data_user['service_point_id'])->get();
        return view('edit_user',compact('data_user','service_points'));
    }

    public function updateUser(Request $request,$id)
    {
        User::where('id',$id)->update([
            'telepon'           =>request('telepon'),
            'password' => bcrypt(request('password')),
            ]);
        flash()->overlay("Data User Berhasil Dirubah", 'Greet');
        return redirect("engineer/services");
        // return redirect("/dashboard");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data_user = Auth::user();
        $data['tanggal'] = date('Y-m-d');
        $data['user_id'] = $data_user['id'];
        $data['admin_service_id'] = $id;
        $data['kelengkapan_edc'] = implode(",", request('kelengkapan_edc'));
        $data['kelengkapan_dongle'] = implode(",", request('kelengkapan_dongle'));
        $photo_struk = $request->file('photo_struk')->getClientOriginalName();
        $photo_toko = $request->file('photo_toko')->getClientOriginalName();
        $destination_struk = base_path() . '/public/uploads/photo_struk';
        $destination_toko = base_path() . '/public/uploads/photo_toko';
        $request->file('photo_struk')->move($destination_struk,$photo_struk);
        $request->file('photo_toko')->move($destination_toko,$photo_toko);
        $data['photo_struk'] = $photo_struk;
        $data['photo_toko'] = $photo_toko;
        // print_r($data);exit;

            $data_work_order = WorkOrder::create($data);


        AdminService::where('id',$id)->update([
            'status'                => 3,
            'work_order_id'         => $data_work_order['id'],
            ]);
        flash()->overlay("Pekerjaan Telah Selesai", 'Greet');
        return redirect("engineer/services-done");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function workorder ($id)
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',2)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->orderBy('id')->with('merchant','service_point','user')->find($id);
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('spl.create_work_order',compact('engineer_services','data_user'));
    }

    public function servicesDone ()
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',3)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->orderBy('id')->with('merchant','service_point','user','work_order')->get();
        // print_r(json_decode(json_encode($engineer_services)));exit;
        return view('spl.engineer.list_services_done_engineer',compact('data_user','engineer_services'));
    }

    public function detailServicesDone($id)
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',3)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->orderBy('id')->with('merchant','service_point','user','work_order')->find($id);
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('spl.engineer.detail_services_done_engineer',compact('data_user','engineer_services'));
    }

     public function detailServicesCompleted($id)
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->orderBy('id')->with('merchant','service_point','user','work_order')->find($id);
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('spl.engineer.detail_services_done_engineer',compact('data_user','engineer_services'));
    }

    public function completed ()
    {
        $data_user = Auth::user();
        $engineer_services_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point','user')->get();
        // print_r(json_decode(json_encode($engineer_services)));exit;
        return view('spl.engineer.list_completed_engineer',compact('data_user','engineer_services_completed'));
    }

    public function dashboard ()
    {
        $data_user = Auth::user();

        $total_service_completed = AdminService::where('user_id',$data_user['id'])->where('status',4)->where('service_point_id',$data_user['service_point_id'])->whereMonth('created_at',date('m'))->count();
        $total_service_new = AdminService::where('user_id',$data_user['id'])->where('service_point_id',$data_user['service_point_id'])->where('status','=',2)->whereMonth('created_at',date('m'))->count();
        $total_service_done = AdminService::where('user_id',$data_user['id'])->where('service_point_id',$data_user['service_point_id'])->where('status','=',3)->whereMonth('created_at',date('m'))->count();
        $engineer_services_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point','user')->get();
        $chart = Charts::database(AdminService::where('service_point_id',$data_user['service_point_id'])->where('user_id',$data_user['id'])->get(), 'bar', 'highcharts')
            ->elementLabel("Total Services")
            ->dimensions(500, 320)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        return view('spl.engineer.dashboard',compact('data_user','total_service_done','total_service_completed','total_service_new','engineer_services_completed','chart'));
    }
}

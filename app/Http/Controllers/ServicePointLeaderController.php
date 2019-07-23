<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Merchant;
use App\ServicePoint;
use App\AdminService;
use App\WorkOrder;
use Carbon;
use DB;
use Charts;

class ServicePointLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();
        $spl_services = AdminService::where('status',1)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point')->get();
        return view('spl.assign-services.list_assign_services',compact('data_user','spl_services'));
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
        $admin_services = AdminService::find($id);
        $data_user = Auth::user();
        $nama_merchant = Merchant::whereId($admin_services['merchant_id'])->get();
        $nama_service_point = ServicePoint::whereId($admin_services['service_point_id'])->get();
        $engineers = User::where('service_point_id',$data_user['service_point_id'])->where('level','=',3)->get();
        return view('spl.assign-services.edit_assign_service',compact('admin_services','data_user','nama_merchant','nama_service_point','engineers'));
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
        AdminService::where('id',$id)->update([
            'description'           => request('description'),
            'user_id'               => request('user_id'),
            'status'                => 2,
            ]);
        flash()->overlay("Service Point Leader is Updated", 'Greet');
        return redirect("/service-point-leader/schedule");
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

    public function schedule()
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',2)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point','user')->get();
        return view('spl.list_schedule_services',compact('data_user','engineer_services'));
    }

    public function updateSchedule(Request $request, $id)
    {
        AdminService::where('id',$id)->update([
            'description'           => request('description'),
            'user_id'               => request('user_id'),
            'status'                => 2,
            ]);
        flash()->overlay("engineer is Updated", 'Greet');
        return redirect("/service-point-leader/schedule");
    }

    public function done()
    {
        $data_user = Auth::user();
        $services_done = AdminService::where('status',3)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point','user')->get();
        return view('spl.list_done_services',compact('data_user','services_done'));
    }

    public function printWorkOrder($id)
    {
        $data_user = Auth::user();
        $spl_services = AdminService::where('status',2)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point','user','work_order')->find($id);
        return view('spl.print_work_order',compact('data_user','spl_services'));
    }

    public function check($id)
    {
        $data_user = Auth::user();
        $engineer_services = AdminService::where('status',3)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point','user','work_order')->find($id);
        // print_r(json_decode(json_encode($engineer_services)));exit;
        return view('spl.check_work_order',compact('engineer_services','data_user'));
    }

    public function updateWorkOrder(Request $request, $id)
    {
        AdminService::where('id',$id)->update([
            'status'                => request('status'),
            ]);
        if (request('status') == 4) {
         flash()->overlay("Work Order is Completed", 'Greet');
         return redirect("/service-point-leader/completed");
        }else{
         flash()->overlay("Work Order is Re-Assign", 'Greet');
                return redirect("/service-point-leader/schedule");
        }
    }

    public function detailServicesCompleted($id)
    {
        $data_user = Auth::user();
        $detail_services = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->orderBy('id')->with('merchant','service_point','user','work_order')->find($id);
        // print_r(json_decode(json_encode($detail_services)));exit;
        return view('spl.detail_services_completed',compact('detail_services','data_user'));
    }

    public function completed()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        // print_r(json_decode(json_encode($data_user)));exit;
        return view('spl.list_completed_services',compact('data_user','services_completed'));
    }

    public function dashboard ()
    {
        $data_user = Auth::user();

        $total_service_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->whereMonth('created_at',date('m'))->count();
        $total_service_active = AdminService::where('service_point_id',$data_user['service_point_id'])->where('status','=',1)->whereMonth('created_at',date('m'))->count();
        $total_service_schedule = AdminService::where('service_point_id',$data_user['service_point_id'])->where('status','=',2)->whereMonth('created_at',date('m'))->count();
        $total_engineer = User::where('level',3)->where('service_point_id',$data_user['service_point_id'])->count();
        $total_case_engineer = DB::table('admin_services')
                        ->leftjoin('users','users.id','=','admin_services.user_id')
                        ->leftjoin('service_points','service_points.id','=','admin_services.service_point_id')
                ->select('service_points.nama','users.name', DB::raw('count(admin_services.user_id) as total_service'))
                ->where('admin_services.status',4)
                ->where('admin_services.service_point_id',$data_user['service_point_id'])
                ->groupBy('user_id')
                ->get();
        $chart = Charts::database(AdminService::where('service_point_id',$data_user['service_point_id'])->get(), 'bar', 'highcharts')
            ->elementLabel("Total Services")
            ->dimensions(500, 320)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        return view('spl.dashboard',compact('data_user','total_service_active','total_engineer','total_service_completed','total_case_engineer','total_service_schedule','chart'));
    }

    public function editUser($id)
    {
        $data_user = Auth::user();
        $service_points = ServicePoint::where('id','=',$data_user['service_point_id'])->get();
        return view('spl.edit_user',compact('data_user','service_points'));
    }

    public function updateUser(Request $request,$id)
    {
        User::where('id',$id)->update([
            'telepon'           =>request('telepon'),
            'password' => bcrypt(request('password')),
            ]);
        flash()->overlay("Data User Berhasil Dirubah", 'Greet');
        return redirect("service-point-leader/assign-services");
    }

    public function report()
    {
        $data_user = Auth::user();
        $services_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->whereMonth('created_at',date('m'))->orderBy('id')->with('merchant','service_point')->get();
        return view('spl.report',compact('data_user','services_completed')); 
    }

    public function postRepost(Request $request)
    {
        $data_user = Auth::user();
        $service_points = ServicePoint::where('id',$data_user['service_point_id'])->first();
        $date_from = $request['date_from'];
        $date_to =  $request['date_to'];
        $mulai = date('d F Y', strtotime($date_from));
        $selesai = date('d F Y', strtotime($date_to));
        $services_completed = AdminService::where('status',4)->where('service_point_id',$data_user['service_point_id'])->whereDate('created_at','>=',$date_from)->whereDate('created_at','<=',$date_to)->with('merchant','service_point','user','work_order')->get();
        return view('spl.print_report',compact('data_user','services_completed','mulai','selesai','service_points'));

    }
}

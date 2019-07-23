<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
use App\ServicePoint;
use App\Http\Requests;
use App\Http\Requests\servicePoint\ServicePointRequest;
use Illuminate\Support\Facades\Auth;
use App\AdminService;

class ServicePointController extends Controller
{
    public function index (AdminService $adminservice)
    {
        $data_user = Auth::user();
    	$servicePoint = ServicePoint::all();
    	return view('data_master.service_point.list_service_point', compact('servicePoint','data_user','adminservice'));
    }

    public function create ()
    {
        $data_user = Auth::user();
    	return view('data_master.service_point.create_service_points',compact('data_user'));
    }

    public function store ()
    {
        $this->validate(request(),[
            'nama' => 'required|min:3|max:191',
            'alamat'  => 'required',
            'telepon'  => 'required',
            'zipcode' => 'required'
            ]);
    	ServicePoint::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'telepon' => request('telepon'),
            'zipcode' => request('zipcode')
            ]);
        flash()->overlay("Service Point is Created", 'Greet');
        return redirect("/service-point");
    }

    public function edit (ServicePoint $servicePoint)
    {
        $data_user = Auth::user();
        return view('data_master.service_point.edit_service_points',compact('servicePoint','data_user'));
    }

    public function update ($id)
    {
        $this->validate(request(),[
            'nama' => 'required|min:3|max:191',
            'alamat'  => 'required',
            'telepon'  => 'required',
            'zipcode' => 'required'
            ]);
        servicePoint::where('id',$id)->update([
            'nama' => request('nama'),
            'alamat'  => request('alamat'),
            'telepon' => request('telepon'),
            'zipcode' => request('zipcode')
            ]);
        flash()->overlay('Service Point Berhasil Diperbarui');
        return redirect("/service-point");
    }

    public function delete(Request $request)
    {
        $service_point = ServicePoint::find($request->id);
        $service_point->delete();
        return redirect("/service-point");
    }
}

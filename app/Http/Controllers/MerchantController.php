<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
use App\Http\Requests;
use App\Http\Requests\Merchant\StoreRequest;
use App\Http\Requests\Merchant\UpdateRequest;
use Validator, Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function index ()
    {
        $data_user = Auth::user();
    	$merchants = Merchant::all();
    	return view('data_master.merchant.list_merchant', compact('merchants','data_user'));
    }

    public function store (StoreRequest $request)
    {
    	$merchants = new Merchant;
    	$merchants->tid = $request->tid;
    	$merchants->mid = $request->mid;
		$merchants->csi = $request->csi; 
		$merchants->type_edc = $request->type_edc;
		$merchants->serial_number = $request->serial_number;
		$merchants->nama_merchant = $request->nama_merchant;
		$merchants->alamat_merchant = $request->alamat_merchant;
		$merchants->pic_merchant = $request->pic_merchant;   
		$merchants->telepon = $request->telepon;
		$merchants->save();
		return response ()->json ($merchants);
    }

    public function update (Request $request)
    {
    	$merchants = Merchant::findOrFail($request->id);
    	$merchants->tid = $request->tid;
    	$merchants->mid = $request->mid;
		$merchants->csi = $request->csi; 
		$merchants->type_edc = $request->type_edc;
		$merchants->serial_number = $request->serial_number;
		$merchants->nama_merchant = $request->nama_merchant;
		$merchants->alamat_merchant = $request->alamat_merchant;
		$merchants->pic_merchant = $request->pic_merchant;   
		$merchants->telepon = $request->telepon;
		$merchants->save();
		return response()->json($merchants);
    }

    public function delete (Request $request)
    {
    	$merchants = Merchant::find($request->id);
    	$merchants->delete();
    	return response()->json($merchants);
    }
}

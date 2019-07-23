<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/dashboard','HomeController@dashboard')->middleware('auth');
Route::get('/admin-dashboard', 'AdminServiceController@dashboard')->middleware('auth');


Route::group(['prefix'=>'tb06', 'middleware' => 'auth'], function(){
	Route::get('','DaftarTerdugaTBController@index');
	Route::get('create', 'DaftarTerdugaTBController@create');
	Route::post('', 'DaftarTerdugaTBController@store');
	Route::get('{tb06}/edit', 'DaftarTerdugaTBController@edit');
	Route::get('{tb06}/detail', 'DaftarTerdugaTBController@show');
	Route::post('{tb06}/update', 'DaftarTerdugaTBController@update');
	Route::post('delete', 'DaftarTerdugaTBController@destroy');
	Route::get('prints', 'DaftarTerdugaTBController@prints');
	Route::get('search', 'DaftarTerdugaTBController@search');
});

Route::group(['prefix'=>'tb05', 'middleware' => 'auth'], function(){
	Route::get('','PermohonanLabController@index');
	Route::get('create', 'PermohonanLabController@create');
	Route::get('get-data-pasien', 'PermohonanLabController@getDataPasien');
	Route::get('get-data-pasien-tb', 'PermohonanLabController@getDataPasienTb');
	Route::post('create', 'PermohonanLabController@store');
	Route::get('{tb06}/edit', 'PermohonanLabController@edit');
	Route::post('{tb06}/update', 'PermohonanLabController@update');
	Route::post('delete', 'PermohonanLabController@destroy');
	Route::get('prints', 'PermohonanLabController@prints');
});

Route::group(['prefix'=>'tb04', 'middleware' => 'auth'], function(){
	Route::get('','RegisterLaboratoriumController@index');
	Route::get('create', 'RegisterLaboratoriumController@create');
	Route::get('get-data-pasien', 'RegisterLaboratoriumController@getDataPasien');
	Route::post('create', 'RegisterLaboratoriumController@store');
	Route::get('{tb06}/edit', 'RegisterLaboratoriumController@edit');
	Route::post('{tb06}/update', 'RegisterLaboratoriumController@update');
	Route::post('delete', 'RegisterLaboratoriumController@destroy');
	Route::get('prints/{tb04}', 'RegisterLaboratoriumController@prints');
	Route::get('print_all', 'RegisterLaboratoriumController@print_all');
	Route::get('search', 'RegisterLaboratoriumController@search');
});

Route::group(['prefix'=>'tb01', 'middleware' => 'auth'], function(){
	Route::get('','KartuPengobatanController@index');
	Route::get('create', 'KartuPengobatanController@create');
	Route::get('get-data-pasien', 'KartuPengobatanController@getDataPasien');
	Route::post('create', 'KartuPengobatanController@store');
	Route::post('daftar-terduga', 'KartuPengobatanController@daftarTerduga');
	Route::get('{tb01}/edit', 'KartuPengobatanController@edit');
	Route::post('{tb01}/update', 'KartuPengobatanController@update');
	Route::post('delete-kontak', 'KartuPengobatanController@delete_kontak');
	Route::post('delete-tahap-awal', 'KartuPengobatanController@delete_tahap_awal');
	Route::post('delete-tahap-lanjutan', 'KartuPengobatanController@delete_tahap_lanjutan');
	Route::post('delete', 'KartuPengobatanController@destroy');
	Route::get('prints/{tb01}', 'KartuPengobatanController@prints');
	Route::get('print_all', 'KartuPengobatanController@print_all');
	Route::get('search', 'KartuPengobatanController@search');
});

Route::group(['prefix'=>'tb02', 'middleware' => 'auth'], function(){
	Route::get('','JadwalObatDanPeriksaController@index');
	Route::get('create', 'JadwalObatDanPeriksaController@create');
	Route::get('get-data-jadwal', 'JadwalObatDanPeriksaController@getDataJadwal');
	Route::get('get-data-periksa', 'JadwalObatDanPeriksaController@getDataPeriksa');
	Route::post('', 'JadwalObatDanPeriksaController@store');
	Route::post('periksa', 'JadwalObatDanPeriksaController@periksa');
	Route::post('update-periksa', 'JadwalObatDanPeriksaController@updatePeriksa');
	Route::get('{tb06}/edit', 'JadwalObatDanPeriksaController@edit');
	Route::post('update', 'JadwalObatDanPeriksaController@update');
	Route::post('delete', 'JadwalObatDanPeriksaController@destroy');
	Route::post('delete-periksa', 'JadwalObatDanPeriksaController@delete_periksa');
	Route::get('print/{tb01}', 'JadwalObatDanPeriksaController@prints');
	Route::get('calendar/{tb01}', 'JadwalObatDanPeriksaController@calendar');
	Route::get('detail/{tb01}', 'JadwalObatDanPeriksaController@detail');
	Route::get('detail_periksa_ulang/{tb01}', 'JadwalObatDanPeriksaController@detail_periksa_ulang');
	Route::get('print_all', 'JadwalObatDanPeriksaController@print_all');
});

Route::group(['prefix'=>'tb03', 'middleware' => 'auth'], function(){
	Route::get('','RegisterTBCUPKController@index');
	Route::get('create', 'RegisterTBCUPKController@create');
	Route::get('search', 'RegisterTBCUPKController@search');
	Route::get('prints', 'RegisterTBCUPKController@prints');
	Route::get('get-data-jadwal', 'RegisterTBCUPKController@getDataJadwal');
	Route::get('get-data-periksa', 'RegisterTBCUPKController@getDataPeriksa');
	Route::post('', 'RegisterTBCUPKController@store');
	Route::post('periksa', 'RegisterTBCUPKController@periksa');
	Route::post('update-periksa', 'RegisterTBCUPKController@updatePeriksa');
	Route::get('{tb06}/edit', 'RegisterTBCUPKController@edit');
	Route::post('update', 'RegisterTBCUPKController@update');
	Route::post('delete', 'RegisterTBCUPKController@destroy');
	Route::get('print/{tb01}', 'RegisterTBCUPKController@prints');
	Route::get('print_all', 'RegisterTBCUPKController@print_all');
});

// Route::resource('tb03', 'RegisterTBCUPKController');
// Route::resource('tb02', 'JadwalObatDanPeriksaController');
// Route::resource('tb05', 'PermohonanLabController');
// Route::resource('tb01', 'KartuPengobatanController');
Route::resource('pasien', 'PasienController');
// Route::resource('tb04', 'RegisterLaboratoriumController');


















Route::get('/merchant', 'MerchantController@index')->middleware('monitoring');
Route::post('/merchant/store', 'MerchantController@store')->middleware('monitoring');
Route::post('/merchant/update', 'MerchantController@update')->middleware('monitoring');
Route::post('/merchant/delete', 'MerchantController@delete')->middleware('monitoring');
Route::post('/service-point/delete', 'ServicePointController@delete');
Route::post('/user/delete', 'UserController@delete');
Route::post('/admin-services/delete', 'AdminServiceController@delete');

Route::group(['prefix'=>'merchant'], function(){
	Route::get('','MerchantController@index');
	Route::get('create', 'MerchantController@index')->middleware('monitoring');
	Route::post('store', 'MerchantController@store')->middleware('monitoring');
});

Route::group(['prefix'=>'service-point'], function(){
	Route::get('','ServicePointController@index')->middleware('monitoring');
	Route::get('create', 'ServicePointController@create')->middleware('monitoring');
	Route::post('create', 'ServicePointController@store')->middleware('monitoring');
	Route::get('{servicePoint}/edit', 'ServicePointController@edit')->name('service-point.edit')->middleware('monitoring');
	Route::post('{servicePoint}/update', 'ServicePointController@update')->middleware('monitoring');
});

Route::group(['prefix'=>'user'], function(){
	Route::get('','UserController@index')->middleware('monitoring');
	Route::get('create','Auth\RegisterController@showRegistrationForm')->middleware('monitoring');
	Route::get('{user}/edit','UserController@edit');
	Route::post('{user}/update','UserController@update')->middleware('monitoring');
});



Route::group(['prefix'=>'admin-services'], function(){
	Route::get('','AdminServiceController@index')->middleware('monitoring');
	Route::get('create','AdminServiceController@create')->middleware('monitoring');
	Route::post('create', 'AdminServiceController@store')->middleware('monitoring');
	Route::get('{adminService}/edit','AdminServiceController@edit')->middleware('monitoring');
	Route::post('{adminService}/update','AdminServiceController@update')->middleware('monitoring');
	Route::post('report','AdminServiceController@postRepost')->middleware('monitoring');
	Route::get('report','ServicePointLeaderController@report')->middleware('monitoring');
	Route::get('/schedule','AdminServiceController@schedule')->middleware('monitoring');
	Route::get('/completed','AdminServiceController@completed')->middleware('monitoring');
	Route::get('{adminService}/detail-completed','AdminServiceController@detailServicesCompleted')->middleware('monitoring');
});

Route::group(['prefix'=>'service-point-leader'], function(){
	Route::get('/assign-services','ServicePointLeaderController@index')->middleware('spl');
	Route::get('{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('{adminService}/update','ServicePointLeaderController@update')->middleware('spl');
	Route::get('schedule','ServicePointLeaderController@schedule')->middleware('spl');
	Route::get('done','ServicePointLeaderController@done')->middleware('spl');
	Route::get('schedule/{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('schedule/{servicepointleader}/update','ServicePointLeaderController@updateSchedule')->middleware('spl');
	Route::get('{servicepointleader}/check','ServicePointLeaderController@check')->middleware('spl');
	Route::post('{servicepointleader}/test','ServicePointLeaderController@updateWorkOrder')->middleware('spl');
	Route::get('{servicepointleader}/print-work-order','ServicePointLeaderController@printWorkOrder')->middleware('spl');
	Route::get('/completed','ServicePointLeaderController@completed')->middleware('spl');
	Route::get('{ServicePointLeader}/detail-completed','ServicePointLeaderController@detailServicesCompleted')->middleware('spl');
	Route::get('/dashboard','ServicePointLeaderController@dashboard')->middleware('spl');
	Route::get('/{servicepointleader}/edit-user','ServicePointLeaderController@editUser')->middleware('spl');
	Route::post('/{servicepointleader}/update-user','ServicePointLeaderController@updateUser')->middleware('spl');
	Route::get('report','ServicePointLeaderController@report')->middleware('spl');
	Route::post('report','ServicePointLeaderController@postRepost')->middleware('spl');
});

Route::group(['prefix'=>'engineer'], function(){
	Route::get('/services','EngineerController@index')->middleware('engineer');
	Route::get('/dashboard','EngineerController@dashboard')->middleware('engineer');
	Route::get('/detail','EngineerController@detail')->middleware('engineer');
	Route::get('{adminService}/work-order','EngineerController@workorder')->middleware('engineer');
	Route::post('{adminService}/work-orders','EngineerController@update')->middleware('engineer');
	Route::get('/services-done','EngineerController@servicesDone')->middleware('engineer');
	Route::get('{adminService}/done','EngineerController@detailServicesDone')->middleware('engineer');
	Route::get('{adminService}/completed','EngineerController@detailServicesCompleted')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/{user}/edit','EngineerController@edit')->middleware('engineer');
	Route::post('/{user}/update','EngineerController@updateUser')->middleware('engineer');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'AdminServiceController@test');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
|--------------------------------------------------------------------------
| RSRTC Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'rsrtc', 'as'=>'.rsrtc', 'namespace'=>'API'], function(){
	Route::get('getallfunctions', 'RSRTCController@getAllFunctions');
	Route::get('getallbustypes', 'RSRTCController@GetAllBusTypes');
	Route::get('getavailableservices', 'RSRTCController@getAvailableServices');
	Route::get('showavailableservices', 'RSRTCController@showAvailableServices');
	Route::get('getstopnamecodeservices', 'RSRTCController@getStopNameCodeServices');
	Route::get('getseatavailability', 'RSRTCController@getSeatAvailability');
	Route::get('dotemporarybooking', 'RSRTCController@doTemporaryBooking');
	Route::get('doconfirmbooking', 'RSRTCController@doConfirmBooking');
	Route::get('getbalance', 'RSRTCController@getBalance');
	Route::get('isticketcancelable', 'RSRTCController@isTicketCancelable');
	Route::get('cancelticket', 'RSRTCController@cancelTicket');
	Route::get('getserviceversion', 'RSRTCController@getServiceVersion');
	Route::get('getbusservicestops', 'RSRTCController@getBusServiceStops');
	Route::get('getallbusformats', 'RSRTCController@getAllBusFormats');
	Route::get('getboardingstops', 'RSRTCController@getBoardingStops');
	Route::get('saveauditdata', 'RSRTCController@saveAuditData');
	Route::get('getalltransactions', 'RSRTCController@getAllTransactions');
	Route::get('getrefunddetailfordate', 'RSRTCController@GetRefundDetailForDate');
	Route::get('getdsa', 'RSRTCController@getDsa');
});

/*
|--------------------------------------------------------------------------
| OSRTC Routes
|---------------	-----------------------------------------------------------
*/

Route::group(['prefix'=>'osrtc', 'as'=>'.osrtc', 'namespace'=>'API'], function(){	
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getplacelist', 'OSRTCController@getPlaceList');
	Route::post('getavailableservices', 'OSRTCController@getAvailableServices');
	Route::get('getseatlayout', 'OSRTCController@getSeatlayout');
	Route::get('getboardingpoints', 'OSRTCController@getBoardingPoints');
	Route::get('getidproofs', 'OSRTCController@getIDProofs');
	Route::get('tentativebookings', 'OSRTCController@tentativeBookings');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
	Route::get('getallfunctions', 'OSRTCController@getAllFunctions');
});

/**
|-----------------------------------------------------------------------------
|Common APIs
|-----------------------------------------------------------------------------
*/
Route::group(['namespace'=>'API'], function(){	
	Route::get('available-services', 'APIController@availableServices');
});



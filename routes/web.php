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

Route::get('/', function () { return view('welcome'); })->name('/');

        Route::get('create/password/{token}', 'UsersController@createPassword')->name('create.password');
        Route::post('set/password', 'UsersController@setPassword')->name('set.password');
        Route::resource('quotations', 'VendorSaveQuotationController');
        Auth::routes();

        Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');

	/*
	|--------------------------------------------------------------------
	|Roles Routes
	|--------------------------------------------------------------------
	*/
	Route::resource('roles', 'RolesController');

	/*
	|--------------------------------------------------------------------
	|Permissions Routes
	|--------------------------------------------------------------------
	*/
	Route::resource('permissions', 'PermissionsController');

	/*
	|--------------------------------------------------------------------
	|Users Routes
	|--------------------------------------------------------------------
	*/
        Route::get('users/statusupdate/{id}', 'UsersController@statusUpdate');
	Route::resource('users', 'UsersController');
        /*
	|--------------------------------------------------------------------
	|Requests Routes
	|--------------------------------------------------------------------
	*/
        Route::resource('requests', 'RequestsController');
        Route::get('verifiers/requests', 'RequestsController@requestsToVerify')->name('verifiers.requests');
	Route::get('approvers/requests', 'RequestsController@requestsToApprove')->name('approvers.requests');
	Route::get('finance_approval/requests', 'RequestsController@financeApproval')->name('finance_approval.requests');
	Route::get('mainadmin_approval/requests', 'RequestsController@mainadminApproval')->name('mainadmin_approval.requests');
	Route::get('coordinator/requests', 'RequestsController@coordinatorSubmission')->name('coordinator.requests');
        Route::get('/requests/{id}/save_voucher', 'RequestsController@saveVoucher');
       
        //requests.test
        Route::resource('requests', 'RequestsController');
        /************************************************************************/
        
        Route::resource('service', 'ServiceController');
        /************************************************************************/
        
        Route::resource('teams', 'TeamController');
        /************************************************************************/
        Route::resource('purchase_committees', 'PurchaseCommitteeController');
        /************************************************************************/
        Route::get('vendors/statusupdate/{id}', 'VendorController@statusUpdate');
        Route::resource('vendors', 'VendorController');
        /************************************************************************/
        /************************************************************************/
        //Route::get('vendor_quotation_lists/statusupdate/{id}', 'VendorController@statusUpdate');
        Route::resource('vendor_quotation_lists', 'VendorQuotationCompareListsController');
        Route::get('pending_quotations/comments/{id}', 'PendingQuotationController@Comment');
        Route::resource('pending_quotations', 'PendingQuotationController');
        /************************************************************************/
        Route::get('single_vendor_approval/mainadmin_likes_approval', 'MainAdminLikesApprovalController@SingleVendor')->name('single_vendor_approval.mainadmin_likes_approval');;
        Route::resource('mainadmin_likes_approval', 'MainAdminLikesApprovalController');
        /*************************Create by satya date 15-05-2018*******************************************************/
         Route::get('receipt_of_quotation/call_for_tender', 'CallForTenderController@receiptOfQuotation')->name('receipt_of_quotation.call_for_tender');
      
        Route::resource('call_for_tender', 'CallForTenderController');
        
        /************************Date 13-06-2018************************************************/
        /************************@author satya************************************************/
        /************************Report************************************************/
        Route::get('reports/purchaser_reports', 'ReportsController@purchaserReports')->name('reports.purchaser_reports');
        Route::resource('reports', 'ReportsController');
        
        /************************************************************************/
        Route::get('purchases/single_vendor_purchase_order', 'PurchasesController@singleVendorOrder')->name('purchases.single_vendor_purchase_order');
        Route::resource('purchases', 'PurchasesController');
        
        Route::resource('goods_receiv_notes', 'GoodsReceivNotesController');
        /*
	|--------------------------------------------------------------------
	|Requests Verifier
	|--------------------------------------------------------------------
	*/
        
        Route::resource('verifiers', 'VerifierController');
        
  });


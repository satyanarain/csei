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
    return view('welcome');
})->name('/');

Route::get('create/password/{token}', 'UsersController@createPassword')->name('create.password');
Route::post('set/password', 'UsersController@setPassword')->name('set.password');
 Route::resource('quotations', 'QuotationController');
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
        Route::post('verifiers/requests/{id}/reject', 'RequestsController@rejectRequest')->name('verifiers.requests.reject');
	Route::post('verifiers/requests/{id}/verify', 'RequestsController@verifyRequest')->name('verifiers.requests.verify');
        Route::get('verifiers/requests', 'RequestsController@requestsToVerify')->name('verifiers.requests');
	Route::get('approvers/requests', 'RequestsController@requestsToApprove')->name('approvers.requests');
	Route::get('accountants/requests', 'RequestsController@requestsApproved')->name('accountants.requests');
	Route::post('requests/verify_request', 'RequestsController@verifyRequestUpdateStatus');
	Route::post('requests/verify_request', 'RequestsController@verifyRequestUpdateStatus');
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
        
        /*************************Create by satya date 15-05-2018*******************************************************/
        Route::resource('quotation_reviews', 'QuotationReviewsController');
        /************************************************************************/
       
         /************************************************************************/
        Route::resource('purchases', 'PurchasesController');
        
         /*
	|--------------------------------------------------------------------
	|Requests Verifier
	|--------------------------------------------------------------------
	*/
        
        Route::resource('verifiers', 'VerifierController');
        
        
        
        

});


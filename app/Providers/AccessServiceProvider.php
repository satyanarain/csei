<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Role\RoleRepositoryContract',
			'App\Repositories\Role\RoleRepository'
		);

		$this->app->bind(
			'App\Repositories\User\UserRepositoryContract',
			'App\Repositories\User\UserRepository'
		);
		$this->app->bind(
			'App\Repositories\Vendor\VendorRepositoryContract',
			'App\Repositories\Vendor\VendorRepository'
		);
		$this->app->bind(
			'App\Repositories\Team\TeamRepositoryContract',
			'App\Repositories\Team\TeamRepository'
		);
		$this->app->bind(
			'App\Repositories\Team\TeamRepositoryContract',
			'App\Repositories\Team\TeamRepository'
		);
		$this->app->bind(
			'App\Repositories\PurchaseCommittee\PurchaseCommitteeRepositoryContract',
			'App\Repositories\PurchaseCommittee\PurchaseCommitteeRepository'
		);

		$this->app->bind(
			'App\Repositories\Request\RequestRepositoryContract',
			'App\Repositories\Request\RequestRepository'
		);

		$this->app->bind(
			'App\Repositories\Permission\PermissionRepositoryContract',
			'App\Repositories\Permission\PermissionRepository'
		);

		$this->app->bind(
			'App\Repositories\Purchase\PurchaseRepositoryContract',
			'App\Repositories\Purchase\PurchaseRepository'
		);
		$this->app->bind(
			'App\Repositories\RSRTC\RSRTCRepositoryContract',
			'App\Repositories\RSRTC\RSRTCRepository'
		);

		$this->app->bind(
			'App\Repositories\OSRTC\OSRTCRepositoryContract',
			'App\Repositories\OSRTC\OSRTCRepository'
		);
	}
} 
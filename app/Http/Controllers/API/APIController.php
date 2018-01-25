<?php 
namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OSRTC\OSRTCRepositoryContract;
use App\Repositories\RSRTC\RSRTCRepositoryContract;
ini_set('default_socket_timeout', 600);

class APIController extends Controller 
{
	protected $osrtc;
	protected $rsrtc;

	public function __construct(RSRTCRepositoryContract $rsrtc, OSRTCRepositoryContract $osrtc)
	{
		$this->osrtc = $osrtc;
		$this->rsrtc = $rsrtc;
	}

	public function availableServices(Request $request)
	{
		$data = array();
		$errors = array();
		$services = array();
		$journeyDate = date('d/m/Y', strtotime(Carbon::now()->addDays(22)));//$request->journeyDate;

		//rsrtc api call
		$fromPlaceCode = 'HRD';
		$toPlaceCode = 'RRK';

		$rsrtcAvailableServices = $this->rsrtc->showAvailableServices($journeyDate, $fromPlaceCode, $toPlaceCode);

		if(isset($rsrtcAvailableServices->serviceError))
		{
			$errors['rsrtc']['message'] = $rsrtcAvailableServices->serviceError->errorReason;
			$services['rsrtc'] = '';
		}else {
			$services['rsrtc'] = $rsrtcAvailableServices->availableServices->service;
			$errors['rsrtc']['message'] = '';
		}

		//osrtc api call
		$journeyDate = date('d/m/Y', strtotime(Carbon::now()->addDays(0)));//$request->journeyDate;
		$biFromPlace['placeId'] = '208';
		$biFromPlace['placeCode'] = 'AMD';
		$biFromPlace['placeName'] = 'AHMEDABAD';

		$biToPlace['placeId'] = '317';
		$biToPlace['placeCode'] = 'SRT';
		$biToPlace['placeName'] = 'SURAT';

		$osrtcAvailableServices = $this->osrtc->getAvailableServices($journeyDate, $biFromPlace, $biToPlace);
		/*echo "<pre>";
		print_r($osrtcAvailableServices);exit();*/

		if(isset($osrtcAvailableServices->wsResponse->statusCode) && $osrtcAvailableServices->wsResponse->statusCode == 0)
		{
			$services['osrtc'] = $osrtcAvailableServices->services->service;
			$errors['osrtc']['message'] = $osrtcAvailableServices->wsResponse->message;
			$errors['osrtc']['statusCode'] = $osrtcAvailableServices->wsResponse->statusCode;
		}else {
			$services['osrtc'] = '';
			$errors['osrtc']['message'] = $osrtcAvailableServices->wsResponse->message;
			$errors['osrtc']['statusCode'] = $osrtcAvailableServices->wsResponse->statusCode;
		}

		$data['services'] = $services;
		$data['errors'] = $errors;

		return response()->json($data);
	}
}
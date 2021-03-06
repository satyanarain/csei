<?php

namespace App\Http\Controllers\API;

use SoapClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RSRTC\RSRTCRepositoryContract;
ini_set('default_socket_timeout', 600);
libxml_disable_entity_loader(false);
class RSRTCController extends Controller
{
	private $wsdlPath = "http://180.92.170.94:8081/RSRTCServices/RSRTCService?wsdl";
	private $userName = "TESTAPI";
	private $password = "trimax";
	private $userType = 1;

    protected $rsrtc;

    public function __construct(RSRTCRepositoryContract $rsrtc)
    {
        $this->rsrtc = $rsrtc;
    }

	public function getAllFunctions()
	{
    	$response = $this->rsrtc->getAllFunctions();

        echo "<pre>";
        print_r($response->__getTypes());
        print_r($response->__getFunctions());
	}

    public function GetAllBusTypes()
    {
    	$allBusType = $this->GetAllBusTypes();
		$allBusType = $GetAllBusTypes->return->allBusType;
		
		return response()->json($allBusType);
    }

    public function getAvailableServices()
    {
        $data = array();
        $dateOfJourney = date('d/m/Y', strtotime(Carbon::now()->addDays(19)));
    	$allAvailableServices = $this->rsrtc->getAvailableServices($dateOfJourney);

        echo "<pre>";
        print_r($allAvailableServices);exit();

        if(isset($rsrtcAvailableServices->serviceError))
        {
            $errors['rsrtc']['message'] = $allAvailableServices->serviceError->errorReason;
            $services['rsrtc'] = '';
        }else {
            $services['rsrtc'] = $allAvailableServices->availableServices->service;
            $errors['rsrtc']['message'] = '';
        }
		
        $data['services'] = $services;
        $data['errors'] = $errors;
		
		return response()->json($data);
    }

    public function showAvailableServices()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        
        $dateOfJourney = date('d/m/Y', strtotime(Carbon::now()->addDays(22)));
        $boardingStop = 'HRD';
        $alightingStop = 'RRK';
        $request['ShowAvailableServiceRequest'] = array(
        	'authentication' => array(
	        						'userName' => 'TESTAPI',
	        						'password' => 'trimax',
	        						'userType' => 1
        						),
        	'boardingStop' => $boardingStop,
        	'alightingStop' => $alightingStop,
        	'dateOfJourney' => $dateOfJourney
        );

		$showAvailableServices = $client->showAvailableServices($request);
		echo "<pre>";
		print_r($showAvailableServices);
        exit();
		
        $showAvailableServices = $showAvailableServices->ShowAvailableServiceResponse->availableServices->service;

        return response()->json($showAvailableServices);
    }

    public function getAllBusFormats()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $dateOfJourney = date('d/m/Y');
        $busFormatType = 'VOL45';
        $request['AllBusFormatRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'busFormatType' => $busFormatType
        );

		$getAllBusFormats = $client->getAllBusFormats($request);
        $getAllBusFormats = $getAllBusFormats->AllBusFormatResponse->busDetail;
		/*echo "<pre>";
		print_r($getAllBusFormats);*/

        return response()->json($getAllBusFormats);
    }

    public function getStopNameCodeServices()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $dateOfJourney = date('d/m/Y');
        $stopName = 'jai';
        $request['StopNameRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'stopName' => $stopName
        );

		$getStopNameCodeServices = $client->getStopNameCodeServices($request);
        $getStopNameCodeServices = $getStopNameCodeServices->StopNameResponse->stopCodeNames->stopCodeNames;
		/*echo "<pre>";
		print_r($getStopNameCodeServices);*/

        return response()->json($getStopNameCodeServices);
    }

    public function getSeatAvailability()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $dateOfJourney = date('d/m/Y');
        $serviceId = 167;
        $fromStopId = 'MTR';
        $toStopId = 'BPR';
        $request['SeatAvailabilityRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'serviceId' => $serviceId,
        	'fromStopId' => $fromStopId,
        	'toStopId' => $toStopId,
        	'dateOfJourney' => $dateOfJourney
        );

		$getSeatAvailability = $client->getSeatAvailability($request);
		/*echo "<pre>";
		print_r($getSeatAvailability);*/

        $getSeatAvailability = $getSeatAvailability->SeatAvailabilityResponse;

        return response()->json($getSeatAvailability);
    }

    public function doTemporaryBooking()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $dateOfJourney = date('d/m/Y');
        $serviceId = '80517';
        $fromStopId = 'jpr';
        $toStopId = 'dsa';
        $passengerName = 'Red bus';
        $age = 34;
        $sex = 'M';
        $contactNumber = '9971361243';
        $email = 's.chandra106@gmail.com';
        $seatNo = 23;
        $totalFare = 688;
        $roundedAmt = 0;
        $serviceChrg = 0;
        $concession = 0;


        $request['TentativeBookingRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'serviceId' => $serviceId,
        	'fromStopId' => $fromStopId,
        	'toStopId' => $toStopId,
        	'dateOfJourney' => $dateOfJourney,
        	'passengerDetails' => array(
        		'passenger' => array(
        			'passengerName' => $passengerName,
        			'age' => $age,
        			'sex' => $sex,
        			'contactNumber' => $contactNumber,
        			'email' => $email,
        			'seatNo' => $seatNo,
        			'totalFare' => $totalFare,
        			'roundedAmt' => $roundedAmt,
        			'serviceChrg' => $serviceChrg,
        			'concession' => $concession
        		)
        	)
        );

		$doTemporaryBooking = $client->doTemporaryBooking($request);
		echo "<pre>";
		print_r($doTemporaryBooking);
    }

    public function doConfirmBooking()
    {
    	
    }

    public function getBalance()
    {
    	
    }

    public function isTicketCancelable()
    {
    	
    }

    public function cancelTicket()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $pnr = 'XdsaR1808101600001';
        $seatNumbers = '25, 34';

        $request['CancelRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'pnr' => $pnr,
        	'seatNumbers' => $seatNumbers
        );

		$cancelTicket = $client->cancelTicket($request);
		echo "<pre>";
		print_r($cancelTicket);
    }

    public function getServiceVersion()
    {
    	
    }

    public function getBusServiceStops()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $serviceId = 46;
        $dateOfJourney = date('d/m/Y', strtotime(Carbon::now()->addDays(19)));
        $request['BusServiceStopsRequest'] = array(
            'authentication' => array(
                                    'userName' => $this->userName,
                                    'password' => $this->password,
                                    'userType' => $this->userType
                                ),
            'serviceId' => $serviceId,
            'dateOfJourney' => $dateOfJourney
        );

        $getBusServiceStops = $client->getBusServiceStops($request);

        echo "<pre>";
        print_r($getBusServiceStops);
        exit();
        $getBusServiceStops = $getBusServiceStops->BusServiceStopsResponse->busServiceStops->busServiceStop;
        
        return response()->json($getBusServiceStops);
    }

    public function getBoardingStops()
    {
    	
    }

    public function saveAuditData()
    {
    	
    }

    public function getAllTransactions()
    {
    	
    }

    public function GetRefundDetailForDate()
    {
    	
    }

    public function getDsa()
    {
    	
    }
}

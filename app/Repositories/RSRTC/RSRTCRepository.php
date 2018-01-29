<?php 
namespace App\Repositories\RSRTC;

use SoapClient;
use Illuminate\Http\Request;
use App\Repositories\RSRTC\RSRTCRepositoryContract;
ini_set('default_socket_timeout', 600);
class RSRTCRepository implements RSRTCRepositoryContract
{
	private $wsdlPath = "http://180.92.170.94:8081/RSRTCServices/RSRTCService?wsdl";
	private $userName = "TESTAPI";
	private $password = "trimax";
	private $userType = 1;

	public function getAllFunctions()
	{
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));

    	return $client;
	}

    public function GetAllBusTypes()
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));

        $request['AllBusTypeRequest'] = array(
        	'authentication' => array(
	        			'userName' => $this->userName,
	        			'password' => $this->password,
	        			'userType' => $this->userType
    		) 
        );

		$GetAllBusTypes = $client->GetAllBusTypes($request);
		$allBusType = $GetAllBusTypes->return->allBusType;
		
		return response()->json($allBusType);
    }

    public function getAvailableServices($dateOfJourney)
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
   
        $request['AvailableServiceRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'dateOfJourney' => $dateOfJourney
        );

		$getAvailableServices = $client->getAvailableServices($request);
		/*echo "<pre>";
		print_r($getAvailableServices);
		exit();*/
		$allAvailableServices = $getAvailableServices->AvailableServiceResponse;
		
		return $allAvailableServices;
    }

    public function showAvailableServices($dateOfJourney, $boardingStop, $alightingStop)
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        
        $request['ShowAvailableServiceRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'boardingStop' => $boardingStop,
        	'alightingStop' => $alightingStop,
        	'dateOfJourney' => $dateOfJourney
        );

		$showAvailableServices = $client->showAvailableServices($request);
		/*echo "<pre>";
		print_r($showAvailableServices);*/
		
        $showAvailableServices = $showAvailableServices->ShowAvailableServiceResponse;

        return $showAvailableServices;
    }

    public function getAllBusFormats($busFormatType)
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        /*$dateOfJourney = date('d/m/Y');
        $busFormatType = 'VOL45';*/
        $request['AllBusFormatRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'busFormatType' => $busFormatType
        );

		$getAllBusFormats = $client->getAllBusFormats($request);
        $getAllBusFormats = $getAllBusFormats->AllBusFormatResponse;
		/*echo "<pre>";
		print_r($getAllBusFormats);*/

        return $getAllBusFormats;
    }

    public function getStopNameCodeServices($stopName)
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        /*$dateOfJourney = date('d/m/Y');
        $stopName = 'jai';*/
        $request['StopNameRequest'] = array(
        	'authentication' => array(
	        						'userName' => $this->userName,
	        						'password' => $this->password,
	        						'userType' => $this->userType
        						),
        	'stopName' => $stopName
        );

		$getStopNameCodeServices = $client->getStopNameCodeServices($request);
        $getStopNameCodeServices = $getStopNameCodeServices->StopNameResponse;
		/*echo "<pre>";
		print_r($getStopNameCodeServices);*/

        return $getStopNameCodeServices;
    }

    public function getSeatAvailability($request)
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

    public function doTemporaryBooking($request)
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

    public function doConfirmBooking($request)
    {
    	
    }

    public function getBalance($request)
    {
    	
    }

    public function isTicketCancelable($request)
    {
    	
    }

    public function cancelTicket($request)
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

    public function getServiceVersion($request)
    {
    	
    }

    public function getBusServiceStops($request)
    {
    	$client = new SoapClient($this->wsdlPath, array(  
            //'soap_version' => SOAP_1_1,
            'trace' => true, //to debug 
        ));
        $serviceId = 167;
        $dateOfJourney = date('d/m/Y');
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

    public function getBoardingStops($request)
    {
    	
    }

    public function saveAuditData($request)
    {
    	
    }

    public function getAllTransactions($request)
    {
    	
    }

    public function GetRefundDetailForDate($request)
    {
    	
    }

    public function getDsa($request)
    {
    	
    }
}
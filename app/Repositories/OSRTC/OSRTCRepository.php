<?php 
namespace App\Repositories\OSRTC;

use SoapClient;
use App\Repositories\OSRTC\OSRTCRepositoryContract;
ini_set('default_socket_timeout', 600);

class OSRTCRepository implements OSRTCRepositoryContract
{
	private $wsdlPath = "http://111.93.131.112/biws/buswebservice?wsdl";
    private $authUserName = "biwsTest";
    private $authPassword = "biwsTest";
    private $userID = 440;
    private $userUserName = "APICLIENT@BUSINDIA.COM";
    private $userPassword = "busindiaapi";
    private $userUserType = 101;

	public function getAllFunctions()
    {
    	$client = new SoapClient($this->wsdlPath, array(
    			'trace' => true
    	));

    	return $client;
    }

    public function getPlaceList($request)
    {
    	try
    	{
    		$client = new SoapClient($this->wsdlPath, array(
    			'trace' => true,
    			'login' => 'biwsTest',
    			'password' => 'biwsTest'
    		));
    	}catch (Exception $e) {
	        echo "<h2>Exception Error!</h2>";
	        echo $e->getMessage();
	    }
    	
    	$request['arg0'] = array(
    		//'wsUser' => array(
    			//'franchUserID' => '',
    			'password' => $this->userPassword,
    			'userID' => $this->userID,
    			//'userKey' => '',
    			'userName' => $this->userUserName,
    			//'userRole' => '',
    			//'userStatus' => '',
    			'userType' => $this->userUserType
    		//)
    	);

    	$getPlaceList = $client->getPlaceList($request);
        
        return $getPlaceList;
    }

    public function getAvailableServices($journeyDate, $biFromPlace, $biToPlace)
    {
    	$client = new SoapClient($this->wsdlPath, array(
    			'trace' => true,
    			'login' => 'biwsTest',
    			'password' => 'biwsTest'
    	));

    	$request['arg0'] = array(
            'wsUser' => array(
                //'franchUserID' => '',
                'password' => $this->userPassword,
                'userID' => $this->userID,
                //'userKey' => '',
                'userName' => $this->userUserName,
                //'userRole' => '',
                //'userStatus' => '',
                'userType' => $this->userUserType
            ),
    		'biFromPlace' => array(
    			"placeCode" => "AMD",
                "placeID" => "208",
                "placeName" => "AHMEDABAD"
    		),
    		'biToPlace' => array(
    			"placeCode" => "SRT",
                "placeID" => "317",
                "placeName" => "SURAT"  
    		),
    		'journeyDate' => $journeyDate
    	);

    	$getAvailableServices = $client->getAvailableServices($request);

        $getAvailableServices = $getAvailableServices->AvailableServiceResponse;

        return $getAvailableServices;
    }


    public function getSeatlayout($request)
    {
        $client = new SoapClient($this->wsdlPath, array(
                'trace' => true,
                'login' => 'biwsTest',
                'password' => 'biwsTest'
        ));

        $classID = '1';
        $classLayoutID = '1';
        $journeyDate = date('d/m/Y');
        $serviceID = '9105';
        $stuFromPlace = '';
        $stuToPlace = '';
        $stuID = '2';
        $totalPassengers = '1';

        $request['arg0'] = array(
            'wsUser' => array(
                //'franchUserID' => '',
                'password' => $this->userPassword,
                'userID' => $this->userID,
                //'userKey' => '',
                'userName' => $this->userUserName,
                //'userRole' => '',
                //'userStatus' => '',
                'userType' => $this->userUserType
            ),
            'biFromPlace' => array(
                "placeCode" => "AMD",
                "placeID" => "208",
                "placeName" => "AHMEDABAD"
            ),
            'biToPlace' => array(
                "placeCode" => "SRT",
                "placeID" => "317",
                "placeName" => "SURAT"  
            ),
            'classID' => $classID,
            'classLayoutID' => $classLayoutID,
            'journeyDate' => $journeyDate,
            'serviceID' => $serviceID,
            'stuFromPlace' => $stuFromPlace,
            'stuID' => $stuID,
            'stuToPlace' => $stuToPlace,
            'totalPassengers' => $totalPassengers
        );

        $getSeatlayout = $client->getSeatlayout($request);
        /*echo "<pre>";
        print_r($getSeatlayout);
        return;*/

        $getSeatlayout = $getSeatlayout->Seatlayout;

        return response()->json($getSeatlayout);
    }

    public function getBoardingPoints($request)
    {
        $client = new SoapClient($this->wsdlPath, array(
                'trace' => true,
                'login' => 'biwsTest',
                'password' => 'biwsTest'
        ));

        $arrivalTime = '';
        $departureTime = '';
        $journeyDate = date('d/m/Y');
        $serviceID = '9105';
        $stuFromPlace = '';
        $stuToPlace = '';
        $stuID = '2';

        $request['arg0'] = array(
            'wsUser' => array(
                //'franchUserID' => '',
                'password' => $this->userPassword,
                'userID' => $this->userID,
                //'userKey' => '',
                'userName' => $this->userUserName,
                //'userRole' => '',
                //'userStatus' => '',
                'userType' => $this->userUserType
            ),
            'biFromPlace' => array(
                "placeCode" => "AMD",
                "placeID" => "208",
                "placeName" => "AHMEDABAD"
            ),
            'biToPlace' => array(
                "placeCode" => "SRT",
                "placeID" => "317",
                "placeName" => "SURAT"  
            ),
            'journeyDate' => $journeyDate,
            'serviceID' => $serviceID,
            'stuFromPlace' => $stuFromPlace,
            'stuID' => $stuID,
            'stuToPlace' => $stuToPlace
        );

        $getBoardingPoints = $client->getBoardingPoints($request);
        /*echo "<pre>";
        print_r($getBoardingPoints);
        return;*/

        $getBoardingPoints = $getBoardingPoints->BoardingPointsResponse;

        return response()->json($getBoardingPoints);
    }


    public function getIDProofs($request)
    {
        $client = new SoapClient($this->wsdlPath, array(
                'trace' => true,
                'login' => 'biwsTest',
                'password' => 'biwsTest'
        ));

        $stuID = '2';

        $request['arg0'] = array(
            'wsUser' => array(
                //'franchUserID' => '',
                'password' => $this->userPassword,
                'userID' => $this->userID,
                //'userKey' => '',
                'userName' => $this->userUserName,
                //'userRole' => '',
                //'userStatus' => '',
                'userType' => $this->userUserType
            ),
            'stuID' => $stuID
        );

        $getIDProofs = $client->getIDProofs($request);
        /*echo "<pre>";
        print_r($getIDProofs);
        return;*/

        $getIDProofs = $getIDProofs->IDProofResponse;

        return response()->json($getIDProofs);
    }

    public function tentativeBookings($request)
    {
        $client = new SoapClient($this->wsdlPath, array(
                'trace' => true,
                'login' => $this->authUserName,
                'password' => $this->authPassword
        ));

        $journeyDate = date('d/m/Y');
        $arrivalDate = date('d/m/Y');
        $arrivalTime = "06:35";
        $biFromPlace = array(            
            'biFromPlaceCode' => "AMD",
            'biFromPlaceID' => "208",
            'biFromPlaceName' => "AHMEDABAD"
        );

        $biToPlace = array(
            'biToPlaceCode' => "SRT",
            'biToPlaceID' => "317",
            'biToPlaceName' => "SURAT"
        );

        $stuToPlace = array(            
            'biFromPlaceCode' => "AMD",
            'biFromPlaceID' => "208",
            'biFromPlaceName' => "AHMEDABAD"
        );

        $stuFromPlace = array(
            'biToPlaceCode' => "SRT",
            'biToPlaceID' => "317",
            'biToPlaceName' => "SURAT"
        );

        $boardingPoint = array(
            'address' => 'AAAAAAAAAAA',
            'contactName' => 'BBBBBBBBB',
            'contactNumbers' => '9999999999',
            'landmark' => '',
            'platformNo' => '0',
            'pointID' => '301',
            'pointName' => 'AHMEDABAD CBS 5',
            'time' => '12:30 AM',
            'type' => 'BOARDING POINT'
        );

        $dropOffPoint = array(
            'address' => 'BBBBBBB',
            'contactName' => 'CCCCCCCCC',
            'contactNumbers' => '9999999999',
            'landmark' => '',
            'platformNo' => '0',
            'pointID' => '1145',
            'pointName' => 'SURAT CENTRAL',
            'time' => '06:30 AM',
            'type' => 'DROPOFF POINT'
        );

        $passengerAddress = array(
            'address' => 'Vill-Dofda, PO-Kanaila, Distt-Basti',
            'city' => 'Basti',
            'email' => 's.chandra106@gmail.com',
            'mobileNo' => '9971361243',
            'phoneNo' => '9971361243',
            'pincode' => '272301',
        );

        $seatBlockIDs = array(
            'seatBlockID' => '52'
        );

        $selectedSeats = array(
            'selectedSeat' => array(
                'mainPassenger' => 'Y',
                'passngerAge' => '25',
                'passngerGender' => 'M',
                'passngerName' => 'Subhash Chandra',
                'passngerType' => 'A',
                'seatNo' => '52'
            )
        );

        $request['arg0'] = array(
            'wsUser' => array(
                //'franchUserID' => '',
                'password' => $this->userPassword,
                'userID' => $this->userID,
                //'userKey' => '',
                'userName' => $this->userUserName,
                //'userRole' => '',
                //'userStatus' => '',
                'userType' => $this->userUserType
            ),
            'seatBlock' => array(
                'arrivalDate' => $arrivalDate,
                'arrivalTime' => $arrivalTime,
                'biFromPlace' => $biFromPlace,
                'biToPlace' => $biToPlace,
                'biWSClientRefNo' => '1066',
                'boardingPoint' =>  $boardingPoint,
                //'busID' => '',
                'classID' => '1',
                'classLayoutID' => '1',
                'className' => 'EXPRESS',
                'corpCode' => 'GSRTC',
                'departureTime' => '00:30',
                'distance' => '',
                'dropOffPoint' => $dropOffPoint, 
                'idProofLookupID' => '81',
                'idProofName' => 'AADHAR CARD',
                'idProofReference' => '',
                'journeyDate' => $journeyDate,
                'passengerAddress' =>  $passengerAddress,
                'returnServiceID' => '0',
                'returnStuID' => '0',
                'routeNo' => 'RADHANPURSRT',
                'seatBlockIDs' =>  $seatBlockIDs,
                'seatBlockMessage' => 'MMMMMMMMMMM',
                'seatBlockStatus' => '0',
                'selectedSeats' => $selectedSeats,
                'serviceID' => '9105',
                'stuFromPlace' => $stuFromPlace,
                'stuID' => '2',
                'stuToPlace' => $stuToPlace,
                'stuWSRefNo' => '',
                'totalPassengers' => '1',
                'tripCode' => '2000BHBSRTEXP51',
                'tripNo' => '1',
                'tripType' => 'O',
            )
        );

        $tentativeBookings = $client->tentativeBookings($request);
        echo "<pre>";
        print_r($tentativeBookings);
        return;

        $tentativeBookings = $tentativeBookings->IDProofResponse;

        return response()->json($tentativeBookings);
    }
}
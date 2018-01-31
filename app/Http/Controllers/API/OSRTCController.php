<?php

namespace App\Http\Controllers\API;

error_reporting(0);
use SoapClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OSRTC\OSRTCRepositoryContract;
ini_set('default_socket_timeout', 600);
libxml_disable_entity_loader(false);
class OSRTCController extends Controller
{
    protected $osrtc;
    
    public function __construct(OSRTCRepositoryContract $osrtc)
    {
        $this->osrtc = $osrtc;
    }

    public function getAllFunctions()
    {
    	$response = $this->osrtc->getAllFunctions();

    	echo "<pre>";
    	print_r($response->__getFunctions());
        print_r($response->__getTypes());
    }

    public function getPlaceList(Request $request)
    {

    	$getPlaceList = $this->osrtc->getPlaceList($request);

        $getPlaceList = $getPlaceList->PlaceList;

        return response()->json($getPlaceList);
    }

    public function getAvailableServices(Request $request)
    {
        /*$this->validate($request, [
            'journeyDate' => 'required|date',
            'biFromPlace' => 'required|array',
            'biToPlace' => 'required|date'
        ]);*/
        

        $data = array();
    	/*$journeyDate = date('d/m/Y', strtotime(Carbon::now()->addDays(46)));

        $biFromPlace = array(
            "placeCode" => "AMD",
            "placeID" => "208",
            "placeName" => "AHMEDABAD"
        );

        $biToPlace = array(
            "placeCode" => "SRT",
            "placeID" => "317",
            "placeName" => "SURAT"
        );*/
        //echo $request['journeyDate'];exit();
        $journeyDate = $request->journeyDate;
        $biFPlace = $request->biFromPlace;
        $biTPlace = $request->biToPlace;

        return response()->json(array('place' => $biFPlace['placeCode']));
        
        //echo $biFPlace['placeCode'];exit();
        /*$biFromPlace = array(
            "placeCode" => $biFPlace['placeCode'],
            "placeID" => $biFPlace['placeID'],
            "placeName" => $biFPlace['placeName']
        );

        $biToPlace = array(
            "placeCode" => $biTPlace['placeCode'],
            "placeID" => $biTPlace['placeID'],
            "placeName" => $biTPlace['placeName']
        );*/
    

        $getAvailableServices = $this->osrtc->getAvailableServices($journeyDate, $biFPlace, $biTPlace);
    	
        /*echo "<pre>";
        print_r($getAvailableServices);
        exit();*/

        if(isset($getAvailableServices->wsResponse->statusCode) && $getAvailableServices->wsResponse->statusCode == 0)
        {
            $services = $getAvailableServices->services->service;
            $errors['message'] = $getAvailableServices->wsResponse->message;
            $errors['statusCode'] = $getAvailableServices->wsResponse->statusCode;
        }else {
            $services = array();
            $errors['message'] = $getAvailableServices->wsResponse->message;
            $errors['statusCode'] = $getAvailableServices->wsResponse->statusCode;
        }

        $data['service'] = $services;
        $data['wsResponse'] = $errors;

        return response()->json($data);
    }


    public function getSeatlayout(Request $request)
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

    public function getBoardingPoints(Request $request)
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


    public function getIDProofs(Request $request)
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

    public function tentativeBookings(Request $request)
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

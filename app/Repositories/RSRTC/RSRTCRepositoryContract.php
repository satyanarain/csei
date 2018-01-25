<?php 
namespace App\Repositories\RSRTC;

interface RSRTCRepositoryContract
{
	public function getAllFunctions();

    public function GetAllBusTypes();

    public function getAvailableServices($dateOfJourney);

    public function showAvailableServices($dateOfJourney, $boardingStop, $alightingStop);

    public function getAllBusFormats($busFormatType);

    public function getStopNameCodeServices($stopName);

    public function getSeatAvailability($request);

    public function doTemporaryBooking($request);

    public function doConfirmBooking($request);

    public function getBalance($request);

    public function isTicketCancelable($request);

    public function cancelTicket($request);

    public function getServiceVersion($request);

    public function getBusServiceStops($request);

    public function getBoardingStops($request);

    public function saveAuditData($request);

    public function getAllTransactions($request);

    public function GetRefundDetailForDate($request);

    public function getDsa($request);
}
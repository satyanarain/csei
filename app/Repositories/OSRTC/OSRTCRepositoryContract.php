<?php 
namespace App\Repositories\OSRTC;

interface OSRTCRepositoryContract
{
	public function getAllFunctions();

    public function getPlaceList($request);

    public function getAvailableServices($journeyDate, $biFromPlace, $biToPlace);

    public function getSeatlayout($request);

    public function getBoardingPoints($request);

    public function getIDProofs($request);

    public function tentativeBookings($request);
}

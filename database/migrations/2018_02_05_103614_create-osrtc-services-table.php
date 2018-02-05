<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsrtcServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osrtc_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arrivalDate');
            $table->string('arrivalTime');
            $table->string('biFromPlace');
            $table->string('biToPlace');
            $table->string('classId');
            $table->string('classLayoutId');
            $table->string('className');
            $table->string('cropName');
            $table->string('departureTime');
            $table->string('destination');
            $table->string('fare');
            $table->string('journeyDate');
            $table->string('journeyHours');
            $table->string('maxSeatsAllowed');
            $table->string('origin');
            $table->string('refundStatus');
            $table->string('routeNo');
            $table->string('seatStatus');
            $table->string('seatsAvailable');
            $table->string('serviceId');
            $table->string('startPoint');
            $table->string('stuId');
            $table->string('tripCode');
            $table->string('viaPlaces'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('osrtc_services');
    }
}

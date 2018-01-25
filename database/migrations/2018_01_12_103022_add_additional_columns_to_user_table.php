<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('contact')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('manual_reset_password_token')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('contact');
            $table->dropColumn('profile_picture');
            $table->dropColumn('manual_reset_password_token');
            $table->dropColumn('description');
        });
    }
}

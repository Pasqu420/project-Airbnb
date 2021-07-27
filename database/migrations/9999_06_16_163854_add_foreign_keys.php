<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('apartment_sponsor', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentSponsor')
                ->references('id')
                ->on('apartments');

            $table->foreign('sponsor_id','sponsorApartment')
                ->references('id')
                ->on('sponsors');

        });

        Schema::table('statistics', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentStatistic')
                ->references('id')
                ->on('apartments');
        });

        Schema::table('apartment_service', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentService')
                ->references('id')
                ->on('apartments');

            $table->foreign('service_id','ServiceApartment')
                ->references('id')
                ->on('services');

        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->foreign('user_id','apartmentUsers')
                ->references('id')
                ->on('users');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentMessage')
                ->references('id')
                ->on('apartments');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentImage')
                ->references('id')
                ->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartment_sponsor', function (Blueprint $table) {
            $table->dropForeign('apartmentSponsor');
            $table->dropForeign('sponsorApartment');
        });

        Schema::table('statistics', function (Blueprint $table) {
            $table->dropForeign('apartmentStatistic');
        });

        Schema::table('apartment_service', function (Blueprint $table) {
            $table->dropForeign('apartmentService');
            $table->dropForeign('ServiceApartment');
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign('apartmentUsers');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('apartmentMessage');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('apartmentImage');
        });
    }
}

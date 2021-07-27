<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->string('title',128);
            $table->mediumText('description')->nullable();
            $table->smallInteger('number_rooms');
            $table->smallInteger('number_toiletes');
            $table->smallInteger('number_beds');
            $table->smallInteger('area');
            $table->string('address',128);
            // $table->string('cover_image',128)->nullable();
            $table->BigInteger('user_id')->unsigned()->index();

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
        Schema::dropIfExists('apartments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_info', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('gender')->nullable();
            $table->string('placeOfBirth')->nullable();
            $table->string('countryOfResidency')->nullable();
            $table->string('passportNo')->nullable();
            $table->string('issueDate')->nullable();
            $table->string('expiryDate')->nullable();
            $table->string('placeOfIssue')->nullable();
            $table->string('arrivalDate')->nullable();
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->string('visaDuration')->nullable();
            $table->string('VisaStatus')->nullable();
            $table->string('passportPicture')->nullable();
            $table->string('personalPicture')->nullable();
            $table->string('withCompanion')->nullable();
            $table->string('CheckInDate5Nigh')->nullable();
            $table->string('CheckOutDate5Nigh')->nullable();
            $table->string('romType')->nullable();
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
        Schema::dropIfExists('guest_info');
    }
};

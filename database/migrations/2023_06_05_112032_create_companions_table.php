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
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id');
            $table->foreign('guest_id')->references('id')->on('guest_info');
            $table->string("firstName")->nullable();
            $table->string("lastName")->nullable();
            $table->string("birthDate")->nullable();
            $table->string("gender")->nullable();
            $table->string("placeOfBirth")->nullable();
            $table->string("countryOfResidency")->nullable();
            $table->string("passportNo")->nullable();
            $table->string("issueDate")->nullable();
            $table->string("expiryDate")->nullable();
            $table->string("placeOfIssue")->nullable();
            $table->string("arrivalDate")->nullable();
            $table->string("profession")->nullable();
            $table->string("organization")->nullable();
            $table->string("visaDuration")->nullable();
            $table->string("VisaStatus")->nullable();
            $table->string("passportPicture")->nullable();
            $table->string("personalPicture")->nullable();
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
        Schema::dropIfExists('companions');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guest_info';
    protected $fillable = [
        "email",
        "countryCode",
        "mobileNo",
        "firstName",
        "lastName",
        "birthDate",
        "gender",
        "placeOfBirth",
        "countryOfResidency",
        "passportNo",
        "issueDate",
        "expiryDate",
        "placeOfIssue",
        "arrivalDate",
        "profession",
        "organization",
        "visaDuration",
        "VisaStatus",
        "passportPicture",
        "personalPicture",
        "withCompanion",
        "CheckInDate5Nigh",
        "CheckOutDate5Nigh",
        "romType"

    ];
}

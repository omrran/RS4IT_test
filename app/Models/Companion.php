<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $table = 'companions';
    protected $fillable = [
        "guest_id",
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

    ];
}

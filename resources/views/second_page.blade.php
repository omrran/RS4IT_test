@extends('master_template')

@section('content')

<h4 class="mx-auto w-50 p-3 mt-5">Please fill below information per to passport :</h4>
<div class="mx-auto w-50 p-3 mt-3 bg-body rounded-3 shadow-lg ">

    <form method="POST" action="{{ url('/third-page') }}">
        @csrf
        {{-- firstName --}}
        <label class="pt-2">first name:</label>
        <span id="first_name_error_span" class="text-danger d-none">english only</span>
        <input type="text" class="form-control" name="firstName"
            onkeyup="checkOnlyEnglish(this,'first_name_error_span')" />

        {{-- lastName --}}
        <label class="pt-2">last name:</label>
        <span id="last_name_error_span" class="text-danger d-none">english only</span>
        <input type="text" class="form-control" name="lastName"
            onkeyup="checkOnlyEnglish(this,'last_name_error_span')" />

        {{-- birthDate --}}
        <div class="container">
            <label class="pt-2">Birth Date: </label><span id="date_error_span" class="text-danger d-none">selected date must be less
                than current data</span>
            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" name="birthDate" type="text" readonly
                    onchange="checkDateIfLessThanCurrentDate(this,'date_error_span')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- gender --}}
        <label class="pt-2">gender :</label>
        <select class="form-select" name="gender" aria-label="Default select example">
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select>

        {{-- placeOfBirth --}}
        <label class="pt-2">place Of Birth :</label>
        <select class="form-select" name="placeOfBirth" aria-label="Default select example">
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>

        {{-- countryOfResidency --}}
        <label class="pt-2">country Of Residency :</label>
        <select class="form-select" name="countryOfResidency" aria-label="Default select example">
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>

        {{-- passportNo --}}
        <label class="pt-2">passport No :</label>
        <span id="passport_no_error_span" class="text-danger d-none">must be 6 digits or more in english</span>
        <input type="text" class="form-control" name="passportNo"
            onchange="mustSixDigitOrMoreEnglishOrNumber(this,'passport_no_error_span')" />

        {{-- issueDate --}}
        <div class="container">
            <label class="pt-2">issue Date: </label>
            <span id="issue_date_error_span" class="text-danger d-none">selected date must be less than current
                data</span>
            <div id="issueDatePicker" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" name="issueDate" type="text" readonly
                    onchange="checkDateIfLessThanCurrentDate(this,'issue_date_error_span')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- expiryDate --}}
        <div class="container">
            <label class="pt-2">expiry Date: </label>
            <span id="expiry_date_error_span" class="text-danger d-none">selected date must be greater than current
                data</span>
            <div id="expiryDatePicker" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" name="expiryDate" type="text" readonly
                    onchange="checkDateIfmoreThanCurrentDate(this,'expiry_date_error_span')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- placeOfIssue --}}
        <label class="pt-2">place Of Issue :</label>
        <select class="form-select" name="placeOfIssue" aria-label="Default select example">
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>

        {{-- arrivalDate --}}
        <div class="container">
            <label class="pt-2">arrival Date: </label>
            <span id="arrival_date_error_span" class="text-danger d-none">selected date must be more than current
                data</span>
            <div id="arrivalDatePicker" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" name="arrivalDate" type="text" readonly
                    onchange="checkDateIfmoreThanCurrentDate(this,'arrival_date_error_span')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- profession --}}
        <label class="pt-2">profession  :</label>
        <input type="text" class="form-control" name="profession" />

        {{-- organization --}}
        <label class="pt-2">organization  :</label>
        <input type="text" class="form-control" name="organization" />

        {{-- visaDuration  --}}
        <label class="pt-2">visa Duration  :</label>
        <select class="form-select" aria-label="Default select example" name="visaDuration">
            @for ($i = 1; $i < 91; $i++) 
                <option value="{{ $i }}">{{ $i }} Day</option>
            @endfor
        </select>

        {{-- VisaStatus --}}
        <label class="pt-2">visa status  :</label>
        <select class="form-select" aria-label="Default select example" name="VisaStatus">
            <option value="multiple">multiple</option>
            <option value="single">single</option>
        </select>
        
        <h5 class="pt-3"> upload require documents for VISA requirement :</h5>
        {{-- passportPicture  --}}
        <label for="passportPicture" class="form-label">passport Picture :</label>
        <input class="form-control form-control-sm" name="passportPicture" id="passportPicture" type="file">
        
        {{-- personalPicture  --}}
        <label for="personalPicture" class="form-label">personal Picture :</label>
        <input class="form-control form-control-sm" name="personalPicture" id="personalPicture" type="file">
        
        {{-- with companion ? --}}
        <label for="withCompanion" class="form-label">Are you Traveling with companion ?</label>
        <select id="withCompanion" class="form-select" onchange="showCompanionInfo(this)" aria-label="Default select example" name="withCompanion">
            <option value="yes">yes</option>
            <option value="no" selected>No</option>
        </select>

        {{------------- companion info -----------------------------------------------------}}
        <div id="companionInfo" class="d-none bg-secondary p-3 mt-4 rounded-2">
            <h5>please enter your companion info :</h5>
            {{-- firstNameCompanion --}}
            <label class="pt-2">first name:</label>
            <span id="first_name_companion_error_span" class="text-danger d-none">english only</span>
            <input type="text" class="form-control" name="firstNameCompanion"
                onkeyup="checkOnlyEnglish(this,'first_name_companion_error_span')" />

            {{-- lastNameCompanion --}}
            <label class="pt-2">last name:</label>
            <span id="last_name_companion_error_span" class="text-danger d-none">english only</span>
            <input type="text" class="form-control" name="lastNameCompanion"
                onkeyup="checkOnlyEnglish(this,'last_name_companion_error_span')" />

            {{-- birthDateCompanion --}}
            <div class="container">
                <label class="pt-2">Birth Date: </label><span id="birth_date_companion" class="text-danger d-none">selected date must be less
                    than current data</span>
                <div id="birthDateCompanion" class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control" name="birthDateCompanion" type="text" readonly
                        onchange="checkDateIfLessThanCurrentDate(this,'birth_date_companion')" />
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>

            {{-- genderCompanion --}}
            <label class="pt-2">gender :</label>
            <select class="form-select" name="genderCompanion" aria-label="Default select example">
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>

            {{-- placeOfBirthCompanion --}}
            <label class="pt-2">place Of Birth :</label>
            <select class="form-select" name="placeOfBirthCompanion" aria-label="Default select example">
                <option value="Syria">Syria</option>
                <option value="Iraq">Iraq</option>
                <option value="Jordan">Jordan</option>
            </select>

            {{-- countryOfResidencyCompanion --}}
            <label class="pt-2">country Of Residency :</label>
            <select class="form-select" name="countryOfResidencyCompanion" aria-label="Default select example">
                <option value="Syria">Syria</option>
                <option value="Iraq">Iraq</option>
                <option value="Jordan">Jordan</option>
            </select>

            {{-- passportNoCompanion --}}
            <label class="pt-2">passport No :</label>
            <span id="passport_no_companion_error_span" class="text-danger d-none">must be 6 digits or more in english</span>
            <input type="text" class="form-control" name="passportNoCompanion"
                onchange="mustSixDigitOrMoreEnglishOrNumber(this,'passport_no_companion_error_span')" />

            {{-- issueDateCompanion --}}
            <div class="container">
                <label class="pt-2">issue Date: </label>
                <span id="issue_date_companion_error_span" class="text-danger d-none">selected date must be less than current
                    data</span>
                <div id="issueDatePickerCompanion" class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control" name="issueDateCompanion" type="text" readonly
                        onchange="checkDateIfLessThanCurrentDate(this,'issue_date_companion_error_span')" />
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>

            {{-- expiryDateCompanion --}}
            <div class="container">
                <label class="pt-2">expiry Date: </label>
                <span id="expiry_companion_date_error_span" class="text-danger d-none">selected date must be greater than current
                    data</span>
                <div id="expiryDatePickerCompanion" class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control" name="expiryDateCompanion" type="text" readonly
                        onchange="checkDateIfmoreThanCurrentDate(this,'expiry_companion_date_error_span')" />
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>

            {{-- placeOfIssueCompanion --}}
            <label class="pt-2">place Of Issue :</label>
            <select class="form-select" name="placeOfIssueCompanion" aria-label="Default select example">
                <option value="Syria">Syria</option>
                <option value="Iraq">Iraq</option>
                <option value="Jordan">Jordan</option>
            </select>

            {{-- arrivalDateCompanion --}}
            <div class="container">
                <label class="pt-2">arrival Date: </label>
                <span id="arrival_companion_date_error_span" class="text-danger d-none">selected date must be more than current
                    data</span>
                <div id="arrivalDatePickerCompanion" class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control" name="arrivalDateCompanion" type="text" readonly
                        onchange="checkDateIfmoreThanCurrentDate(this,'arrival_companion_date_error_span')" />
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                </div>
            </div>

            {{-- professionCompanion --}}
            <label class="pt-2">profession  :</label>
            <input type="text" class="form-control" name="professionCompanion" />

            {{-- organizationCompanion --}}
            <label class="pt-2">organization  :</label>
            <input type="text" class="form-control" name="organizationCompanion" />

            {{-- visaDurationCompanion  --}}
            <label class="pt-2">visa Duration  :</label>
            <input type="text" class="form-control" name="visaDurationCompanion" />

            {{-- VisaStatusCompanion --}}
            <label class="pt-2">visa status  :</label>
            <select class="form-select" aria-label="Default select example" name="VisaStatusCompanion">
                <option value="multiple">multiple</option>
                <option value="single">single</option>
            </select>
            
            <h5 class="pt-3"> upload require documents for VISA requirement :</h5>
            {{-- passportPictureCompanion  --}}
            <label for="passportPictureCompanion" class="form-label">passport Picture :</label>
            <input class="form-control form-control-sm" name="passportPictureCompanion" id="passportPictureCompanion" type="file">
            
            {{-- personalPictureCompanion  --}}
            <label for="personalPictureCompanion" class="form-label">personal Picture :</label>
            <input class="form-control form-control-sm" name="personalPictureCompanion" id="personalPictureCompanion" type="file">
        
        </div>

        <button type="submit" class="btn btn-primary mb-3">Next</button>
        
    </form>

</div>



@endsection
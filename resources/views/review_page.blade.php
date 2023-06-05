@extends('master_template')

@section('content')

<h4 class="mx-auto w-50 p-3 mt-5">Review Page</h4>
<div class="mx-auto w-50 p-3 mt-3 bg-body rounded-3 shadow-lg ">
    {{Session::get('firstName')}}
     <form method="POST" action="{{ url('/review-data') }}">
        @csrf
        {{-- countryCode and mobileNo --}}
        <div class="d-flex">
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="inputGroup-sizing-default">Country code </span>
                <select class="form-select" aria-label="Default select example" name="countryCode">
                    <option value="{{Session::get('countryCode')}}" selected>{{Session::get('countryCode')}}</option>
                    @for ($i = 1; $i < 30; $i++) <option value="+{{ $i }}">+{{ $i }}</option>
                        @endfor

                        <option value="+12">+12</option>
                </select>
            </div>

            <div class="input-group mb-3 ">
                <span class="input-group-text" id="inputGroup-sizing-default">mobile no </span>
                <input type="text" name="mobileNo" class="form-control" value="{{Session::get('mobileNo')}}">

            </div>
        </div>

        {{-- firstName --}}
        <label class="pt-2">first name:</label>
        <span id="first_name_error_span" class="text-danger d-none">english only</span>
        <input type="text" class="form-control" name="firstName"
            onkeyup="checkOnlyEnglish(this,'first_name_error_span')" value="{{Session::get('firstName')}}"/>


        {{-- lastName --}}
        <label class="pt-2">last name:</label>
        <span id="last_name_error_span" class="text-danger d-none">english only</span>
        <input type="text" class="form-control" name="lastName"
            onkeyup="checkOnlyEnglish(this,'last_name_error_span')" value="{{Session::get('lastName')}}" />
       
         {{-- birthDate --}}
        <label class="pt-2">birth Date:</label>
        <input type="text" class="form-control" name="birthDate"
             value="{{Session::get('birthDate')}}" />


        {{-- gender --}}
        <label class="pt-2">gender :</label>
        <select class="form-select" name="gender" aria-label="Default select example">
            <option value="{{Session::get('gender')}}">{{Session::get('gender')}}</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select>

        {{-- placeOfBirth --}}
        <label class="pt-2">place Of Birth :</label>
        <select class="form-select" name="placeOfBirth" aria-label="Default select example">
            <option selected value="{{Session::get('placeOfBirth')}}">{{Session::get('placeOfBirth')}}</option>
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>
        
        {{-- countryOfResidency --}}
        <label class="pt-2">country Of Residency :</label>
        <select class="form-select" name="countryOfResidency" aria-label="Default select example">
            <option selected value="{{Session::get('countryOfResidency')}}">{{Session::get('countryOfResidency')}}</option>
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>

        {{-- passportNo --}}
        <label class="pt-2">passport No :</label>
        <span id="passport_no_error_span" class="text-danger d-none">must be 6 digits or more in english</span>
        <input type="text" class="form-control" name="passportNo" value="{{Session::get('passportNo')}}"
             />

        {{-- issueDate --}}
        <label class="pt-2">issue Date:</label>
        <input type="text" class="form-control" name="issueDate"
             value="{{Session::get('issueDate')}}" />
             
        {{-- expiryDate --}}
        <label class="pt-2">expiry Date:</label>
        <input type="text" class="form-control" name="expiryDate"
                  value="{{Session::get('expiryDate')}}" />

        {{-- placeOfIssue --}}
        <label class="pt-2">place Of Issue :</label>
        <select class="form-select" name="placeOfIssue" aria-label="Default select example">
            <option selected value="{{Session::get('placeOfIssue')}}">{{Session::get('placeOfIssue')}}</option>
            <option value="Syria">Syria</option>
            <option value="Iraq">Iraq</option>
            <option value="Jordan">Jordan</option>
        </select>

        {{-- arrivalDate --}}
        <label class="pt-2">arrival Date:</label>
        <input type="text" class="form-control" name="arrivalDate"
                  value="{{Session::get('arrivalDate')}}" />

        {{-- profession --}}
        <label class="pt-2">profession  :</label>
        <input type="text" class="form-control" name="profession" value="{{Session::get('profession')}}" />

        {{-- organization --}}
        <label class="pt-2">organization  :</label>
        <input type="text" class="form-control" name="organization" value="{{Session::get('organization')}}"/>

        {{-- visaDuration  --}}
        <label class="pt-2">visa Duration  :</label>
        <select class="form-select" aria-label="Default select example" name="visaDuration">
            <option selected value="{{ Session::get('visaDuration') }}">{{ Session::get('visaDuration') }} Day</option>
            @for ($i = 1; $i < 91; $i++) 
                <option value="{{ $i }}">{{ $i }} Day</option>
            @endfor
        </select>

        {{-- VisaStatus --}}
        <label class="pt-2">visa status  :</label>
        <select class="form-select" aria-label="Default select example" name="VisaStatus">
            <option selected value="{{ Session::get('VisaStatus') }}">{{ Session::get('VisaStatus') }}</option>
            <option value="multiple">multiple</option>
            <option value="single">single</option>
        </select>
        
        <h5 class="pt-3"> upload require documents for VISA requirement :</h5>
        {{-- passportPicture  --}}
        <label for="passportPicture" class="form-label">passport Picture :</label>
        <input value="{{ Session::get('passportPicture') }}" class="form-control form-control-sm" name="passportPicture" id="passportPicture" type="file">
        
        {{-- personalPicture  --}}
        <label for="personalPicture" class="form-label">personal Picture :</label>
        <input value="{{ Session::get('personalPicture') }}" class="form-control form-control-sm" name="personalPicture" id="personalPicture" type="file">
        
        {{-- with companion ? --}}
        <label for="withCompanion" class="form-label">Are you Traveling with companion ?</label>
        <select id="withCompanion" class="form-select" onchange="showCompanionInfo(this)" aria-label="Default select example" name="withCompanion">
            <option selected value="{{ Session::get('withCompanion') }}">{{ Session::get('withCompanion') }}</option>
            <option value="yes">yes</option>
            <option value="no">No</option>
        </select>



        <input type="text" class="form-control" name="profession" value="{{Session::get('firstName')}}"/>
        {{-- CheckInDate5Nigh --}}
        <div class="container">
            <label class="pt-2">Check In Date: </label>
            <span id="CheckInDate5Nigh_error_span" class="text-danger d-none">selected date must be more
                than current data</span>
            <div id="CheckInDate5Nigh" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" id="CheckInDate5NighInput" name="CheckInDate5Nigh" type="text" readonly
                    onchange="checkDateIfmoreThanCurrentDate(this,'CheckInDate5Nigh_error_span')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- CheckOutDate5Nigh --}}
        <div class="container">
            <label class="pt-2">Check Out Date: </label>
            <span id="CheckOutDate5Nigh_error_span" class="text-danger d-none">selected date must be more
                than current data</span>
            <div id="CheckOutDate5Nigh" class="input-group date" data-date-format="yyyy-mm-dd">
                <input class="form-control" name="CheckOutDate5Nigh" type="text" readonly
                    onchange="checkDateIfmoreThanCurrentDateAndequalOrless5Night(this,'CheckOutDate5Nigh_error_span','CheckInDate5NighInput')" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>

        {{-- romType  --}}
        <label class="pt-2">Rom Type :</label>
        <select class="form-select" name="romType" aria-label="Default select example">
            <option value="king bed">king bed</option>
            <option value="twin bed">twin bed</option>
        </select>


        <button type="submit" class="btn btn-primary mb-3">Next</button>
    </form> 

</div>



@endsection
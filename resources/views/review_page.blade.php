@extends('master_template')

@section('content')

<h4 class="mx-auto w-50 p-3 mt-5">Review Page</h4>
<div class="mx-auto w-50 p-3 mt-3 bg-body rounded-3 shadow-lg ">
    {{Session::get('firstName')}}
     <form method="POST" action="{{ url('/review-data') }}">
        @csrf
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
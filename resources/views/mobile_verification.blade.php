@extends('master_template')

@section('content')

<h3 class="mx-auto w-50 p-3 mt-5">Mobile number verification :</h3>
<div class="mx-auto w-50 p-3 mt-3 bg-body rounded-3 shadow-lg ">
    <form method="POST" action="{{url('/second-page')}}">
        @csrf
        <div class="d-flex">
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="inputGroup-sizing-default">Country code </span>
                <select class="form-select" aria-label="Default select example" name="countryCode">
                    <option value="+1" selected>+1</option>
                    @for ($i = 2; $i < 30; $i++) <option value="+{{ $i }}">+{{ $i }}</option>
                        @endfor

                        <option value="+12">+12</option>
                </select>
            </div>

            <div class="input-group mb-3 ">
                <span class="input-group-text" id="inputGroup-sizing-default">mobile no </span>
                <input type="text" name="mobileNo" class="form-control">

            </div>
        </div>


        <label class="form-label">OTP CODE :</label>

        <div class="container height-100 d-flex justify-content-center align-items-center">
            <div class="position-relative">
                <div class="card p-2 text-center">
                    <h6>Please enter the one time password <br> to verify your account</h6>
                    <div> <span>A code has been sent to</span> <small>*******9897</small> </div>
                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input
                            class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> <input
                            class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> <input
                            class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> <input
                            class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /> </div>
                    <div class="mt-4"> <button  type="submit" class="btn btn-danger px-4 validate">Next</button> </div>
                </div>
            </div>
        </div>
    </form>



</div>



@endsection
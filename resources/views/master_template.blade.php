<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap5.css')}}">
    {{--
    <link rel="stylesheet" href="{{asset('css/myStyles.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    @yield('title')
    <style>
        body {
            background-color: rgb(236, 236, 236);
        }
    </style>
</head>

<body>
    @yield('content')


    {{-- import nessasary scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <script>
        $(function () {
        $("#datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#issueDatePicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
    
    $(function () {
        $("#expiryDatePicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#arrivalDatePicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#birthDateCompanion").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#issueDatePickerCompanion").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#expiryDatePickerCompanion").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#arrivalDatePickerCompanion").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
    
    $(function () {
        $("#CheckInDate5Nigh").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });

    $(function () {
        $("#CheckOutDate5Nigh").datepicker({ 
            autoclose: true, 
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
    
    
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>



    <script src="{{asset('js/pureJsCode.js')}}"></script>
    <script src="{{asset('js/bootstrap5.js')}}"></script>
</body>

</html>
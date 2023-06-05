@extends('master_template')

@section('title')
<title>email form</title>
@endsection
@section('content')

<h1 class="mx-auto w-50 p-3 mt-5">welcome to RS4IT</h1>
<div class="mx-auto w-50 p-3 mt-3 bg-body rounded-3 shadow-lg">
    <form method="POST" action="{{url('send-mail')}}">
        @csrf
        <label for="email" class="form-label">Please Enter your Email address :</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        @error('email')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
        <div class="col-auto mt-3">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </form>

</div>

@endsection
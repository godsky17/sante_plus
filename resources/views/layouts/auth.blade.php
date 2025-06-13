@extends('layouts.app')

@section('content')
    <div class="container login">
        <div class="col-md-6 col-lg-4 mx-auto mt-5 mb-5">
            @yield('auth-content')
        </div>
    </div>
@endsection

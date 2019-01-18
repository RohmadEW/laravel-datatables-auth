@extends('layouts.frontend')

@section('links')
@auth
<a href="{{ url('/home') }}">Beranda</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Keluar</a>
@else
<a href="{{ route('login') }}">Masuk</a>

@if (Route::has('register'))
<a href="{{ route('register') }}">Register</a>
@endif
@endauth
@endsection

@section('content')
<!--<div class="title m-b-md">
    {!! config('constants.options.name_apps') !!}
</div>
<div class="sub-title">
    {!! config('constants.options.lembaga'); !!}
</div>-->
@endsection
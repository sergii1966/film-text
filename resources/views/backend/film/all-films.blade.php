@extends('backend.layouts.backend-layout')
@include('backend.common.flash-messages')
@include('backend.common.navbar')
@include('backend.film.all-films.button-add-film')
@include('backend.film.all-films.list-films')

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('button-add-film')
    @yield('list-films')
@endsection

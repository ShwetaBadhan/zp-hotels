@extends('frontend.layouts.master')
@section('title', 'Home Page')
@section('content')

@include('frontend.components.home.hero')
@include('frontend.components.home.about')
@include('frontend.components.home.services')
@include('frontend.components.home.rooms')
@include('frontend.components.home.amenities')
@include('frontend.components.home.extra-services')
@include('frontend.components.home.testimonials')
@include('frontend.components.home.blogs')



@endsection
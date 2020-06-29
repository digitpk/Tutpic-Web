@extends('layout.master')

@section('css')
    @stop

@section('content')


    <!-- Start Slider Area  -->
    @include('layout.includes.slider')
    <!-- End Slider Area  -->

    <!-- Start Service Area  -->
    @include('pages.service')
    <!-- Start Service Area  -->

    <!-- Start About Area  -->
    @include('pages.about')
    <!-- Start About Area  -->

    <!-- Start Portfolio Area  -->
    @include('pages.pricing-plan')
    <!-- Start Portfolio Area  -->

{{--    <!-- Start Team Area  -->--}}
{{--@include('pages.team')--}}
{{--    <!-- End Team Area  -->--}}


    <!-- Start Counterup Area  -->
    @include('pages.counterup')
    <!-- End Counterup Area  -->

    <!-- Start Testimonial Area  -->
    @include('pages.testimonial-area')
    <!-- Start Testimonial Area  -->

    <!-- Start Blog Area  -->
    @include('pages.blog')
    <!-- End Blog Area  -->

    <!-- Start Contact Area  -->
    @include('pages.contact')
    <!-- End Contact Area  -->




 @stop


@section('js')

    @stop

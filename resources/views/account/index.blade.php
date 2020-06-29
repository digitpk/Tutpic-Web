@extends('layout.master')
@section('css')

@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Account'])
    <!-- Start Service Area  -->
    <div class="rn-service-area rn-section-gap bg_color--1" id="service">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-info">
                    <p>{{session('success')}}</p>
                </div>
            @endif
            @if(auth()->user()->isStudent())
                <div class="row">
                    <!-- Start Single Service  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="single-service service__style--2 bg-color-gray">
                            <a href="{{url('chat')}}">
                                <div class="service">
                                    <div class="icon">
                                        <i data-feather="cast"></i>
                                    </div>
                                    @php
                                        $total_sessions = auth()->user()->getTotalUserChats();
                                        $remaining_sessions = auth()->user()->usedChats();
                                        $total_paid_amounts = auth()->user()->getTotalStudentPaidAmount();
                                    @endphp
                                    <div class="content">
                                        <h3 class="title">Session</h3>
                                        <p class="title">Available Session :
                                            <strong>{{$total_sessions-$remaining_sessions}}</strong></p>
                                        <p class="title">Used Sessions : <strong>{{$remaining_sessions}}</strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Service  -->

                    <!-- Start Single Service  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="single-service service__style--2 bg-color-gray">
                            <a href="{{url('payment')}}">
                                <div class="service">
                                    <div class="icon">
                                        <i data-feather="layers"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Payment</h3>
                                        <p>Total Paid: <strong>{{$total_paid_amounts}}</strong></p>
                                        <p><br></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Service  -->
                @endif


                <!-- Start Single Service  -->
                    @if(auth()->user()->isTeacher())
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                                <div class="single-service service__style--2 bg-color-gray">
                                    <a href="{{url('chat')}}">
                                        <div class="service">
                                            <div class="icon">
                                                <i data-feather="cast"></i>
                                            </div>
                                            <div class="content">
                                                <h3 class="title">Session</h3>
                                                <p class="title">Available Sessions :
                                                    <strong>{{auth()->user()->getTotalTeacherChats()}}</strong></p>
                                                <p>Avail Session :{{auth()->user()->usedChats()}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                                <div class="single-service service__style--2 bg-color-gray">
                                    <a href="{{url('withdraw')}}">
                                        <div class="service">
                                            <div class="icon">
                                                <i data-feather="layers"></i>
                                            </div>
                                            <div class="content">
                                                <h3 class="title">Withdraw</h3>
                                                <p>Available Balance: <strong>{{auth()->user()->getTotalTeacherAvailableBalance()}}</strong></p>
                                                <p>Total Withdraw: <strong>{{auth()->user()->getTotalTeacherPaidAmount()}}</strong></p>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Service  -->
                        </div>
                    @endif

                </div>
        </div>
    </div>

@stop



@section('js')
    <script>
        $(document).ready(function () {
            $('.breadcrumb-area').css('height', '300px')

        });
    </script>

@stop

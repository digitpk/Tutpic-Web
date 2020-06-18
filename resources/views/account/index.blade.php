@extends('layout.master')


@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Register'])
    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">

                                @if(auth()->user()->isStudent())
                                    <div
                                        class="et_pb_column  et_pb_column_1_6 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough">
                                        <div
                                            class="et_pb_button_module_wrapper {{request()->is('chat/create') ? 'et_pb_button_0' : ''}}   et_pb_button_2_wrapper et_pb_button_alignment_center et_pb_module ">
                                            <a
                                                @if(request()->is('chat/create')) style="color: white !important;"
                                                @endif
                                                class="et_pb_button   et_pb_button_2 et_pb_bg_layout_light"
                                               href="{{url('chat/create')}}">Start Session</a>
                                        </div>
                                    </div>
                                @endif

                                <div
                                    class="et_pb_column  et_pb_column_1_6 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_button_module_wrapper {{request()->is('chat') ? 'et_pb_button_0' : ''}}   et_pb_button_2_wrapper et_pb_button_alignment_center et_pb_module ">
                                        <a @if(request()->is('chat')) style="color: white !important;"
                                           @endif  class="et_pb_button   et_pb_button_2 et_pb_bg_layout_light"
                                           href="{{url('chat')}}">Sessions</a>
                                    </div>
                                </div>
                                <div
                                    class="et_pb_column et_pb_column_1_6 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_button_module_wrapper et_pb_button_3_wrapper et_pb_button_alignment_center et_pb_module ">
                                        <a class="et_pb_button et_pb_button_3 et_pb_bg_layout_light"
                                           href="#">Payments</a>
                                    </div>
                                </div>
                                <div
                                    class="et_pb_column et_pb_column_1_6 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_button_module_wrapper et_pb_button_4_wrapper et_pb_button_alignment_center et_pb_module ">
                                        <a class="et_pb_button et_pb_button_4 et_pb_bg_layout_light"
                                           href="#">Setting</a>
                                    </div>
                                </div>
                                    <div
                                    class="et_pb_column et_pb_column_1_6 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_button_module_wrapper et_pb_button_4_wrapper et_pb_button_alignment_center et_pb_module ">
                                        <a class="et_pb_button et_pb_button_4 et_pb_bg_layout_light"
                                           href="{{url('logout')}}">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="et_pb_row et_pb_row_1">
                                <div
                                    class=" et_pb_css_mix_blend_mode_passthrough et-last-child">
                                    @yield('body')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@stop
@section('js')

@stop

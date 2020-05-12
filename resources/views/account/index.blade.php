@extends('layout.master')

@section('css')
    <link rel="stylesheet" id="et-core-unified-230207-cached-inline-styles"
          href="{{asset('/')}}css/et-cache/230207/et-core-unified-230207-158845186203.min.css"
          onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)"/></head>
@stop
@section('content')
    <article id="post-230207" class="post-230207 page type-page status-publish hentry">
        <div class="entry-content">
            <div id="et-boc" class="et-boc">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters3">
                        <div class="et_pb_section et_pb_section_1 et_section_regular">
                            <div class="et_pb_row et_pb_row_0 et_pb_gutters1">

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

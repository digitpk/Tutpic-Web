@extends('layout.master')
@section('css')
    <link rel="stylesheet" id="et-core-unified-230207-cached-inline-styles"
          href="{{asset('css/et-cache/230207/et-core-unified-230207-158845186203.min.css')}}"
          onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)"/></head>
@stop
@section('content')
    <article id="post-230211" class="post-230211 page type-page status-publish hentry">
        <div class="entry-content">
            <div id="et-boc" class="et-boc">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters3">
                        <div
                            class="et_pb_section et_pb_section_0 et_pb_with_background et_section_specialty section_has_divider et_pb_bottom_divider">
                            <div class="et_pb_row">
                                <div
                                    class="et_pb_column et_pb_column_1_4 et_pb_column_1    et_pb_css_mix_blend_mode_passthrough">
                                </div>
                                <div
                                    class="et_pb_column et_pb_column_1_2 et_pb_column_1    et_pb_css_mix_blend_mode_passthrough">
                                    <div class="et_pb_module et_pb_image et_pb_image_0">
                                        <span class="et_pb_image_wrap ">
                                            <img
                                                src="{{asset('/')}}img/2020/02/tutor-09.png" alt="" title=""/></span>
                                    </div>

                                    <a style="float: right;font-size: larger"  href="{{url('register')}}">For Student</a>
                                    <h1>SignUp Here</h1>
                                    <div id=""
                                         class="et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix"
                                    >
                                        <div class="et-pb-contact-message"></div>
                                        <div class="et_pb_contact">
                                            @include('auth.includes.form-teacher')
                                        </div>
                                    </div>
                                    <div class="et_pb_module et_pb_image et_pb_image_1">
                                        <span class="et_pb_image_wrap ">
                                            <img
                                                src="{{asset('/')}}img/2020/02/tutor-10.png" alt="" title=""/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="et_pb_bottom_inside_divider et-no-transition"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@stop




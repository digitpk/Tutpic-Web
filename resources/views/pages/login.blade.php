@extends('layout.master')

@section('css')
    <link rel="stylesheet" id="et-core-unified-230207-cached-inline-styles"
          href="css/et-cache/230207/et-core-unified-230207-158845186203.min.css"
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
                                    class="et_pb_column et_pb_column_1_2 et_pb_column_0   et_pb_specialty_column  et_pb_css_mix_blend_mode_passthrough">
                                    <div class="et_pb_row_inner et_pb_row_inner_0">
                                        <div
                                            class="et_pb_column et_pb_column_4_4 et_pb_column_inner et_pb_column_inner_0 et-last-child">
                                            <div
                                                class="et_pb_module et_pb_divider et_pb_divider_0 et_pb_divider_position_center et_pb_space">
                                                <div class="et_pb_divider_internal"></div>
                                            </div>
                                            <div
                                                class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                                                <div class="et_pb_text_inner"><h4>Login Form</h4></div>
                                            </div>
                                            <div
                                                class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">
                                                <div class="et_pb_text_inner"><h1>Login</h1>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="et_pb_row_inner et_pb_row_inner_1">
                                        <div
                                            class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_1">
                                            <div
                                                class="et_pb_module et_pb_blurb et_pb_blurb_0  et_pb_text_align_left  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                <div class="et_pb_blurb_content">
                                                    <div class="et_pb_main_blurb_image">
                                                    </div>
                                                    <div class="et_pb_blurb_container">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_2 et-last-child">
                                            <div
                                                class="et_pb_module et_pb_blurb et_pb_blurb_1  et_pb_text_align_left  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                <div class="et_pb_blurb_content">
                                                    <div class="et_pb_main_blurb_image">
                                                    </div>
                                                    <div class="et_pb_blurb_container">
                                                        <h4 class="et_pb_module_header"></h4>
                                                        <div class="et_pb_blurb_description"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="et_pb_column et_pb_column_1_2 et_pb_column_1    et_pb_css_mix_blend_mode_passthrough">
                                    <div class="et_pb_module et_pb_image et_pb_image_0">
                                        <span class="et_pb_image_wrap "><img
                                                src="{{asset('/')}}img/2020/02/tutor-09.png" alt="" title=""/></span>
                                    </div>
                                    <div id="et_pb_contact_form_0"
                                         class="et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix"
                                         data-form_unique_num="0">
                                        <div class="et-pb-contact-message"></div>
                                        <div class="et_pb_contact">

                                                <form class="et_pb_contact_form clearfix" id="record-form" action="{{url('login')}}" method="post">
                                                    @csrf
                                                <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last"
                                                   data-id="email" data-type="email">
                                                    <label for="et_pb_contact_email_0" class="et_pb_contact_form_label">Email
                                                        Address</label>
                                                    <input type="text" id="et_pb_contact_email_0" class="input" value=""
                                                           name="et_pb_contact_email_0" data-required_mark="required"
                                                           data-field_type="email" data-original_id="email"
                                                           placeholder="Email Address">
                                                </p>
                                                <p class="et_pb_contact_field et_pb_contact_field_0 et_pb_contact_field_last"
                                                   data-id="name" data-type="input">
                                                    <label for="et_pb_contact_name_0" class="et_pb_contact_form_label">Password</label>
                                                    <input type="text" id="et_pb_contact_name_0" class="input" value=""
                                                           name="password" data-required_mark="required"
                                                           data-field_type="input" data-original_id="password"
                                                           placeholder="Password">
                                                </p>


                                                <input type="hidden" value="et_contact_proccess"
                                                       name="et_pb_contactform_submit_0"/>
                                                <div class="et_contact_bottom_container">
                                                    <button type="submit" name="et_builder_submit_button"
                                                            class="et_pb_contact_submit et_pb_button et_pb_custom_button_icon"
                                                            data-icon="&#x24;">Login
                                                    </button>
                                                </div>
                                                <input type="hidden" id="_wpnonce-et-pb-contact-form-submitted-0"
                                                       name="_wpnonce-et-pb-contact-form-submitted-0"
                                                       value="83aac8e5c3"/><input type="hidden" name="_wp_http_referer"
                                                                                  value="/layouts/education/tutor-contact-page/live-demo"/>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="et_pb_module et_pb_image et_pb_image_1">
                                        <span class="et_pb_image_wrap "><img
                                                src="{{asset('/')}}img/2020/02/tutor-10.png" alt="" title=""/></span>
                                    </div>
                                </div>
                            </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>


@stop


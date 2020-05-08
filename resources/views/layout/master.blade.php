<!DOCTYPE html>
<html>
<head>
    {{--    <title> {{$company->title}} </title>--}}
    @include('layout.includes.styles')
    @yield('css')
</head>
<body class="page-template-default page page-id-230209 theme-Divi woocommerce-no-js et_pb_button_helper_class et_fullwidth_nav et_fixed_nav et_show_nav et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_pb_footer_columns4 et_cover_background et_pb_gutter windows et_pb_gutters3 et_pb_pagebuilder_layout et_no_sidebar et_divi_theme et-db et_minified_js et_minified_css">

<div id="page-container">

    <div id="et-main-area">

        @include('layout.navbar')
        <div id="main-content">

            @include('layout.includes.alerts')
            @yield('content')
            @include('layout.footer')
            @include('layout.includes.scripts')
            <script src="{{asset('js/app.js')}}"></script>
            @yield('js')
        </div>
    </div>
</div>
</body>
</html>

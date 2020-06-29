
@extends('layout.master')
@section('css')

@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>$blog->title])
    <!-- Start Blog Details Area  -->
    <div class="rn-blog-details pt--110 pb--70 bg_color--1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-wrapper">
                        <div class="inner">
                            <p>{{$blog->short_description}} </p>
                            <div class="thumbnail">
                                <img src="{{asset('_images/blogs/thumbnail/'.$blog->image)}}" style="height: 598px; width: 1000px" alt="Blog Images">
                            </div>

                            <blockquote class="rn-blog-quote">{{$blog->description}}</blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details Area  -->



@stop

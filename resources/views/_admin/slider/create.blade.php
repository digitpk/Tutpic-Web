@extends('_admin.layout.master')
{{--<link rel="stylesheet" href="/css/bootstrap.min.css"> <!---  css file  --->--}}
{{--<script type="text/javascript" src="/js/jquery.min.js"></script>--}}
<?php
$url = 'slider-image/';
?>
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Add Image</h4>
                    <a href="{{url('slider')}}">Existing Images</a>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">

                        <form class="form" action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="">Add Image </label>
                                    <br><br>
                                    <input type="file"
                                           required
                                           name="image">
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-raised btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                                <button type="submit" class="btn btn-raised btn-info">
                                    <i class="fa fa-check-square-o"></i> Save & Continue
                                </button>
                                <a href="{{url($url)}}" class="btn btn-raised btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

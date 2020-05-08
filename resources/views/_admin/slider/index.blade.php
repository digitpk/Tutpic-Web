<?php
$url = 'slider-image/';
?>
@extends('_admin.layout.master')

@section('content')
    <section id="column">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Images
                            <a href="{{url($url.'create')}}" title="Add New Record"
                               class="ml-3 btn btn-round btn-raised gradient-mint white sidebar-shadow"><span
                                    class="fa fa-plus"></span></a>
                        </h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <div class="row">
                                @foreach($images as $i)
                                    <div class="col-sm-6" style="">
                                        <img src="{{asset('images/slider/thumbnail/'.$i->image)}}" alt="">

                                        <form action="{{$url.$i->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn btn-danger" style="margin-top: 15px;  ">Delete Image</button>

                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop


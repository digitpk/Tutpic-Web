<?php
$url = 'certifications/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Update Certification</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url.$certification->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Certification Title</label>
                                    <input type="text" id="title"
                                           value="{{$certification->title}}"
                                           class="form-control round" name="title"/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control round"
                                              id="description" cols="20" rows="5">
                                        {{$certification->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Icon</label>
                                    <input type="file" class="form-control round" id="icon"  name="icon"/><br>
                                    <sm style="color: red">{{$errors->first('icon')}}</sm>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update certification</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<?php
$url = 'testimonials/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Create Testimonials</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title"
                                           value="{{old('title')}}"
                                           class="form-control round" name="title"/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input name="designation" class="form-control round"
                                              id="designation" value="{{old('designation')}}">
                                    <sm style="color: red">{{$errors->first('designation')}}</sm>

                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control round"
                                              id="description" cols="20" rows="5">
                                        {{old('description')}}</textarea>
                                    <sm style="color: red">{{$errors->first('description')}}</sm>
                                </div>

                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Image</label>
                                    <input type="file" class="form-control round" id="image"  name="image"/><br>
                                    <sm style="color: red">{{$errors->first('image')}}</sm>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

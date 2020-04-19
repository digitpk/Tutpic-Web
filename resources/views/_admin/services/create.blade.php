<?php
$url = 'services/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Create Service</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Service Title</label>
                                    <input type="text" id="title"
                                           value="{{old('title')}}"
                                           class="form-control round" name="title"/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="short_description">Brief Description</label>
                                    <textarea name="short_description" class="form-control round"
                                              id="short_description" cols="20" rows="2">
                                        {{old('short_description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control round"
                                              id="description" cols="20" rows="5">
                                        {{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Image</label>
                                    <input type="file" class="form-control round" id="image"  name="image"/><br>
                                    <sm style="color: red">{{$errors->first('image')}}</sm>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Service</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

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
                    <h4 class="card-title" id="basic-layout-round-controls">Create Certification</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Certification Title</label>
                                    <input type="text" id="title"
                                           value="{{old('title')}}"
                                           class="form-control round" name="title" required/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control round"
                                              id="description"  rows="5" required>{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Icon</label>
                                    <input type="file" class="form-control round" id="icon"  name="icon" required/><br>
                                    <sm style="color: red">{{$errors->first('icon')}}</sm>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Certification</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

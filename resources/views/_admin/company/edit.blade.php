<?php
$url = 'info/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Update Service</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url.$info->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Service Title</label>
                                    <input type="text" id="title"
                                           value="{{$info->title}}"
                                           class="form-control round" name="title"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email"
                                           value="{{$info->email}}"
                                           class="form-control round" name="email"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone"
                                           value="{{$info->phone}}"
                                           class="form-control round" name="phone"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                           value="{{$info->address}}"
                                           class="form-control round" name="address"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" id="description"
                                           value="{{$info->description}}"
                                           class="form-control round" name="description"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" id="facebook"
                                           value="{{$info->facebook}}"
                                           class="form-control round" name="facebook"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="twitter	">Twitter	</label>
                                    <input type="text" id="twitter"
                                           value="{{$info->twitter}}"
                                           class="form-control round" name="twitter"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="google">Google</label>
                                    <input type="text" id="google"
                                           value="{{$info->google}}"
                                           class="form-control round" name="google"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="instagram">	Instagram</label>
                                    <input type="text" id="instagram"
                                           value="{{$info->instagram}}"
                                           class="form-control round" name="instagram"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" id="linkedin"
                                           value="{{$info->linkedin}}"
                                           class="form-control round" name="linkedin"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" id="website"
                                           value="{{$info->website}}"
                                           class="form-control round" name="website"/>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input required type="file" class="form-control round" id="logo" name="logo"/><br>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

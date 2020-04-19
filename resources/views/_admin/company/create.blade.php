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
                    <h4 class="card-title" id="basic-layout-round-controls">Company</h4>
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
                                           class="form-control round" name="title" required/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email"
                                           value="{{old('email')}}"
                                           class="form-control round" name="email"/>
                                    <sm style="color: red">{{$errors->first('email')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone"
                                           value="{{old('phone')}}"
                                           class="form-control round" name="phone"/>
                                    <sm style="color: red">{{$errors->first('phone')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                           value="{{old('address')}}"
                                           class="form-control round" name="address"/>
                                    <sm style="color: red">{{$errors->first('address')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" id="description"
                                           value="{{old('description')}}"
                                           class="form-control round" name="description"/>
                                    <sm style="color: red">{{$errors->first('description')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" id="facebook"
                                           value="{{old('facebook')}}"
                                           class="form-control round" name="facebook"/>
                                    <sm style="color: red">{{$errors->first('facebook')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="twitter	">Twitter	</label>
                                    <input type="text" id="twitter	"
                                           value="{{old('twitter	')}}"
                                           class="form-control round" name="twitter	"/>
                                    <sm style="color: red">{{$errors->first('twitter')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="google">Google</label>
                                    <input type="text" id="google"
                                           value="{{old('google')}}"
                                           class="form-control round" name="google"/>
                                    <sm style="color: red">{{$errors->first('google')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="instagram">	Instagram</label>
                                    <input type="text" id="instagram"
                                           value="{{old('instagram')}}"
                                           class="form-control round" name="instagram"/>
                                    <sm style="color: red">{{$errors->first('instagram')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" id="linkedin"
                                           value="{{old('linkedin')}}"
                                           class="form-control round" name="linkedin"/>
                                    <sm style="color: red">{{$errors->first('linkedin')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" id="website"
                                           value="{{old('website')}}"
                                           class="form-control round" name="website"/>
                                    <sm style="color: red">{{$errors->first('website')}}</sm>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control round" id="logo" name="logo"/><br>
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

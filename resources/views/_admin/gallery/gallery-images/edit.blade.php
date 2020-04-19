<?php
$url = 'gallery-images/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Update Image</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form action="{{url($url.$image->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="form-group">
                                    <sm style="color: red">{{$errors->first('gallery_category_id')}}</sm>
                                    <select class="custom-select" style=" border-radius: 1.5rem;" name="gallery_category_id" id="gallery_category_id">
                                        <option selected>Choose Image Category</option>
                                        @foreach($categories as $category)
                                            <option @if($category->id=== $image->gallery_category_id) selected='selected' @endif
                                            value="{{$category->id}}" >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Image Title</label>
                                    <input type="text" id="title"
                                           value="{{$image->title}}"
                                           class="form-control round" name="title"/>
                                    <sm style="color: red">{{$errors->first('title')}}</sm>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Image</label>
                                    <input type="file" class="form-control round" id="image"  name="image"/><br>
                                    <sm style="color: red">{{$errors->first('image')}}</sm>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

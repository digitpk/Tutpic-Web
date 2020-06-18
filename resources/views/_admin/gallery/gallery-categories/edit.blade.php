<?php
$url = 'gallery-categories/';
?>
@extends('_admin.layout.master')
@section('content')
    <div class="row match-height">
        <!-- dropdown button -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-round-controls">Update Category</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" id="create-form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input type="text" id="title"
                                           value="{{$category->title}}"
                                           class="form-control round" name="title"/>
                                </div>
                            </div>


                        </form>
                        <div class="form-actions">
                            <button onclick="formSubmit('PUT','{{url($url.$category->id)}}','{{url($url)}}',$('#create-form').serialize(),'Ctaegory Updated Successfully')" class="btn btn-raised btn-primary">
                                <i class="fa fa-check-square-o"></i> Update
                            </button>

                            <a href="{{url($url)}}" class="btn btn-raised btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

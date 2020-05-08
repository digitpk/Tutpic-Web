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
                    <h4 class="card-title" id="basic-layout-round-controls">Create Category</h4>
                </div>
                <hr/>

                <div class="card-content">
                    <div class="px-3">
                        <form class="form" id="create-form">

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input type="text" id="title" class="form-control round" name="title"/>
                                </div>
                            </div>


                        </form>
                        <div class="form-actions">
                            <button onclick="formSubmit('POST','{{url($url)}}','{{url($url)}}',$('#create-form').serialize(),'Ctaegory Saved Successfully')" class="btn btn-raised btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                            <button onclick="formSubmit('POST','{{url($url)}}','{{url($url.'create')}}',$('#create-form').serialize(),'Category Saved Successfully')" class="btn btn-raised btn-info">
                                <i class="fa fa-check-square-o"></i> Save & Continue
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

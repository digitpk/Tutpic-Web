<?php
$url = 'info/';
?>

@extends('_admin.layout.master')
@section('content')

    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Company Info</h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered column-rendering">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Google</th>
                                    <th>Instagram</th>
                                    <th>Linkedin</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr >

                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{asset('images/company/original/'.$info->logo)}}"
                                                 alt="{{$info->title}}"></td>
                                        <td>{{$info->title}}</td>
                                        <td>{{$info->email}}</td>
                                        <td>{{$info->phone}}</td>
                                        <td>{{$info->description}}</td>
                                        <td>{{$info->address}}</td>
                                        <td>{{$info->facebook}}</td>
                                        <td>{{$info->twitter}}</td>
                                        <td>{{$info->google}}</td>
                                        <td>{{$info->instagram}}</td>
                                        <td>{{$info->website}}</td>
                                        <td>{{$info->description}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="ft-settings"></span>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <a href="{{$url.$info->id.'/edit'}}" class="dropdown-item" type="button">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

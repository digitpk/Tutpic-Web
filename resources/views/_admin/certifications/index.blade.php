<?php
$url = 'certifications/';
?>

@extends('_admin.layout.master')
@section('content')

    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Certifications
                            <a href="{{url($url.'create')}}" title="Add New Record"
                               class="ml-3 btn btn-round btn-raised gradient-mint white sidebar-shadow"><span
                                    class="fa fa-plus"></span></a>
                        </h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered column-rendering">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Certification Title</th>
                                    <th>Brief Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($certifications as $certification)

                                    <tr >

                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{asset('images/certifications/icons/'.$certification->icon)}}"
                                                 alt="{{$certification->title}}"></td>
                                        <td>{{$certification->title}}</td>
                                        <td>{{$certification->description}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="ft-settings"></span>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <a href="{{$url.$certification->id.'/edit'}}" class="dropdown-item" type="button">Edit</a>
                                                <form action="{{$url.$certification->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>

                                @endforeach


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

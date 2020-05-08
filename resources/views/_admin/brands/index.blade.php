<?php
$url = 'brands/';
?>

@extends('_admin.layout.master')
@section('content')

    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Brands
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($images as $image)

                                    <tr >

                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{asset('images/brands/thumbnail/'.$image->image)}}"
                                                 alt="{{$image->title}}"></td>

                                        <td>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="ft-settings"></span>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <form action="{{$url.$image->id}}" method="POST">
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

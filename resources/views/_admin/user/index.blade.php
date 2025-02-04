<?php
$url = 'user/';
?>

@extends('_admin.layout.master')
@section('content')

    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Info</h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered column-rendering">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>User Role</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr >
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    @if($user->role_id ===2)
                                            <td>Teacher</td>
                                        @else
                                            <td>Student</td>
                                        @endif
{{--                                    <td>--}}
{{--                                        <button type="button" class="btn btn-success dropdown-toggle"--}}
{{--                                                data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                                aria-expanded="false">--}}
{{--                                            <span class="ft-settings"></span>--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu arrow">--}}
{{--                                            <a href="{{$url.$user->id.'/edit'}}" class="dropdown-item" type="button">Edit</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
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

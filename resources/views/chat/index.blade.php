@extends('layout.master')
@section('content')
    <section class="container">
        <h1>Your Sessions</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Question</th>
                <th>Teacher</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($records as $record)
                <tr>
                    <td>{{$record->firstMessage->description}}</td>
                    <td>{{$record->getTeacherName()}}</td>
                    <td>@if($record->is_active) Active @else Closed  @endif</td>
                    <td>{{date('d-m-Y',strtotime($record->created_at))}}</td>
                    <td>
                        <a href="{{$url.'/'.base64_encode($record->id)}}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">You have no session
                        @if(auth()->user()->isStudent())
                            <a href="{{$url.'/create'}}" class="btn text-primary"><b>Start Session</b></a>
                        @endif
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </section>
@stop
@section('js')
    <script>

    </script>
@stop



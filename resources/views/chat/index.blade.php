@extends('layout.master')
@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Session'])

    <section class="">

        @if(auth()->user()->isStudent())
            <div class="row" style="margin: 10px 0px;">
                <div class="container">
                    <a class="btn btn-success" style="background-color: #f9004d;color: burlywood;" href="{{url('chat/create')}}">New Session</a>
                </div>
            </div>
        @endif

        <div class="container" style="margin-top: 10px">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($records as $record)
                    <tr>
                        <td>{{$record->firstMessage->description}}</td>
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
            <div class="row">
                <div class="h-100 row align-items-center">            {{$records->links()}}
                </div>

            </div>

        </div>
    </section>
@stop

@section('js')
    <script>

    </script>
@stop



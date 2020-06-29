@extends('layout.master')
@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Payment'])

    <section class="">

        <div class="row" style="margin: 10px 0px;">
            <div class="container">
                <a class="btn btn-success" style="background-color: #f9004d;color: burlywood;"
                   href="{{url('payment/create')}}">Add Payment</a>
            </div>
        </div>

        <div class="container" style="margin-top: 10px">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Remarks</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($records as $record)
                    <tr>
                        <td><img style="width: 100px; height: 100px"
                                 src="{{asset('_images/payment/thumbnail/'.$record->image)}}"
                                 alt="{{$record->title}}"></td>
                        <td>{{$record->amount}}</td>
                        <td>{{$record->remarks}}</td>

                        <td>{{date('d-m-Y',strtotime($record->date))}}</td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="4">You have no payment yet
                            @if(auth()->user()->isStudent())
                                <a href="{{$url.'/create'}}" class="btn text-primary"><b>Make Payment</b></a>
                            @endif
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>
            <div class="row">
                <div class="h-100 row align-items-center">
                    {{$records->links()}}
                </div>

            </div>

        </div>
    </section>
@stop

@section('js')
    <script>

    </script>
@stop



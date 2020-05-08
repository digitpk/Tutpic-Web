@extends('layout.master')
@section('content')
    <section class="spak-log">
        <div class="container container-secu">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 mx-auto">
                    <div class="card-signin my-5">
                        <div class="card-body">
                            @include('auth.includes.form-student')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')

@stop



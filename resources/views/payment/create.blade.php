@extends('layout.master')

@section('css')
    <style>
        .rn-section-gap {
            padding: 2px 0;
        }
    </style>
    @stop
@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Payment'])

    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <p>
                    <a class="btn mt-1" style="background-color: #f81f01; color: white" data-toggle="collapse" href="#collapseAccount" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Bank Account Info
                    </a>
                    <a class="btn mt-1" style="background-color: #f81f01; color: white" data-toggle="collapse" href="#collapseJazz" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Jazz Account Info
                    </a>

                </p>
                <div class="collapse" id="collapseAccount">
                    <div class="card card-body">
                        <div class="row">
                            <div class="pricing-table table ">
                                <table class="table table-bordered">
                                    <tbody><tr>
                                        <th style=" background-color: #f81f01" colspan="2" class="text-white">Account Detail</th>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Bank Name</th>
                                        <td class="text-left">Meezan Bank</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Account Title</th>
                                        <td class="text-left">Mahboob Ali Shah</td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--    <th class="text-right">Account Name</th>-->
                                    <!--    <td class="text-left"></td>-->
                                    <!--</tr>-->
                                    <tr>
                                        <th class="text-right">IBAN</th>
                                        <td class="text-left">07010103819368</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Address</th>
                                        <td class="text-left">-</td>
                                    </tr>
                                    </tbody></table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="collapse" id="collapseJazz">
                    <div class="card card-body">
                        <div class="row">
                            <div class="pricing-table table ">
                                <table class="table table-bordered">
                                    <tbody><tr>
                                        <th style=" background-color: #f81f01" colspan="2" class="text-white">Account Detail</th>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Jazz Account</th>
                                        <td class="text-left">Jazz Number</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Account Title</th>
                                        <td class="text-left">Mahboob Ali Shah</td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--    <th class="text-right">Account Name</th>-->
                                    <!--    <td class="text-left"></td>-->
                                    <!--</tr>-->
                                    <tr>
                                        <th class="text-right">IBAN d-dsffds-</th>
                                        <td class="text-left">07010103819368</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Address</th>
                                        <td class="text-left">-</td>
                                    </tr>
                                    </tbody></table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h3 class="title"></h3>

                        </div>
                        <div class="form-wrapper">
                            <form   action="{{url('payment')}}" enctype="multipart/form-data" method="post">
                                <br>
                                @csrf
                                <label for="plan"
                                       class="">Pricing Plan</label>
                                <select name="plan_id" id="plan_id" style="margin-bottom: 10px"
                                >
                                    <option value="">Select Pricing Plan</option>
                                    @foreach($plans as $plan)

                                        <option value="{{$plan->id}}">{{$plan->title}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('plan'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('plan')}}</span>
                                @endif

                                <label for="remark"
                                       class="">Remark</label>
                                <textarea id="remarks"
                                          class="input"
                                          name="remarks"
                                          value="{{old('remark')}}"
                                          placeholder="Write remark" cols="30" rows="10"></textarea>
                                @if($errors->has('remark'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('remark')}}</span>
                                @endif



                                <label for="image"
                                       class="">Image</label>
                                <input type="file" id="image"
                                       class="input"
                                       name="image"
                                       placeholder="Write image">
                                @if($errors->has('amimageount'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('image')}}</span>
                                @endif

                                <label for="date"
                                       class="">Write date of make payment</label>
                                <input type="date" id="date"
                                       class="input"
                                       name="date"
                                       value="{{old('date')?:date('Y-m-d')}}"
                                       >
                                @if($errors->has('date'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('date')}}</span>
                                @endif



                                <button style="margin-top: 5%; !important;" class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Submit
                                </button>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail mb_md--30 mb_sm--30">
                            <img src="{{asset('assets/images/about/about-6.jpg')}}" alt="trydo"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('js')


    <script>
        $(document).ready(function() {
            jQuery.noConflict();
            $('.level').select2();
            $('#subject').select2();


        });
    </script>
@stop

@extends('layout.master')

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Payment'])

    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h3 class="title"></h3>

                        </div>
                        <div class="form-wrapper">
                            <form   action="{{url('payment')}}" enctype="multipart/form-data" method="post">
                                <br>
                                @csrf
                                <label for="amount"
                                       class="">Amount</label>
                                <input type="text" id="amount"
                                       class="input"
                                       name="amount"
                                       value="{{old('amount')}}"
                                       placeholder="Write amount">
                                @if($errors->has('amount'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('amount')}}</span>
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
                                       value="{{date('Y-m-d')}}"
                                       placeholder="Write image">
                                @if($errors->has('amimageount'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('image')}}</span>
                                @endif

                                <label for="date"
                                       class="">Write date of make payment</label>
                                <input type="date" id="date"
                                       class="input"
                                       name="date"
                                       value="{{old('date')}}"
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

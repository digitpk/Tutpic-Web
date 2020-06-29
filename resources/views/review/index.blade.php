@extends('layout.master')
@section('css')
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 3vw;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        body {
            background: #222225;
            color: white
        }

        h1,
        p {
            text-align: center
        }

        h1 {
            margin-top: 150px
        }

        p {
            font-size: 1.2rem
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 14px
            }

            p {
                font-size: 12px
            }
        }
    </style>
@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'review'])
    <!-- Start Service Area  -->
    <div class="rn-service-area rn-section-gap bg_color--1" id="service">

        <div class="container">
            <div class="row">


                <div class="card">
                    <div class="card-body">
                        <div class="row">


                                    <div class="form-wrapper">
                                        <form action="{{url('review')}}" method="post">
                                        @csrf

                                            <input type="text" hidden name="chat_id" value="{{request()->chat_id}}">
                                                <textarea  name="remarks" cols="80" rows="5" class="form-control" placeholder="Enter Your Review"></textarea>
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                            <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit" id="mc-embedded-subscribe">Submit</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


@stop



@section('js')
<script>
    $(document).ready(function () {
    $('.breadcrumb-area').css('height','300px')

    });
</script>

    @stop

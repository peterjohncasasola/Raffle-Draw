@extends('mainraffle')

@section('content')

<div class="container">
    <div class="row">
        <div class="span3">
            <div class="roulette_container">
                <div class="roulette" id="roulette1" style="display:none;">
                    <img src="{{URL::asset('/img/0.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/1.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/2.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/3.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/4.jpg')}}" width="250px" height="250px"/>
                </div>
            </div>

        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette2" style="display:none;">
                    <img src="{{URL::asset('/img/0.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/1.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/2.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/3.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/4.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/5.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/6.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/7.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/8.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/9.jpg')}}" width="250px" height="250px"/>

                </div>
            </div>


        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette3" style="display:none;">
                    <img src="{{URL::asset('/img/0.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/1.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/2.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/3.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/4.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/5.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/6.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/7.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/8.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/9.jpg')}}" width="250px" height="250px"/>
                </div>
            </div>


        </div>
        <div class="span3">
            <div class="roulette_container" >
                <div class="roulette" id="roulette4"  style="display:none;">
                    <img src="{{URL::asset('/img/0.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/1.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/2.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/3.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/4.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/5.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/6.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/7.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/8.jpg')}}" width="250px" height="250px"/>
                    <img src="{{URL::asset('/img/9.jpg')}}" width="250px" height="250px"/>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="winner-content">
        <button class="btn btn-primary btn-roll btn-lg" disabled="" id="claim-prize">CLAIM PRIZE</button>
        <button class="btn btn-success btn-roll btn-lg start" id="start-roll">START ROLL</button>
        <p class="winner-name"></p>

    </div>
</div>
@endsection


@section('additional-script')
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/roulette.js') }}"></script>
<script src="{{ asset('js/rouletteApp.js') }}"></script>
@endsection

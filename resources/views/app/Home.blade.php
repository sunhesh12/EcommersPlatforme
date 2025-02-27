@extends('app.layouts.main')
@section('content')
<div class="homeContainer">
    <div class="container">
        <div class="homeBodyTop">
            <div class="homeBodyTopTop">
                <img src={{ asset('images/wallpaper.jpg') }}>
            </div>
            <br>
            <br>
            <div class="homeBodyTopBottom">
                <h2>New Products</h2>
                <div class="homeBodyTopBottomitemContainer">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">
                        @foreach(range(1, 12) as $index)
                            <x-cart></x-cart>
                        @endforeach
                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>
        </div>
        <div class="homeBodyMiddle">
            
        </div>
        <div class="homeBodyBottom"></div>
    </div>
</div>
@stop

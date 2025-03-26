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
            <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">
                        @foreach(range(1, 12) as $index)
                        <x-cart></x-cart>
                        @endforeach
                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>

            <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
                    <div class="leftbutton"></div>
                    <div class="cartComponentContainer">
                        @foreach(range(1, 12) as $index)
                        <x-cart></x-cart>
                        @endforeach
                    </div>
                    <div class="Rightbutton"></div>
                </div>
            </div>

            <div class="homeBodyMiddleTop">
                <div class="HomeBodyMiddleTopLeft">
                    <img src={{ asset('images/msiLogo.jpg') }}>
                </div>
                <div class="HomeBodyMiddleTopRight">
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
        <div class="homeBodyBottom">
            <div class="homeBodyBottomTop">
                <hr />
                <div class="homeBodyBottomTopContainer">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                    <img src="{{ asset('images/msiLogo.png') }}">
                </div>
                <hr />
            </div>
            <div class="homeBodyBottomMiddle">
                <div class="homeBodyBottomMiddleTop">
                    <div class="homeBodyBottomMiddleTopLeft">
                        <img src="{{ asset('icon/quationMark.png') }}">
                    </div>
                    <div class="homeBodyBottomMiddleTopRight"></div>
                </div>
                <div class="homeBodyBottomMiddleMiddle"></div>
                <div class="homeBodyBottomMiddleBottom"></div>
            </div>

            <div class="homeBodyBottomBottom">

            </div>
        </div>
    </div>
</div>
@stop
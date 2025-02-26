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
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                        <x-cart></x-cart>
                    </div>
                    <div class="leftbutton"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
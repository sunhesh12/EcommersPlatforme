@extends('app.layouts.main')
@section('content')
<div class="abouttop">
    <div class="about-top-top">
    <nav>
    <a href="#">Home</a> › <span>About US</span>
 </nav>
    </div>
    <div class="about-top-bottom">
    <h1>About Us</h1>
    </div>
</div>
<section class="about-midsection1">
        <div class="about-midcontainer1">
            <div class="about-midtext1">
                <h2 class>A Family That Keeps On Growing</h2>
                <p>
                    We always aim to please the home market, supplying great computers and hardware at great prices 
                    to non-corporate customers, through our large Melbourne CBD showroom and our online store.
                </p>
                <p>
                    Shop management approach fosters a strong customer service focus in our staff. We prefer to cultivate 
                    long-term client relationships rather than achieve quick sales, demonstrated in the measure of our long-term success.
                </p>
            </div>
            <div class="about-midimage1">
            <img src={{ asset('images/shop.png') }}>
            </div>
        </div>
    </section>
@stop
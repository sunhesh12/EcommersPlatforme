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
<section class="about-midsection2">
    <div class="about-midcontainer2">
        <div class="about-midimage2">
            <img src={{ asset('images/keyboard.png') }}>
        </div>
        <div class="about-midicon2">
            <img src={{ asset('icon/deliver.png') }}>
        </div>
        <div class="about-midcontent2">
            <h2>We Deliver to Any Regions</h2>
            <p>
                We deliver our goods all across World. No matter where you live, your order will be shipped in time
                and delivered right to your door or any location you have stated. The packages are handled with utmost care,
                so the ordered products will be handed to you safe and sound, just like you expect them to be.
            </p>
        </div>
    </div>
</section>
<section class="about-midsection3">
    <div class="about-midcontainer3">
        <div class="about-midicon3">
            <img src={{ asset('icon/safe.png') }}>
        </div>
        <div class="about-midtext3">

            <h2 class>Now You're In Safe Hands</h2>
            <p>
                Experience a 40% boost in computing from last generation. MSI Desktop equips the 10th Gen. Intel® Core™ i7 processor with the upmost computing power to bring you an unparalleled gaming experience.
            </p>
            <p>
                *Performance compared to i7-9700. Specs varies by model.
            </p>
        </div>
        <div class="about-midimage3">
            <img src={{ asset('images/laptop-aboutus.webp') }}>
        </div>
    </div>
</section>
<section class="about-midsection4">
    <div class="about-midcontainer4">
        <div class="about-midimage4">
            <img src={{ asset('images/laptop2-aboutus.jpg') }}>
        </div>
        <div class="about-midicon4">
            <img src={{ asset('icon/Quality.png') }}>
        </div>
        <div class="about-midcontent4">
            <h2>The Highest Quality of Products</h2>
            <p>
                We guarantee the highest quality of the products we sell. Several decades of successful operation and millions of happy customers let us feel certain about that. Besides, all items we sell pass thorough quality control, so no characteristics mismatch can escape the eye of our professionals.
            </p>
        </div>
    </div>
</section>


@stop
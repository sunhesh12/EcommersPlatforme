<div class="navigations">
    <div class="navigationsTop">
        <p>Mon-Fri: <span>9:00 A.M. - 5.30 P.M. </span></p>
        <p>Visit our showroom in 1234 street Address City Address,1234 <span><a href="{{ route('user.contactUs') }}">Contact Us</a></span></p>
        <p>
    <span>Call Us: (00) 1234 5678</span>
    <a href="https://www.facebook.com" target="_blank">
        <img src="{{ asset('icon/facebookIcon.png') }}" alt="Facebook">
    </a>
    <a href="https://www.instagram.com" target="_blank">
        <img src="{{ asset('icon/instagramIcon1.png') }}" alt="Instagram">
    </a>
</p>

    </div>
    <div class="navigationsBottom">
        <div class="NavigationBar-logo">
            <img src={{ asset('icon/logo.png') }} alt="logo" width="60px" height="70px">
        </div>
        <div class="NavigationBar-mainRoute-right">
            <ul>
            <li><a href="{{ route('home') }}">home</a></li>
            <li><a href="#">Laptop Parts</a></li>
            <li><a href="{{ route('user.contactUs') }}">Contact Us</a></li>
            <li><a href="{{ route('user.aboutuss') }}">About Us</a></li>
            <li><a href="#">Repairs</a></li>
            </ul>
        </div>
        <div class="NavigationBar-SecondryRoute-left">
        <a href=""><img src={{ asset('icon/search.png') }} alt="logo" width="50px" height="50px"></a>
        <a href="{{route('user.cart') }}"><img src={{ asset('icon/cart.png') }} alt="logo" width="50px" height="50px"></a>
        <a href="{{ route('user.my-profile') }}"><img src={{ asset('default.png') }} alt="logo" width="60px" height="60px" style="border-radius: 100%;"></a>
        </div>
        <!-- <ul>
            <li><a href="{{ route('home') }}">home</a></li>
            <li><a href="#">Laptop Parts</a></li>
            <li><a href="{{ route('user.contactUs') }}">Contact Us</a></li>
            <li><a href="{{ route('user.aboutuss') }}">About Us</a></li>
            <li><a href="#">Repairs</a></li>
            <li><a href="{{ route('user.faq') }}">faq</a></li>
            <li><a href="{{ route('user.loginn') }}">Login</a></li>
            <li><a href="{{ route('user.registerr') }}">Register</a></li>
            <li><a href="{{route('user.cart') }}">Cart</a></li>
            <li><a href="#">Checkout</a></li>
            <li><a href="{{ route('user.my-profile') }}">My Account</a></li>
            <li><a href="#">Search</a></li>
        </ul> -->
    </div>
</div>
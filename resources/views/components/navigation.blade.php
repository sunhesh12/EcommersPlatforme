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
            <a href="{{ route('home') }}"><img src={{ asset('icon/logo.png') }} alt="logo" width="60px" height="70px"></a>
        </div>
        <div class="NavigationBar-mainRoute-right">
            <ul>
                <li><a href="{{ route('home') }}">home</a></li>
                <li><a href="#">Laptop Parts</a></li>
                <li><a href="{{ route('user.contactUs') }}">Contact Us</a></li>
                <li><a href="{{ route('user.aboutuss') }}">About Us</a></li>
                <li><a href="#">Repairs</a></li>
                @if (Auth::check() && Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="adminSpecial" >Admin View</a>
                @endif
            </ul>
        </div>

        <div class="NavigationBar-SecondryRoute-left">
            <a href="{{ route('catalog.filter') }}"><img src={{ asset('icon/search.png') }} alt="logo" width="50px" height="50px"></a>
            <a href="{{route('user.cart') }}"><img src={{ asset('icon/cart.png') }} alt="logo" width="50px" height="50px"></a>
            <!-- <a href="{{ route('user.my-profile') }}"><img src={{ asset('default.png') }} alt="logo" width="60px" height="60px" style="border-radius: 100%;"></a> -->
            @if (Auth::check())
            <div class="dropdown" id="profileDropdown">
                <a href="javascript:void(0);" onclick="toggleDropdown()" class="profile-link">
                    <img src="{{ Auth::user()->profile_picture ? asset( Auth::user()->profile_picture) : asset('default.png') }}"
                        alt="Profile" width="60px" height="60px" style="border-radius: 100%;">
                </a>
                <div class="dropdown-content" id="dropdownContent">
                    <form method="GET" action="{{ route('logoutt') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                    <a href="{{ route('user.my-profile') }}">
                        <button type="submit" class="logout-btn">My Profile</button>
                    </a>
                    <br>
                    <a href="{{ route('user.checkout4') }}">
                        <button type="submit" class="logout-btn">Check Order</button>
                    </a>
                </div>
            </div>
            @else

            <a href="{{ route('user.loginn') }}" class="login-btn">Login</a>
            @endif

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

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdownContent');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }

        // Optional: Close dropdown if user clicks outside
        window.onclick = function(event) {
            if (!event.target.matches('.profile-link img')) {
                var dropdown = document.getElementById('dropdownContent');
                if (dropdown && dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }
    </script>

</div>
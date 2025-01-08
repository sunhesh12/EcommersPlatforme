@extends('layouts.main')

@section('content')
<div class="MainWrapper">
    <!-- =====================navigation bar======================= -->
    <div class="NavBarContainer">
        <div class="NavBarLogo">
            <h1>LAPTOP STORE</h1>
            <p>WORLD BEST COMPUTERS</p>
        </div>
        <div class="NavBar">
            <nav>
                <ul>
                    <a href="#">
                        <li>Home</li>
                    </a>
                    <a href="#">
                        <li>Serevice</li>
                    </a>
                    <a href="#">
                        <li>About</li>
                    </a>
                    <a href="#">
                        <li>Contact</li>
                    </a>
                    <li>
                        <!-- <img src="" alt="SearchIcon"> -->
                        <input placeholder="Search Product"><button>Search</button>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="authMain">
            <a href="#">
                <h1>Sign In</h1>
            </a>
            <h1>/</h1>
            <a href="#">
                <h1>Sign Up</h1>
            </a>
        </div>
    </div>
    <div class="Quicksearchwrapper">
    <button id="scrollLeft"><</button>
    <div class="quickSearch">

    <?php
        use App\Models\Brand;
        $brands = Brand::all(); 
    ?>
        @foreach ($brands as $brand)
            <div class="TextContent">
                <p>{{ $brand->brandName }}</p>
            </div>
        @endforeach
    </div>
    <button id="scrollRight">></button>
</div>

<!-- =============================content with cart======================= -->
<div class="CartWrapper">
<div class="cartContainer">
    @for ($i=0;$i<20;$i++)
    <div class="cart">
        <img src="laptop.png" alt="laptop image" />
        <div class="description">
            <p>ASUS Vivo book S 15 S5507 
            OLED Snapdragon X Plus X1P</p>
        </div>
    </div>
    @endfor

</div>
<!-- <div cla>

</div> -->

</div>
<!-- </div> -->

<script>
// Select elements
const quickSearch = document.querySelector('.quickSearch');
const scrollLeftButton = document.getElementById('scrollLeft');
const scrollRightButton = document.getElementById('scrollRight');

// Scroll amount (adjust as needed)
const scrollAmount = 100;

// Add event listeners
scrollLeftButton.addEventListener('click', () => {
    quickSearch.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
    });
});

scrollRightButton.addEventListener('click', () => {
    quickSearch.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
});

// JavaScript to handle mouseover and mouseout events for the cart
const carts = document.querySelectorAll('.cart');

carts.forEach(cart => {
    cart.addEventListener('mouseover', () => {
        // Change white background to blue
        cart.style.backgroundColor = 'var(--appblue)';
        // cart.style.border = 'var(--appwhite)';
        
        // Change blue description to white
        const description = cart.querySelector('.description');
        if (description) {
            description.style.backgroundColor = 'var(--appwhite)';
            description.style.color = 'var(--appblue)';
        }
    });

    cart.addEventListener('mouseout', () => {
        // Revert background color to white
        cart.style.backgroundColor = 'var(--appwhite)';
        // cart.style.border = 'var(--appblue)';
        
        // Revert description color to blue
        const description = cart.querySelector('.description');
        if (description) {
            description.style.backgroundColor = 'var(--appblue)';
            description.style.color = 'var(--appwhite)';
        }
    });
});


</script>

@endsection
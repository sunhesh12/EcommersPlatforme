<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body class="font-sans antialiased">
    <div class="mainLayout">
        <div class="navigations">
            <div class="navigationsTop">
                <p>Mon-Fri: <span>9:00 A.M. - 5.30 P.M. </span></p>
                <p>Visit our showroom in 1234 street Address City Address,1234 <span><u>Contact Us</u></span></p>
                <p>
                    <span>Call Us: (00) 1234 5678 </span>
                    <a href="#"><img src={{ asset('icon/facebookIcon.png') }}></a>
                    <a href="#"><img src={{ asset('icon/instagramIcon1.png') }}></a>
                </p>
            </div>
            <div class="navigationsBottom">

            </div>
        </div>
        <div>
            <main>
                @yield('content')
            </main>
        </div>

        <div class="footerContainer">
            <footer>
                <div class="footerTop">
                    <div class="footerTopLeft">
                        <!-- <p>© 2021 EcommersPlatforme</p> -->
                        <h1>Sign Up To Our Newsletter.</h1>
                        <p>Be the first th hear about the latest offers</p>
                    </div>
                    <div class="footerTopRight">
                        <input type="text" placeholder="Enter Your Email Address">
                        <button>Subscribe</button>
                    </div>
                </div>
                <div class="footerBottom">
                    <div class="footerBottomLeft">
                        <div class="footerBottomLeftLeft">

                            <ul>
                                <li>
                                    <p>Information</p>
                                </li>
                                <br>
                                <li>About Us</li>
                                <li>About Zip</li>
                                <li>Privacy Policy</li>
                                <li>Search</li>
                                <li>Terms & Conditions</li>
                                <li>Orders and Returns</li>
                                <li>Contact Us</li>
                                <li>Advance Search</li>
                                <li>Newsletter Subsciption</li>
                            </ul>
                        </div>
                        <div class="footerBottomLeftMiddle">
                            <ul>
                                <li>
                                    <p>Laptop Parts</p>
                                </li>
                                <br>
                                <li>CPUS</li>
                                <li>Add On Cards</li>
                                <li>Hard Drivers(internal)</li>
                                <li>Graphic Cards</li>
                                <li>Keyboards / Mice</li>
                                <li>Cases / Power Supplies / Cooling</li>
                                <li>Ram (Memory)</li>
                                <li>Software</li>
                                <li>Speakers / Headsets</li>
                                <li>Motherboards</li>
                            </ul>
                        </div>
                        <div class="footerBottomLeftRight">
                            <ul>
                                <li>
                                    <p>Laptop</p>
                                </li>
                                <br>
                                <li>Everyday Use Notebooks</li>
                                <li>MSI Workstation Series</li>
                                <li>MSI Prestige Series</li>
                                <li>Tables and Pads</li>
                                <li>Netbooks</li>
                                <li>Infinity Gaming Notebooks</li>
                            </ul>
                        </div>
                    </div>
                    <div claa="footerBottomRight">
                        <ul>
                            <li>
                                <p>Address</p>
                            </li>
                            <br>
                            <li>Address: 1234 Street Adress City Address, 1234</li>
                            <li>Phone: <span>(00) 1234 5678</span></li>
                            <li>We are open:Monday - Friday:9:00 A.M. - 5.30 P.M.</li>
                            <li>Saturday:11:00 A.M. - 5:00 P.M.</li>
                            <li>E-mail: <span>shop@email.com</span></li>
                        </ul>
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <div class="footerEnd">
                    <p>
                        <!-- <span>Call Us: (00) 1234 5678 </span> -->
                        <a href="#"><img src={{ asset('icon/facebookIcon.png') }}></a>
                        <a href="#"><img src={{ asset('icon/instagramIcon1.png') }}></a>
                    </p>
                    <p>Copyright © 2020 Shop Pty. Ltd.</p>
                </div>
                <!-- </div> -->
            </footer>
        </div>
    </div>
</body>

</html>
@extends('app.layouts.main')
@section('content')
<div class="navigation">
    <nav>
        <a href="#">Home</a> › <span>Contact Us</span>
    </nav>
</div>

<div class="contact-container">
    <div class="form-section">
        <h1>Contact Us</h1>
        <p>We love hearing from you, our Shop customers.</p>
        <p>Please contact us and we will make sure to get back to you as soon as we possibly can.</p>

        <form class="contact-form">
            <div class="input-group">
                <div class="input-field">
                    <label for="name">Your Name *</label>
                    <input type="text" id="name" placeholder="Your Name" required>
                </div>
                <div class="input-field">
                    <label for="email">Your Email *</label>
                    <input type="email" id="email" placeholder="Your Email" required>
                </div>
            </div>
            <div class="input-group">
                <div class="input-field"><label for="phone">Your Phone Number</label>
                    <input type="tel" id="phone" placeholder="Your Phone">
                </div>
                <div class="input-field"></div>
            </div>


            <label for="message">What's on your mind? *</label>
            <textarea id="message" placeholder="Jot us a note and we’ll get back to you as quickly as possible" required></textarea>

            <button type="submit" class="btn submit-btn">Submit</button>
        </form>
    </div>

    <div class="contact-info">
        <div class="info-box">
            <p><strong>Address:</strong><br>1234 Street Address City Address, 1234</p>
            <p><strong>Phone:</strong><br>(00) 1234 5678</p>
            <p><strong>We are open:</strong><br>
                Monday - Thursday: 9:00 AM - 5:30 PM<br>
                Friday: 9:00 AM - 6:00 PM<br>
                Saturday: 11:00 AM - 5:00 PM
            </p>
            <p><strong>E-mail:</strong><br><a href="mailto:shop@email.com">shop@email.com</a></p>
        </div>
    </div>
</div>

<style>
    .contact-container {
        display: flex;
        justify-content: space-between;
        gap: 2rem;
        align-items: flex-start;
        padding-left: 4rem;
        padding-right: 4rem;
        padding-bottom: 4rem;
    }

    .form-section {
        flex: 2;
    }

    .contact-form .input-group {
        display: flex;
        gap: 3rem;
    }

    .contact-form .input-field {
        flex: 1;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit-btn {
        background-color: #007bff;
        color: white;
        padding: 0.75rem 1.5rem;
        width: fit-content;
        border: none;
        border-radius: 40px;
        cursor: pointer;
    }

    .contact-info {
        flex: 1;
        background: #f8f8f8;
        padding: 1.5rem;
        border-radius: 5px;
    }
</style>
@stop
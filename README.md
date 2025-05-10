# 🛒 Secure E-Commerce Platform

A fully functional and secure custom-built E-Commerce platform developed with Laravel. This system is designed to offer a smooth user experience while enforcing robust security mechanisms to protect user data and platform integrity.



## 🚀 Features

- 🧾 **User Authentication**
  - Custom login system using `e_users` table.
  - Session-based authentication (no Laravel Breeze/Fortify).
  - Role-based redirection (`admin`, `customer`).
  
- 🛡️ **Security Implementations**
  - **Google reCAPTCHA v2** on login to prevent bot attacks.
  - **Failed Login Protection**: Account blocks after 5 failed attempts.
  - **Real-Time Attempt Feedback**: Shows remaining attempts before blocking.
  - **Email Alerts** on:
    - Password reset request
    - Account blocked due to suspicious attempts
  - **CSRF Protection** and **Validation Handling** in all forms.
  
- 👤 **User Management**
  - Registration, login, logout, profile editing
  - View order history
  - Password change functionality
  
- 🛍️ **Product Catalog**
  - Filter by brand and price range
  - Responsive design
  - Add to cart, remove, and quantity management
  
- ⚙️ **Admin Panel**
  - Manage brands, products, and categories
  - Dashboard with charts (optional)
  - View and unblock users
  
- 💌 **Email Integration**
  - Password reset links
  - Blocked account notifications

---


## 📸 Screenshots

(Add screenshots here of your login page, dashboard, product listing, etc.)

---

Login page

Dashboard

Product listing

Admin interface

Block message

## 📁 Project Structure (Main Modules)

/app
/Http/Controllers
AuthController.php
ProductController.php
AdminController.php
/resources/views
login.blade.php
dashboard.blade.php
home.blade.php
/routes
web.php

## 🛠️ Technologies Used

- Laravel 10.x
- PHP 8.x
- MySQL
- HTML5, CSS3, JavaScript
- Google reCAPTCHA
- Laravel Mail


## 🔐 Security Highlights

| Feature | Description |
|--------|-------------|
| reCAPTCHA | Stops bots from brute force login attempts |
| Block on 5 Failed Logins | Prevents further attempts after 5 failures |
| Email Alerts | Warns users about unauthorized activities |
| Session Control | Securely manages authenticated sessions |
| CSRF Protection | Prevents cross-site request forgery |
| Validation | Ensures correct input with meaningful error messages |

---

## 🧪 How to Test

1. Clone the repository.
2. Run `composer install` and set up your `.env` file.
3. Set up DB with `php artisan migrate`.
4. Generate app key: `php artisan key:generate`.
5. Serve: `php artisan serve`.
6. Visit `/login` to try features (block on 5 incorrect attempts, etc.).

✅ 7. Folder Structure (Optional)
Show basic layout:

bash
Copy
Edit
/app/Http/Controllers
/resources/views
/routes/web.php

✅ 8. Contribution (Optional)
If you want to allow others to contribute, add:

How to fork

PR guidelines

---

## 📧 Contact

**Developer**: Heshan Bandaranayake  
**Email**: [YourEmail@example.com]  
**GitHub**: [github.com/YourGitHub]  
**YouTube**: [Mr.SecretI CodeEdu](https://youtube.com/@Mr.SecretICodeEdu)

---

## 📄 License

MIT License © 2025 Heshan Bandaranayake
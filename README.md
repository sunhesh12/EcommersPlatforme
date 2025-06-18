# 🛒 Secure E-Commerce Platform

A fully functional and secure custom-built E-Commerce platform developed with Laravel. This system is designed to offer a smooth user experience while enforcing robust security mechanisms to protect user data and platform integrity.

---

## 🚀 Features

### 🔐 Authentication & Security

- Custom login system using `e_users` table
- Session-based authentication (without Breeze or Fortify)
- Role-based access control (`admin`, `customer`)
- Google reCAPTCHA v2 integration on login
- Account lock after 5 failed login attempts
- OTP-based payment verification
- CSRF protection in all forms
- Server-side validation for all inputs
- Email alerts on:
  - Password reset requests
  - Account blocks due to suspicious activity

### 👤 User Management

- Register, login, logout, edit profile
- Profile picture upload with validation
- Password change functionality
- View order history
- Email confirmation for blocked accounts

### 🛍️ Product Catalog & Cart

- Brand and price-range filtering
- Product listing with dynamic catalog updates
- Product detail pages
- Add to cart, remove, quantity management
- Session-based shopping cart

### 💳 Secure Checkout Flow

- 4-step checkout process with middleware protection:
  1. Delivery Info
  2. Cart Review
  3. Payment & OTP
  4. Order Summary
- Each step is enforced using Laravel middleware
- Encrypted card data using Laravel’s Crypt class

### ⚙️ Admin Dashboard

- Admin-only access using `is_admin` middleware
- Manage products, brands, categories
- View and unblock users
- User management system (block/unblock/delete)

### 💌 Email Integration

- Password reset via mail
- OTP delivery via mail
- Notification for failed attempts & account status

---

## 🧰 Built With

- Laravel 11
- PHP 8.x
- MySQL / MariaDB
- Blade Templating Engine
- Bootstrap 5
- Google reCAPTCHA
- Laravel Mail (SMTP)

---

## 🔐 Security Highlights

| Security Feature         | Description                                                  |
|--------------------------|--------------------------------------------------------------|
| Google reCAPTCHA         | Prevents bots from brute-force login attempts                |
| Login Attempt Limiter    | Account blocks after 5 failed attempts                       |
| OTP Verification         | Validates payments with 4-digit OTP via email               |
| Encrypted Card Info      | Credit card data encrypted using Laravel `Crypt`             |
| Role-Based Middleware    | Admin-only routes via `is_admin` custom middleware           |
| CSRF & Validation        | Prevents forgery and ensures valid form input                |
| Middleware Step Checks   | Checkout guarded step-by-step with session-based middleware  |

---

## 🧪 How to Test

1. Clone this repository  

```
   git clone https://github.com/your-team/ecommerce-secure-platform.git
   cd ecommerce-secure-platform
  ```

2. Install dependencies

  ```
   composer install
   npm install && npm run dev
  ```

3. Configure `.env` file

  ```
   cp .env.example .env
   php artisan key:generate
  ```

4. Run migrations

  ```
   php artisan migrate
  ```

5. Start server

  ```
   php artisan serve
  ```

6. Visit `/login` to test features:

   * Google reCAPTCHA v2
   * Block after 5 failed login attempts
   * OTP payment confirmation
   * Role-based admin protection

---

## 📂 Folder Structure

```plaintext
/app
  /Http/Controllers
    AuthController.php
    ProductController.php
    AdminController.php
  /Http/Middleware
    IsAdmin.php
    EnsureCheckoutStep1Completed.php
    ...
/resources/views
  login.blade.php
  dashboard.blade.php
  home.blade.php
/routes
  web.php
/bootstrap
  app.php  // middleware aliases
```

---

## 📸 Screenshots

*(You can paste screenshots here if you're using GitHub Markdown-supported image hosting.)*

* Login page
* Admin Dashboard
* Product Catalog
* Blocked User Message
* Checkout Steps

---

## 👥 Contributors

| Student ID | Name                      | Role             |
|------------|---------------------------|------------------|
| FC212001   | H.S.D. Bandaranayake      | Team Lead        |
| FC212002   | B.J.S. Nanayakkara        | Backend Developer|
| FC212042   | M.G.G.S. Hansika          | UI/UX Designer   |
| FC212027   | N.W.S. Shela              | Frontend Developer|
| FC212038   | N.F.M.A. Fernandopulle    | QA Engineer      |
| FC212045   | H.K.S. Peiris             | DevOps Engineer  |


---

## 🤝 Contribution Guidelines

We welcome contributions!

* Fork the repo
* Create your feature branch (`git checkout -b feature/NewFeature`)
* Commit your changes (`git commit -am 'Add new feature'`)
* Push to the branch (`git push origin feature/NewFeature`)
* Create a Pull Request

---

## 📧 Contact

**Developer**: Heshan Bandaranayake
**Email**: \[[you@example.com](mailto:you@example.com)]
**GitHub**: \[github.com/yourusername]
**YouTube**: [Mr.SecretI CodeEdu](https://youtube.com/@Mr.SecretICodeEdu)

---

## 📄 License

MIT License © 2025 Heshan Bandaranayake

```

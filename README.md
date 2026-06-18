# 🛍️ ClothesHub - Fashion E-Commerce Platform

<p align="center">
  <img src=".public/img/homepage.png" alt="ClothesHub Homepage" width="100%">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/PHP-8+-777BB4?style=for-the-badge&logo=php">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql">
  <img src="https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql">
  <img src="https://img.shields.io/badge=Bootstrap-5-purple?style=for-the-badge&logo=bootstrap">
  <img src="https://img.shields.io/badge/JavaScript-ES6-yellow?style=for-the-badge&logo=javascript">
</p>

---

## 📖 Overview

ClothesHub is a modern fashion e-commerce web application developed using **Laravel 12**. The platform allows customers to browse products, manage carts, place orders, and enjoy a seamless online shopping experience with a responsive user interface.

---

## 🌐 Live Demo

🔗 **Website:** https://your-live-link.com

---

## ✨ Features

### 👤 User Features
- User Registration & Login
- Product Browsing
- Category Filtering
- Product Details Page
- Shopping Cart
- Address Management
- Checkout Process
- Order Placement
- Order History
- Product Reviews
- Responsive Design

### 🛒 E-Commerce Features
- Dynamic Product Listing
- Category Management
- Brand Management
- Size & Price Variants
- Session-Based Cart
- Order Tracking

### 🔐 Authentication
- Secure Login
- User Profile Management
- Session Handling

---

# 🏗️ Tech Stack

## Backend
- Laravel 12
- PHP 8+
- MVC Architecture

## Frontend
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- jQuery

## Database
- MySQL
- PostgreSQL (Neon)

## Tools
- Composer
- Git
- GitHub
- VS Code
- DBeaver
- XAMPP

---

# 📂 Project Structure

```bash
ClothesHub
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── vendor/
├── .env
├── artisan
├── composer.json
└── README.md
```

---

# 📸 Screenshots

## Home Page

<p align="center">
  <img src="./screenshots/homepage.png" width="100%">
</p>

---

# 🗄️ Database Tables

- users
- categories
- brands
- products
- carts
- orders
- order_details
- users_address
- reviews
- prices
- sizes
- additional_informations
- sessions
- migrations

---

# ⚙️ Installation

### Clone Repository

```bash
git clone https://github.com/adityadhanraj12/clotheshub.git
cd clotheshub
```

### Install Dependencies

```bash
composer install
npm install
```

### Create Environment File

```bash
cp .env.example .env
```

Generate Application Key

```bash
php artisan key:generate
```

### Configure Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clotheshub
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations

```bash
php artisan migrate
```

### Start Server

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

---

# 🚀 Future Enhancements

- Payment Gateway Integration
- Wishlist Feature
- Search & Filtering
- Coupon System
- Email Notifications
- Admin Dashboard
- Analytics & Reports
- AI Product Recommendations

---

# 👨‍💻 Author

### Aditya Dhanraj

🎓 B.E. Computer Science Engineering  
Chandigarh University

🔗 GitHub  
https://github.com/adityadhanraj12

🔗 LinkedIn  
https://www.linkedin.com/in/aditya-dhanraj555

---

# 📜 License

This project is licensed under the MIT License.

---

⭐ If you found this project useful, please give it a star!
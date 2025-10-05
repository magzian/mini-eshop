# Mini Shop Lite

A full-stack e-commerce application built with Laravel demonstrating authentication, authorization, database modeling, REST APIs, and a clean Blade UI.

## Overview

Mini Shop Lite is a minimal e-commerce skeleton featuring:
- Admin product management
- Customer browsing and shopping cart
- Complete checkout process with stock validation
- RESTful API endpoints
- Session-based cart system

## Tech Stack

- **Framework:** Laravel 10.x
- **Authentication:** Laravel Breeze
- **Database:** MySQL
- **Frontend:** Blade Templates + Tailwind CSS


## Features

### Admin Features
- Product CRUD operations (Create, Read, Update, Delete)
- Stock management
- Price and description management
- Role-based access control

### Customer Features
- Browse product catalog
- View product details
- Add products to cart (session-based)
- Checkout process
- Order confirmation
- Stock validation during checkout

### API Features
- `GET /api/products` - Fetch all products (public)
- `POST /api/orders` - Create order (authenticated)
- JSON responses with proper HTTP status codes

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL
- Node.js & NPM

### Setup Steps

1. **Clone the repository**
```bash
git clone <repository-url>
cd <your-directory-name>
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_eshop
DB_USERNAME=root
DB_PASSWORD=your_password
```

5. **Create database**
```bash
mysql -u root -p -e "CREATE DATABASE mini_eshop;"
```

6. **Run migrations and seed data**
```bash
php artisan migrate
php artisan db:seed
```

7. **Build frontend assets**
```bash
npm run build
npm run run dev
```

8. **Start development server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## Default Credentials

### Admin Account
- Email: `admin@demo.com`
- Password: `password`

### Customer Account
- Email: `customer@demo.com`
- Password: `password`




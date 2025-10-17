# 🚀 Laravel Project Installation Guide

This document provides step-by-step instructions to install and run the Laravel project locally.

---

## 📋 Requirements

Before starting, make sure you have the following installed:

-   [PHP](https://www.php.net/) >= 8.2
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/)
-   [Git](https://git-scm.com/)

---

## ⚙️ Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/gbrn7/todo-list-backend
cd your-laravel-project
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Copy the Example Environment File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Environment

Open .env and set your database connection:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Database Setup

Run migrations:

```bash
php artisan migrate
```

### 7. Start the Application

Run migrations:

```bash
php artisan serve
```

# ✅ Todo List & Category Management

Welcome to the **Todo List & Category Management** documentation! This guide covers the features, routes, setup, and code structure for this Laravel application, following a modern, user-friendly approach.

---

## 📋 Task Requirements

For detailed requirements and evaluation criteria, see [TaskRequirements.md](./TaskRequirements.pdf).

> **Note:** The [`frontend`](./frontend) folder contains only HTML pages to be used for the task UI. You can use these as static templates or integrate them into your Laravel views as needed.

---


## 🎥 YouTube Video Tutorial

You can watch the full video explanation of this project on YouTube here:
👉 Watch the [TODOLIST Task Video](https://youtu.be/dwOZF8pBBRg) on YouTube

---

## 🧩 Features
- **User Authentication**: Login, registration, profile management.
- **Task Management**: Create, update, delete, restore, and permanently delete tasks.
- **Category Management**: Create, update, delete categories with custom colors and icons.
- **Filtering & Sorting**: Filter tasks by status, category, search, and sort by due date or status.
- **Dashboard**: View statistics for tasks and categories.
- **Soft Deletes**: Restore or permanently delete tasks.
- **Responsive UI**: Built with Tailwind CSS and Alpine.js.

---

## 🛣️ Web Routes

| **Method** | **Route**                        | **Controller Method**                | **Description**                          | **Access Control** |
|------------|-----------------------------------|--------------------------------------|------------------------------------------|-------------------|
| GET        | `/`                               | `Anonymous`                          | Welcome page                             | Public            |
| GET        | `/dashboard`                     | `DashboardController@index`           | Dashboard statistics                     | Authenticated     |
| GET        | `/tasks`                         | `TaskController@index`                | List/filter/sort tasks                   | Authenticated     |
| POST       | `/tasks`                         | `TaskController@store`                | Create a new task                        | Authenticated     |
| PUT/PATCH  | `/tasks/{task}`                  | `TaskController@update`               | Update a task                            | Authenticated     |
| DELETE     | `/tasks/{task}`                  | `TaskController@destroy`              | Soft delete a task                       | Authenticated     |
| POST       | `/tasks/{task}/restore`          | `TaskController@restore`              | Restore a soft-deleted task              | Authenticated     |
| DELETE     | `/tasks/{task}/force-delete`     | `TaskController@forceDelete`          | Permanently delete a task                | Authenticated     |
| GET        | `/categories`                    | `CategoryController@index`            | List categories                          | Authenticated     |
| POST       | `/categories`                    | `CategoryController@store`            | Create a new category                    | Authenticated     |
| PUT/PATCH  | `/categories/{category}`         | `CategoryController@update`           | Update a category                        | Authenticated     |
| DELETE     | `/categories/{category}`         | `CategoryController@destroy`          | Delete a category                        | Authenticated     |
| GET        | `/profile`                       | `ProfileController@edit`              | Edit user profile                        | Authenticated     |
| PATCH      | `/profile`                       | `ProfileController@update`            | Update user profile                      | Authenticated     |
| DELETE     | `/profile`                       | `ProfileController@destroy`           | Delete user account                      | Authenticated     |

---

## 🗂️ Project Structure
```
TODOLIST/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CategoryController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── TaskController.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Task.php
│   │   ├── User.php
│   ├── Policies/
│   ├── Providers/
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_09_04_131023_create_categories_table.php
│   │   ├── 2025_09_04_131045_create_tasks_table.php
│   ├── seeders/
│   │   ├── CategorySeeder.php
│   │   ├── TaskSeeder.php
│   │   ├── DatabaseSeeder.php
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── pages/
│   │   │   ├── tasks.blade.php
│   │   │   ├── categories.blade.php
├── routes/
│   ├── web.php
│   ├── auth.php
├── tests/
│   ├── Feature/
│   ├── Unit/
├── README.md
├── composer.json
├── package.json
├── phpunit.xml
└── ...
```
---

## 🛠️ Setup and Installation
To get started with this system, follow these installation steps:

### 1. Clone the repository:
```bash
git clone https://github.com/Abdogoda/Laravel-Interview-Tasks
cd Laravel-Interview-Tasks/TODOLIST
```

### 2. Install dependencies:
```bash
composer install
npm install
```

### 3. Set up the `.env` file:
Make sure you have the correct environment variables set in your `.env` file, especially the database connection.

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrate the database:
Run the migration commands to set up the necessary tables for users, categories, and tasks.

```bash
php artisan migrate --seed
```

### 5. Build frontend assets:
```bash
npm run build
```

### 6. Serve the application:
```bash
php artisan serve
```

---

## 🔧 Development Tools

- **Laravel 12**: PHP framework for building the application.
- **Tailwind CSS**: Utility-first CSS framework for UI.
- **Alpine.js**: Lightweight JS framework for interactivity.
- **Pest & PHPUnit**: For testing.
- **SQLite/MySQL**: Database support.

---

## 🔗 Connect & Follow  
- **GitHub:** [@Abdogoda](https://github.com/Abdogoda)  
- **YouTube:** [@Abdulrhman-Goda](https://www.youtube.com/@Abdulrhman-Goda)

This repository is **continuously updated** as new videos are released. **Star this repo** ⭐ to stay updated! 🚀  

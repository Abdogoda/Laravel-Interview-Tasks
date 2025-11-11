# 🧑‍💻 User Management and Role-Based Access Control (RBAC)

<img width="1280" height="720" alt="1_RBAC" src="https://github.com/user-attachments/assets/3661acf8-00c1-4dc1-99c5-8deb4d8b7634" />

Welcome to the **User Management and Role-Based Access Control (RBAC)** documentation! This guide will walk you through the implementation of RBAC in this Laravel application with code examples from routes, controllers, middleware, models, migrations, and tests.

---

## 📋 Task Requirements

For detailed requirements and evaluation criteria, see [TaskRequirements.md](./TaskRequirements.pdf).

---

## 🎥 YouTube Video Tutorial

You can watch the full video explanation of this project on YouTube here:
👉 Watch the [RBAC Task Video](https://youtu.be/D3jbaOZee7c?si=02UzDMmEigrlFy5) on YouTube

---

## 🧩 Features

-   **User Authentication**: Login, registration, and password reset functionality.
-   **Role Management**: Create, update, and assign roles to users.
-   **Permissions**: Fine-grained access control based on user roles.
-   **Middleware Protection**: Protect routes based on roles and permissions.
-   **API Endpoints**: Expose user and role management functionality through RESTful API endpoints.
-   **Tests**: Ensure that the application behaves correctly, such as checking if an admin can create roles.

---

## 🛣️ Api Endpoints

| **Method**            | **Route**          | **Controller Method**               | **Description**                                  | **Access Control**      |
| --------------------- | ------------------ | ----------------------------------- | ------------------------------------------------ | ----------------------- |
| POST                  | `/register`        | `AuthenticationController@register` | Register a new user                              | Public                  |
| POST                  | `/login`           | `AuthenticationController@login`    | Log in and generate an API token                 | Public                  |
| POST                  | `/logout`          | `AuthenticationController@logout`   | Log out and invalidate the current API token     | Authenticated (Sanctum) |
| GET                   | `/profile`         | `AuthenticationController@profile`  | Get the authenticated user's profile information | Authenticated (Sanctum) |
| GET                   | `/permissions`     | `PermissionController@index`        | List all available permissions                   | Authenticated (Sanctum) |
| **User Routes**       |                    |                                     | **Routes for user management**                   |                         |
| GET                   | `/users`           | `UserController@index`              | Get a list of all users                          | Authenticated (Sanctum) |
| POST                  | `/users`           | `UserController@store`              | Create a new user                                | Authenticated (Sanctum) |
| GET                   | `/users/{id}`      | `UserController@show`               | Get details of a specific user                   | Authenticated (Sanctum) |
| PUT/PATCH             | `/users/{id}`      | `UserController@update`             | Update a specific user                           | Authenticated (Sanctum) |
| DELETE                | `/users/{id}`      | `UserController@destroy`            | Delete a specific user                           | Authenticated (Sanctum) |
| **Role Routes**       |                    |                                     | **Routes for role management**                   |                         |
| GET                   | `/roles`           | `RoleController@index`              | List all roles                                   | Authenticated (Sanctum) |
| POST                  | `/roles`           | `RoleController@store`              | Create a new role                                | Authenticated (Sanctum) |
| GET                   | `/roles/{id}`      | `RoleController@show`               | Get details of a specific role                   | Authenticated (Sanctum) |
| PUT/PATCH             | `/roles/{id}`      | `RoleController@update`             | Update a specific role                           | Authenticated (Sanctum) |
| DELETE                | `/roles/{id}`      | `RoleController@destroy`            | Delete a specific role                           | Authenticated (Sanctum) |
| **Admin-Only Routes** |                    |                                     | **Routes only accessible by Admin users**        |                         |
| GET                   | `/admin/dashboard` | `Anonymous (admin check)`           | Get admin dashboard info                         | Admin Only              |
| **User-Only Routes**  |                    |                                     | **Routes only accessible by User role**          |                         |
| GET                   | `/user/dashboard`  | `Anonymous (user check)`            | Get user dashboard info                          | User Only               |

---

## 📚 API Documentation

You can import the Postman collection from the following path: [API Documentation (Postman JSON)](api-docs.json)

Or, you can view the published API documentation online here:  
[View API Docs on Postman Documenter](https://documenter.getpostman.com/view/46719116/2sB3BEoqb1)

This interactive documentation allows you to explore all endpoints, view request/response examples, and test API calls directly from your browser.

---

## 🗂️ Project Structure

```
RBAC/
├── app/
│   ├── Enums/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/V1/
│   │   │   │   ├── UserController.php
│   │   │   │   ├── AuthenticationController.php
│   │   │   │   ├── PermissionController.php
│   │   │   │   └── RoleController.php
│   │   ├── Middleware/
│   │   │   ├── HasAnyPermissionMiddleware.php
│   │   │   └── ...
│   ├── Models/
│   │   ├── User.php
│   │   ├── Role.php
│   │   ├── Permission.php
│   ├── Providers/
│   └── ...
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_08_10_210607_create_roles_table.php
│   │   ├── 2025_08_10_210613_create_permissions_table.php
│   │   ├── 2025_08_10_210732_create_role_user_table.php
│   │   ├── 2025_08_10_210750_create_permission_role_table.php
│   │   └── 2025_08_10_210800_create_permission_user_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── RolePermissionSeeder.php
│   │   └── ...
├── routes/
│   ├── api.php
│   ├── web.php
│   └── ...
├── tests/
│   ├── Feature/
│   │   ├── API/
│   │   │   ├── V1/
│   │   │   │   ├── UserTest.php
│   │   │   │   ├── RoleTest.php
│   │   │   │   └── ...
│   ├── Unit/
│   └── ...
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
git clone https://github.com/Abdogoda/Laravel-Interview-Tasks/RBAC
```

### 2. Install dependencies:

```bash
cd RBAC
composer install
```

### 3. Set up the `.env` file:

Make sure you have the correct environment variables set in your `.env` file, especially the database connection.

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrate the database:

Run the migration commands to set up the necessary tables for users, roles, and permissions.

```bash
php artisan migrate
```

### 5. Seed the database (optional):

You can seed the database with default roles and permissions.

```bash
php artisan db:seed
```

### 6. Serve the application:

```bash
php artisan serve
```

---

## 🔧 Development Tools

-   **Laravel 11+**: PHP framework for building the application.
-   **Laravel Sanctum**: Simple token-based authentication for APIs.
-   **SQLite**: Lightweight database used for easy setup.
-   **Postman**: For testing API endpoints.

---

## 🔗 Connect & Follow

-   **Gmail:** [abdogoda0a@gmail.com](mailto:abdogoda0a@gmail.com)
-   **GitHub:** [@Abdogoda](https://github.com/Abdogoda)
-   **YouTube:** [@Abdulrhman-Goda](https://www.youtube.com/@Abdulrhman-Goda)

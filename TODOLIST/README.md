
# Laravel Todo List Application

## Overview
This is a full-featured Todo List web application built with Laravel 12, featuring user authentication, task and category management, filtering, sorting, soft deletes, and a modern UI using Tailwind CSS and Alpine.js.

---

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Code Structure](#code-structure)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

---

## Features
- User authentication (login, registration, profile management)
- Create, update, delete, restore, and permanently delete tasks
- Categorize tasks with custom colors and icons (SVG/emoji)
- Filter and sort tasks by status, category, due date, and more
- Soft delete and restore for tasks
- Dashboard with statistics (total, completed, pending, overdue tasks, total categories)
- Responsive, modern UI with Tailwind CSS and Alpine.js

---

## Installation

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & npm

### Steps
1. **Clone the repository:**
	```bash
	git clone <your-repo-url>
	cd Laravel-Interview-Tasks/TODOLIST
	```
2. **Install PHP dependencies:**
	```bash
	composer install
	```
3. **Install JS dependencies:**
	```bash
	npm install
	```
4. **Copy environment file and set app key:**
	```bash
	cp .env.example .env
	php artisan key:generate
	```
5. **Configure your database in `.env`**
	(Default uses SQLite for testing)
6. **Run migrations and seeders:**
	```bash
	php artisan migrate --seed
	```
7. **Build frontend assets:**
	```bash
	npm run build
	```
8. **Start the development server:**
	```bash
	php artisan serve
	```

---

## Configuration
- **Database:** Edit `.env` to set your preferred database (MySQL, SQLite, etc.)
- **Mail, Cache, Queue:** Configure as needed in `config/` and `.env`
- **Frontend:** Tailwind CSS and Vite are used for asset compilation. See `tailwind.config.js` and `vite.config.js`.

---

## Usage
- Register/login to access the dashboard
- Add, edit, delete, restore, and permanently delete tasks
- Create and manage categories with custom colors and icons
- Filter and sort tasks using the UI controls
- View dashboard statistics

---

## Code Structure

### Models
- `User`: Authenticates users, relates to tasks
- `Task`: Belongs to a user and category, supports soft deletes, status, due date, color/icon helpers
- `Category`: Has many tasks, supports custom color/icon

### Controllers
- `DashboardController`: Shows dashboard stats
- `TaskController`: Handles CRUD, filtering, sorting, soft delete/restore for tasks
- `CategoryController`: Handles CRUD for categories, prevents deletion/update if tasks exist
- `ProfileController`: Manages user profile and account deletion

### Migrations
- `create_users_table`: User accounts
- `create_categories_table`: Categories with name, color, icon
- `create_tasks_table`: Tasks with title, description, status, due date, soft deletes

### Views
- `dashboard.blade.php`: Dashboard stats
- `pages/tasks.blade.php`: Task list, filters, modals for add/edit/delete/restore
- `pages/categories.blade.php`: Category list, modals for add/edit/delete

### Routes
- Defined in `routes/web.php`:
  - `/dashboard`: Dashboard
  - `/tasks`: Task CRUD, restore, force delete
  - `/categories`: Category CRUD
  - `/profile`: Profile management

---

## Testing
- Uses PHPUnit and Pest for testing
- Test suites in `tests/Unit` and `tests/Feature`
- Run tests:
  ```bash
  php artisan test
  ```

---

## Contributing
Contributions are welcome! Please follow Laravel's [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) and [contribution guide](https://laravel.com/docs/contributions).

---

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

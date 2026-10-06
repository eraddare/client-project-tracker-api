# Client Project Tracker API

## Overview

A simple RESTful API for managing client projects.

## Tech Stack

Backend:

* PHP 8.3
* Laravel

Database:

* MySQL

---

## Features

* View all projects
* View a single project
* Create a project
* Update a project
* Delete a project
* Input validation
* Error handling

---

## How to Run

### Install Dependencies

```bash
composer install
```

### Configure Environment

Copy `.env.example` to `.env` and configure the database:

```env
DB_DATABASE=project_tracker
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Database

Run migrations and seed the sample data:

```bash
php artisan migrate:fresh --seed
```

### Start the Application

```bash
php artisan serve
```

The API will be available at:

```text
http://127.0.0.1:8000/api
```

---

## API Endpoints

| Method | Endpoint             | Description       |
| ------ | -------------------- | ----------------- |
| GET    | `/api/projects`      | View all projects |
| GET    | `/api/projects/{id}` | View a project    |
| POST   | `/api/projects`      | Create a project  |
| PUT    | `/api/projects/{id}` | Update a project  |
| DELETE | `/api/projects/{id}` | Delete a project  |

---

## Validation

* Client name is required
* Project name is required
* Status must be valid
* Priority must be valid
* Due date cannot be earlier than start date

Invalid requests return `422 Unprocessable Entity`.

Non-existent projects return `404 Not Found`.

---

## Architecture

```text
Controller
    ↓
Form Request
    ↓
Service
    ↓
Repository
    ↓
Model
    ↓
MySQL
```

The application uses separate layers for request handling, validation, business logic, and database operations.

---

## AI Usage

AI tools were used for implementation assistance, debugging, code review, and documentation. The code was reviewed and manually tested before submission.

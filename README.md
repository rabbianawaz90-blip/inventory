# Product inventory
# Inventory Management API

A backend REST API built with Laravel, PHP, and MySQL to manage inventory products through structured API endpoints.

## Features

* Product CRUD operations (Create, Read, Update, Delete)
* Product data management using MySQL
* RESTful API endpoints
* Laravel MVC architecture
* Database migrations
* Organized backend code structure

## Tech Stack

* **Backend:** PHP, Laravel
* **Database:** MySQL
* **API:** REST
* **Tools:** Composer, Postman (if used)

## Getting Started

### Prerequisites

* PHP
* Composer
* MySQL
* Laravel-compatible local development environment

### Installation

1. Clone the repository:

   ```bash
   git clone YOUR_REPOSITORY_URL
   ```

2. Open the project directory:

   ```bash
   cd inventory
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   copy .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Create a MySQL database and configure the database settings in `.env`.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

## API Endpoints

| Method    | Endpoint             | Purpose                   |
| --------- | -------------------- | ------------------------- |
| GET       | `/api/products`      | Retrieve products         |
| POST      | `/api/products`      | Create a product          |
| GET       | `/api/products/{id}` | Retrieve a single product |
| PUT/PATCH | `/api/products/{id}` | Update a product          |
| DELETE    | `/api/products/{id}` | Delete a product          |

*Confirm these endpoints against your actual API routes before publishing.*

## Project Purpose

This project demonstrates backend development skills in Laravel, database integration, API design, and inventory data management.

## Author

**Rabbia Nawaz**

Aspiring PHP & Laravel Backend Developer

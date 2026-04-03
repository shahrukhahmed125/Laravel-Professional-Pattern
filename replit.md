# Laravel 12 Clean Architecture Demo

## Overview
A Laravel 12 web application demonstrating Clean Architecture using Service and Repository Patterns. Features a project management CRUD interface.

## Tech Stack
- **Language:** PHP 8.2
- **Framework:** Laravel 12
- **Frontend:** Blade templates + Tailwind CSS 4 + Vite 7
- **Database:** SQLite (development)
- **Build Tool:** Vite with laravel-vite-plugin

## Architecture (Clean Architecture)
- **Controllers** (`app/Http/Controllers/`) - HTTP request/response only
- **Services** (`app/Services/`) - Business logic layer
- **Repositories** (`app/Repositories/Interfaces/`) - Interface contracts
- **Repository Implementations** (`app/Repositories/Eloquent/`) - Eloquent ORM implementations
- **Models** (`app/Models/`) - Eloquent models
- **Form Requests** (`app/Http/Requests/`) - Input validation

## Project Structure
- `app/` - Application code (Controllers, Services, Repositories, Models)
- `resources/views/` - Blade templates
- `routes/web.php` - Route definitions
- `database/` - Migrations and SQLite database
- `public/` - Web root, compiled assets
- `vite.config.js` - Vite build configuration

## Running the App
```bash
bash start.sh
```
This starts the Laravel development server on port 5000.

## Setup Steps (already done)
1. `composer install` - Install PHP dependencies
2. `npm install` - Install Node.js dependencies
3. `npm run build` - Build frontend assets
4. `php artisan key:generate` - Generate app key
5. `php artisan migrate` - Run database migrations

## Key Files
- `start.sh` - Startup script for the application
- `.env` - Environment configuration (SQLite, file sessions, file cache)
- `vite.config.js` - Vite configuration with host `0.0.0.0` for Replit proxy

## Environment Configuration
- **DB:** SQLite at `database/database.sqlite`
- **Sessions:** File-based
- **Cache:** File-based
- **Queue:** Synchronous
- **Server Port:** 5000

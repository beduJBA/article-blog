# Article Blog

A complete blog built with Laravel 12 — a tutorial project for learning Laravel from scratch.

## Features

- User authentication (register, login, logout, email verification, password reset, profile) powered by Laravel Breeze
- Public article listing with pagination and article detail pages using SEO-friendly slug URLs
- Full CRUD for articles, restricted to authenticated users
- Cover image upload (png/jpg/jpeg/webp, up to 5MB) with deletion on update or removal
- Clean Blade layouts styled with Tailwind CSS and Alpine.js components
- Pest feature tests covering the auth flows
- Database seeder that produces 20 factory-generated articles

## Requirements

- PHP 8.2+
- Composer
- Node.js and npm
- MySQL

## Installation

1. Clone the repository and enter the directory.
2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Copy the environment file and fill in your database credentials:

   ```bash
   cp .env.example .env
   ```

   Set the `DB_*` variables (database name: `article_blog`).

4. Generate an application key:

   ```bash
   php artisan key:generate
   ```

5. Run the migrations and seed the database:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Link storage so uploaded cover images are publicly accessible:

   ```bash
   php artisan storage:link
   ```

7. Install and build the frontend assets:

   ```bash
   npm install
   npm run build
   ```

You can also run `composer setup`, which performs steps 2, 3, 4, 5 (migrate only) and 7 automatically. Run `php artisan db:seed` and `php artisan storage:link` afterwards.

## Local development

Start the app, queue worker, log tail, and Vite dev server concurrently:

```bash
composer dev
```

Your app will be available at `http://localhost:8000`.

## Testing

```bash
composer test
```

## Project structure

- `routes/web.php` — public article routes plus auth-protected CRUD, created from `ArticleController`
- `routes/auth.php` — Breeze authentication routes
- `app/Models` — `Article` (belongs to a `User`) and `User`
- `app/Http/Controllers/ArticleController.php` — article list, CRUD, and image handling
- `database/migrations` — users, cache, jobs, and articles tables
- `database/factories` — `ArticleFactory` and `UserFactory`
- `database/seeders` — `ArticleSeeder` creates 20 articles
- `resources/views` — Blade views and reusable components

## Contributing

This is a tutorial project, welcome to learning and tinkering. If you want to contribute, fork the repository, create a branch for your changes, and open a pull request.

## License

This project is open-sourced under the MIT license.
# CapBay Auto

This README will guide you through setting up and running the CapBay Auto Laravel project locally. It also explains how to configure your database connection and why the `.env` file is not in the repository.

---

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- **PHP** (>= 8.0)
- **Composer** (for PHP dependencies)
- **Node.js & NPM** (for frontend assets)
- **MySQL** (or another supported database)
- **Git** (to clone the repository)

---

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/capbay-auto.git
   cd capbay-auto
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Copy the environment file**

   The `.env` file contains sensitive credentials (database, mail, etc.) and is excluded from version control. To create your local copy:

   ```bash
   cp .env.example .env
   ```

4. **Generate an application key**

   Laravel requires an application key, which is used for encryption:

   ```bash
   php artisan key:generate
   ```

5. **Configure your database**

   Open the newly created `.env` and update the following lines with your database credentials:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password
   ```

6. **Run migrations & seeders**

   This will create all tables and populate initial data:

   ```bash
   php artisan migrate --seed
   ```

7. **Install JavaScript dependencies**

   ```bash
   npm install
   ```

8. **Compile frontend assets**

   For development with hot-reload:
   ```bash
   npm run dev
   ```

   For a production‐ready build:
   ```bash
   npm run build
   ```

9. **Serve the application**

   ```bash
   php artisan serve
   ```

   Your app will be available at `http://localhost:8000`.

---

## Troubleshooting

- **Missing `.env`?**
  - Always copy from `.env.example`. Never commit your own `.env` with real credentials.

- **Database connection errors**
  - Double‑check `DB_HOST`, `DB_PORT`, and credentials in `.env`. Make sure the database exists and your user has access.

- **Tailwind/Vite not loading**
  - Ensure you have run `npm run dev` (for development) or `npm run build` (for production) and that `@vite` is configured in your Blade layouts.

---

## Useful Artisan Commands

- **Clear caches**:  `php artisan optimize:clear`
- **Run specific migration**:  `php artisan migrate --path=/database/migrations/2025_XX_XX_xxxx_create_appointments_table.php`
- **Rollback last migration**:  `php artisan migrate:rollback`

---

## Main Routes

| URI             | Method | Description                                          |
|-----------------|--------|------------------------------------------------------|
| `/`             | GET    | Public homepage – browse available cars & book a test drive. |
| `/admin/login`  | GET    | Admin login page – for sales agents to access the dashboard. |

## License

This project is licensed under MIT. See the [LICENSE](LICENSE) file for details.

Enjoy building with CapBay Auto!


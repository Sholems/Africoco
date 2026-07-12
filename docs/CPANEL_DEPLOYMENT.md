# cPanel Deployment Checklist

Use this checklist when deploying AFRICOCO to shared hosting through cPanel.

Recommended workflow: push the project to GitHub, then deploy/pull updates from cPanel's **Git Version Control** tool. This keeps future fixes and content/admin changes easier to track.

## 1. Server Requirements

- PHP 8.2 or newer, preferably PHP 8.3.
- MySQL or MariaDB database.
- PHP extensions commonly required by Laravel: `ctype`, `curl`, `dom`, `fileinfo`, `filter`, `hash`, `mbstring`, `openssl`, `pdo`, `pdo_mysql`, `session`, `tokenizer`, `xml`.
- Composer available either locally before upload or through cPanel Terminal.

## 2. GitHub First-Time Setup

This local folder is not a Git repository until you initialize it.

From the project root on your computer:

```bash
git init
git add .
git commit -m "Initial AFRICOCO deployment build"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
git push -u origin main
```

Before pushing, confirm `.env`, `.env.preview`, `vendor/`, and `node_modules/` are not committed.

For this cPanel workflow, `public/build` should be committed. That lets cPanel deploy compiled CSS/JS without needing Node.js on the server.

## 3. cPanel Git Deployment Layout

Preferred layout:

- Clone the GitHub repository outside `public_html`, for example:
  `/home/CPANEL_USER/africoco`
- Point the domain document root to:
  `/home/CPANEL_USER/africoco/public`

In cPanel:

1. Open **Git Version Control**.
2. Click **Create**.
3. Enter the GitHub repository URL.
4. Set clone path to `/home/CPANEL_USER/africoco`.
5. Set the domain document root to `/home/CPANEL_USER/africoco/public` if your hosting plan allows it.

If cPanel does not allow changing the document root, keep `public_html` as the web root and copy the contents of Laravel's `public` folder into `public_html`, then update `public_html/index.php` paths to point to the app directory. The cleaner option is to ask the host to point the domain document root to the repository's `public` folder.

## 4. Production `.env`

Create `.env` on the server. Do not upload `.env.preview`.

Minimum production values:

```dotenv
APP_NAME=AFRICOCO
APP_ENV=production
APP_KEY=base64:REPLACE_WITH_GENERATED_KEY
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cpanel_database_name
DB_USERNAME=cpanel_database_user
DB_PASSWORD=strong_password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Generate `APP_KEY` once:

```bash
php artisan key:generate --force
```

## 5. Build Assets

Build assets locally before pushing to GitHub:

```bash
npm install
npm run build
git add public/build
git commit -m "Build production assets"
git push
```

The generated `public/build` directory is intentionally tracked for cPanel deployment.

## 6. Install And Prepare

Run these from the project root on the server:

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan db:seed --class=RoleSeeder --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

If `storage:link` is blocked on cPanel, create the symlink in cPanel Terminal or use cPanel File Manager's symlink support if available.

## 7. Pulling Future Updates From GitHub

For normal updates:

```bash
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

If frontend files changed, build locally and push the updated `public/build` files:

```bash
npm install
npm run build
git add public/build
git commit -m "Build frontend assets"
git push
```

Then cPanel only needs `git pull`.

## 8. Admin Account

Do not use preview credentials in production.

Create a real admin user after deployment and assign the `Super Admin` role. The local preview account currently is:

```text
aagunkefest@gmail.com
```

Use a strong production password and change it after first login.

## 9. Launch Checks

- Confirm `/admin/login` loads.
- Confirm public registration is unavailable.
- Confirm donation pages are hidden until payment processing is ready.
- Confirm contact, volunteer, newsletter, and event registration forms submit.
- Confirm uploaded media writes to `storage/app/public`.
- Confirm `APP_DEBUG=false` before sharing the domain.

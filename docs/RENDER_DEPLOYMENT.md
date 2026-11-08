# Render Deployment Guide: Triventa Apparel Sourcing

This guide provides instructions for deploying this Laravel 12/13 application to [Render](https://render.com) using Docker and an external MySQL database for client demonstrations.

---

## 1. Architecture Overview

- **Runtime**: Docker multi-stage build.
- **Frontend Build**: Node.js 22 Alpine runs Vite 8.0 with Tailwind CSS v4, bundling CSS and JS directly into `/public/build`.
- **Backend Runtime**: `php:8.3-fpm-alpine` + Nginx managed by Supervisor.
- **Web Server**: Nginx listening on Render's dynamic `0.0.0.0:${PORT}` and proxying PHP requests to PHP-FPM on `127.0.0.1:9000`.
- **Database**: External MySQL over standard TCP 3306 (Hostinger MySQL, TiDB Serverless, Clever Cloud, etc.).
- **Health Check**: Native Laravel `/up` route checked by Render's health prober.
- **Logging**: Configured via `LOG_CHANNEL=stderr` so application errors and notices appear in the Render Dashboard logs.

---

## 2. Step 1: Prepare Your External MySQL Database

Render's free hosting tier does **not** include managed MySQL (it only offers PostgreSQL). You can use any external MySQL 8.0 instance:

### Option A: Your Existing Hostinger MySQL
1. Log into your Hostinger hPanel.
2. Go to **Databases > Remote MySQL**.
3. Allow remote connections (either set IP to `%` to allow all external connections or specify Render's outbound IP ranges).
4. Note your database credentials:
   - Host: e.g. `sql123.hostinger.com` (or your server IP)
   - Port: `3306`
   - Database name: e.g. `u123456789_triventa`
   - Username: e.g. `u123456789_admin`
   - Password: `your-secure-password`

### Option B: TiDB Cloud Serverless (Free Cloud MySQL)
1. Sign up at [tidbcloud.com](https://tidbcloud.com) (free 5GB forever tier, no credit card required).
2. Create a **Serverless** cluster.
3. Note the provided MySQL Host, Port (`4000`), Database, User, and Password.

---

## 3. Step 2: Push Your Code to GitHub

Once you review and approve these deployment files:
```bash
git add Dockerfile .dockerignore render.yaml .env.render.example docker/ bootstrap/app.php docs/
git commit -m "feat(deploy): configure Docker, Nginx, and Render deployment with external MySQL"
git push origin main
```

---

## 4. Step 3: Create Web Service on Render

1. Log into [dashboard.render.com](https://dashboard.render.com).
2. Click **New +** and select **Web Service**.
3. Connect your GitHub repository (`Trivant`).
4. Fill in the deployment details:
   - **Name**: `triventa-apparel` (or your chosen name)
   - **Region**: Choose the region closest to your clients (e.g. Frankfurt, Singapore, Oregon).
   - **Branch**: `main`
   - **Root Directory**: *(leave blank)*
   - **Runtime**: **Docker**
   - **Instance Type**: **Free**

---

## 5. Step 4: Configure Environment Variables in Render

In your Render Web Service dashboard, navigate to **Environment** > **Environment Variables** and add the following keys:

| Environment Variable | Recommended Value | Description |
| :--- | :--- | :--- |
| `APP_NAME` | `Triventa Apparel Sourcing` | Brand name |
| `APP_ENV` | `production` | Production environment mode |
| `APP_DEBUG` | `false` | Disables stack traces for client demonstration |
| `APP_KEY` | `base64:...` *(Generate with `php artisan key:generate --show`)* | 32-character AES encryption key |
| `APP_URL` | `https://your-service-name.onrender.com` | Your live Render HTTPS URL |
| `LOG_CHANNEL` | `stderr` | Routes Laravel errors to Render's live log window |
| `LOG_LEVEL` | `info` | Minimum log severity level |
| `DB_CONNECTION` | `mysql` | MySQL database driver |
| `DB_HOST` | *(Your external MySQL host)* | Hostname or IP of your MySQL server |
| `DB_PORT` | `3306` *(or `4000` for TiDB)* | Database port |
| `DB_DATABASE` | *(Your database name)* | Database name |
| `DB_USERNAME` | *(Your database username)* | Database user |
| `DB_PASSWORD` | *(Your database password)* | Database password |
| `SESSION_DRIVER` | `database` *(or `cookie`)* | Session handler |
| `CACHE_STORE` | `database` *(or `file`)* | Application cache |
| `FILESYSTEM_DISK` | `public` | Storage disk |
| `RUN_MIGRATIONS` | `true` | Automatically executes `php artisan migrate --force` on startup |

---

## 6. Step 5: Configure Health Check Path

1. In your Render Web Service dashboard, go to **Settings**.
2. Scroll to **Health Check Path**.
3. Enter: `/up`
4. Click **Save Changes**.

Render will periodically poll `/up` to verify the container is healthy and responding.

---

## 7. Step 6: Trigger Deploy & Verify

1. Click **Manual Deploy** > **Deploy latest commit** (or let it auto-deploy from `main`).
2. Watch the build logs:
   - Node.js stage installs dependencies and compiles Vite assets into `public/build`.
   - PHP 8.3 stage installs extensions (`pdo_mysql`, `mbstring`, `zip`, `intl`, `gd`, `opcache`).
   - Composer installs production packages with autoloader optimization.
   - Container boots, configures `$PORT`, creates storage link, and launches Nginx + PHP-FPM via Supervisor.
3. Once the build finishes and shows **Live**, open your public URL (`https://your-service-name.onrender.com`).
4. Test all navigation links:
   - `/` (Home)
   - `/about`
   - `/services`
   - `/products`
   - `/process`
   - `/compliance`
   - `/sustainability`
   - `/contact`
   - `/up` (Health check endpoint)

---

## 8. Ephemeral Storage Note (Free Tier Consideration)

Render's free web services run on ephemeral containers:
- Any file uploaded directly to local disk will disappear when the container spins down or redeploys.
- All current logos, brand images, and UI assets are bundled inside `public/images/` and `public/build/` and are permanent in the image.
- When dynamic client file uploads (e.g. Spatie Media Library) are implemented in later milestones, configure an external S3-compatible bucket (such as AWS S3 or Cloudflare R2's free 10GB tier) by setting `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_BUCKET`, `AWS_DEFAULT_REGION`, and `FILESYSTEM_DISK=s3`.


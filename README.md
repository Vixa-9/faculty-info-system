# Faculty Information Management System : Tien Giang University

Website and content management system for the **Faculty of Engineering & Technology (Khoa Kỹ thuật Công nghệ)** at Tien Giang University (TGU), Vietnam.

---

## Stack

| Layer     | Technology         |
| --------- | ------------------ |
| Backend   | Laravel 8 (PHP 8+) |
| Admin UI  | AdminLTE 3         |
| Rich text | CKEditor 4         |
| Database  | MySQL              |
| Charts    | Chart.js 3         |

---

## Local Installation

```bash
# 1. Install PHP dependencies
composer install

# 2. Configure environment
cp .env.example .env
# Edit .env: set DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 3. Generate app key
php artisan key:generate

# 4. Run migrations and seeders
php artisan migrate --seed

# 5. Start local server
php artisan serve
```

Admin panel: `http://localhost:8000/admin`

> **MAMP users:** set `DB_HOST=127.0.0.1` and `DB_PORT=3306` in `.env`.

---

## Branch Structure

| Branch | Purpose                            |
| ------ | ---------------------------------- |
| `main` | Stable : production-ready releases |
| `dev`  | Active development                 |

---

## Features

- **Articles** : CRUD with CKEditor, image upload, category (menu) assignment
- **News** : CRUD with publication date, active/inactive toggle, public listing
- **Slides** : Homepage carousel management (image, title, link)
- **Menus** : Navigation menu management
- **Analytics** : Page view tracking dashboard (visits/day, top pages, last 14 days chart)
- **Config** : Site-wide settings

---

## Context

Internship project — ISEN Brest x Tien Giang University, 2026.

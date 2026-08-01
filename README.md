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

# 4. Run migrations
php artisan migrate

# 5. Seed all data
php artisan db:seed --class=FacultyInfoSeeder
php artisan db:seed --class=LecturerSeeder
php artisan db:seed --class=DepartmentSeeder
php artisan db:seed --class=ResearchActivitySeeder
php artisan db:seed --class=StudentProjectSeeder

# 6. Start local server
php artisan serve
```

Admin panel: `http://localhost:8000/admin`  
Default credentials: set in `database/seeders/DatabaseSeeder.php`

> **MAMP users:** set `DB_HOST=127.0.0.1` and `DB_PORT=3306` in `.env`.

---

## Branch Structure

| Branch   | Purpose                            |
| -------- | ---------------------------------- |
| `main`   | Stable : production-ready releases |
| `phase2` | Active development (current)       |
| `dev`    | General development                |

---

## Features

### Phase 1

- **Articles** : CRUD with CKEditor, image upload, category assignment
- **News** : CRUD with publication date, active/inactive toggle, public listing
- **Slides** : Homepage carousel management (image, title, link)
- **Menus** : Navigation menu management
- **Analytics** : Page view tracking dashboard (visits/day, top pages, last 14 days chart)
- **Config** : Site-wide settings

### Phase 2

- **Faculty Information** : Editable rich-text sections: Introduction, Vision, Mission, History, Org Structure, Office Info. Public page: `/about`
- **Lecturer Management** : Full CRUD with photo upload, department assignment. Public listing grouped by department: `/lecturers`
- **Department Management** : 5 fixed departments (edit only). Rich-text fields: Introduction, Training Programs, Research Activities, Contact. Public pages: `/departments`, `/departments/{slug}`
- **Research Activities** : Full CRUD with type filter (Research Project, Publication, Conference, Workshop, Award), image upload, department tag. Public listing with type tabs: `/research`
- **Student Projects** : Full CRUD with image upload, award field, year/department filters. Public showcase: `/student-projects`
- **Bilingual Support (EN/VI)** : Language switcher in navbar, all UI labels translated via `resources/lang/{en,vi}/site.php`. DB content untouched.
- **Homepage Improvements** : Dynamic sections: Faculty Introduction, Our Departments, Latest News, Featured Research, Student Projects showcase, Quick Links
- **Navbar Restructuring** : Hardcoded bilingual navbar replacing dynamic DB-driven menu

---

## Public Navbar Structure

```
Home
About ▾
  └ About the Faculty      → /about
  └ Faculty Office         → /departments/faculty-office
  └ Departments            → /departments
  └ Lecturer Profiles      → /lecturers
Education ▾
  └ Training Programs      → /dccthp
Admissions ▾
  └ Admission Information  → (external)
Research ▾
  └ Research Activities    → /research
Quy trình - Biểu mẫu      → https://tgu.edu.vn/topic/?13398 (new tab)
Student Projects           → /student-projects
News ▾
  └ News                   → /news
  └ Announcements          → (external)
Contact                    → contact.html
```

---

## Admin Sidebar

Analytics · Faculty Info · Lecturers · Departments · Research Activities · Student Projects · News Management · Article Management · Slide Management · File Upload · Contact Management

---

## Context

Internship project : ISEN Brest × Tien Giang University, 2026.

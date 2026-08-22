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

| Branch    | Purpose                            |
| --------- | ---------------------------------- |
| `main`    | Stable : production-ready releases |
| `phase3`  | Active development (current)       |
| `phase2`  | Phase 2 complete                   |
| `dev`     | General development                |

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

### Phase 3

- **Bug Fixes** : 4 bugs resolved — white text on white background (news pages), missing inline validation (`@error` / `is-invalid`) on news forms, `old()` fallback missing on edit form, route typo `/admin/files/lis` → `list`
- **Responsive UI** : 5 issues fixed — EN/VI switcher hidden on mobile, navbar overflow on iPad/small desktop (icon-only auth buttons, reduced padding/font, removed non-functional search box), admin tables wrapped in `table-responsive`, CKEditor content blocks `overflow-x:auto`, research flex layout `min-width:0`
- **Contact Page** : New public page `/contact` — editable via admin Faculty Info panel (address, email, phone, office location, IT department contact). Google Maps embed. Bilingual labels.
- **Performance Optimizations** : `config:cache`, `route:cache`, `view:cache` enabled. DB indexes added on `page_views.visited_at`, `news.active`/`published_at`, `research_activities.type`, `student_projects.department`/`year`.
- **Security Improvements** : `SecurityHeaders` middleware (X-Frame-Options, X-Content-Type-Options, X-XSS-Protection, Referrer-Policy). Full CSRF audit — all POST forms verified. Escaping audit — all `{!! !!}` usage justified.
- **Enhanced Analytics Dashboard** : Today / this week / this month counters. Line chart (30 days). Pie chart by section (Home, News, Research, Departments, Lecturers, Student Projects, About, Other). Top 10 pages table. `/language/*` excluded from tracking.
- **UAT** : 19/19 scenarios passed across 3 user profiles (Faculty Office Staff, Lecturer, Student).

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
Procedures & Forms         → https://tgu.edu.vn/topic/?13398 (new tab)
Student Projects           → /student-projects
News ▾
  └ News                   → /news
  └ Announcements          → (external)
Contact                    → /contact
```

---

## Admin Sidebar

Analytics · Faculty Info · Lecturers · Departments · Research Activities · Student Projects · News Management · Article Management · Slide Management · File Upload Management

---

## Reports

| File                          | Content                                              |
| ----------------------------- | ---------------------------------------------------- |
| `PHASE2_REPORT.md`            | Full Phase 2 development report                      |
| `PHASE3_REPORT.md`            | Full Phase 3 development report                      |
| `PHASE3_AUDIT_REPORT.md`      | Bug audit findings and fixes                         |
| `PHASE3_RESPONSIVE_REPORT.md` | Responsive design audit and fixes                    |
| `PHASE3_PERF_SECURITY_REPORT.md` | Performance and security review                   |
| `UAT_REPORT.md`               | User Acceptance Testing results (19/19 passed)       |

---

## Context

Internship project : ISEN Brest × Tien Giang University, 2026.

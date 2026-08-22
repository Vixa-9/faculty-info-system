# Phase 3 : Complete Development Report

**Branch:** `phase3` | **Period:** August 2026

---

## Summary

Phase 3 delivered a full quality pass over the Phase 2 codebase: bug fixes, responsive design corrections, a new Contact page, performance optimizations, security hardening, analytics improvements, and a full UAT run (19/19 passed).

---

## 1. Bug Fixes

### BUG-01 : White text on white background: `news/show.blade.php`

**Severity:** High  
**Root cause:** Global CSS in `header.blade.php` sets `body { color: var(--white) }`. The `.bg-white border p-4` container had no color override.  
**Fix:** Added `style="color:#333;"` to the outer content container.

### BUG-02 : White text on white background: `news/index.blade.php`

**Severity:** High  
**Root cause:** Same global CSS issue. The `.bg-white border border-top-0 p-4` card body had no color override.  
**Fix:** Added `style="color:#333;"` to the card body div.

### BUG-03 : No inline validation errors: `admin/news/create.blade.php`

**Severity:** Medium  
**Root cause:** `title`, `summary`, `content` fields had no `@error` / `is-invalid` / `invalid-feedback` : Phase 1 view never updated.  
**Fix:** Added `@error('field') is-invalid @enderror` on each input, and `<div class="invalid-feedback">{{ $message }}</div>` below each.

### BUG-04 : No inline validation + missing `old()`: `admin/news/edit.blade.php`

**Severity:** Medium  
**Root cause:** Same as BUG-03. Additionally, `title` and `summary` lost user input on validation failure (no `old()` fallback).  
**Fix:** Added `@error` / `is-invalid` / `invalid-feedback`. Changed `value="{{ $news->title }}"` → `value="{{ old('title', $news->title) }}"` and same for `summary`.

### Additional minor fixes

| Item                                                    | Fix                                                                                         |
| ------------------------------------------------------- | ------------------------------------------------------------------------------------------- |
| Route typo `/admin/files/lis`                           | Fixed to `list`                                                                             |
| Sidebar link `/admin/files/outline`                     | Fixed to `/admin/files/list`                                                                |
| News image upload label "8 MB"                          | Changed to "2 MB" (matches controller validation)                                           |
| JS file size check `8 * 1024 * 1024`                    | Changed to `2 * 1024 * 1024`                                                                |
| Admin table pagination row numbers resetting on page 2+ | Fixed with `($paginator->currentPage() - 1) * $paginator->perPage() + $key + 1` on 4 tables |
| `contact.html` navbar link (static file, 404)           | Replaced with `/contact` route                                                              |
| `head.blade.php` `$title` undefined on contact page     | Added `{{ $title ?? 'Faculty of Engineering & Technology : TGU' }}`                         |

---

## 2. Responsive Design Improvements

### RESP-01 : EN/VI switcher hidden on mobile

**File:** `header.blade.php`  
**Fix:** Added `.nav-lang-mobile` outside the collapse div (between brand and toggler). Desktop `.nav-lang-desktop` shown/hidden via CSS at 1200px breakpoint.

### RESP-02 : Navbar overflow on iPad (1366px) and small desktops

**File:** `header.blade.php`  
**Space freed:**

| Fix                                                                 | Space saved |
| ------------------------------------------------------------------- | ----------- |
| Removed non-functional search box                                   | ~190px      |
| Auth buttons → icon-only with `title` tooltip                       | ~140px      |
| Nav padding: `px-xl-5` → `px-xl-3`                                  | ~64px       |
| Nav link font: `0.82rem` → `0.78rem`, padding `0.55rem` → `0.45rem` | ~70px       |

**Total: ~240px freed.** Breakpoint: `navbar-expand-xl` (collapse at < 1200px).

### RESP-03 : Admin tables overflow on mobile

**Files:** research, student-projects, lecturers, departments, news admin index views.  
**Fix:** Wrapped each `<table>` in `<div class="table-responsive">`.

### RESP-04 : CKEditor content blocks overflow on mobile

**Files:** `faculty/about.blade.php`, `faculty/departments/show.blade.php`, `news/show.blade.php`  
**Fix:** Added `overflow-x:auto;` to all CKEditor wrapper divs.

### RESP-05 : Research item text overflow on narrow screens

**File:** `faculty/research.blade.php`  
**Fix:** Added `min-width:0; overflow-wrap:break-word;` to the flex text container.

---

## 3. Contact Page

New public route: `GET /contact` → `ContactController@index`

**Features:**

- Faculty Office card: address, phone, email, office location
- IT Department card: phone, email
- Google Maps embed (TGU campus)
- Bilingual labels via `__('site.contact_*')`
- All fields editable in admin under Faculty Info → Contact Information section

**Files created/modified:**

| File                                                   | Type                                        |
| ------------------------------------------------------ | ------------------------------------------- |
| `app/Http/Controllers/ContactController.php`           | Created                                     |
| `resources/views/faculty/contact.blade.php`            | Created                                     |
| `app/Http/Controllers/Admin/FacultyInfoController.php` | Modified: added `CONTACT_FIELDS` constant   |
| `resources/views/admin/faculty_info/index.blade.php`   | Modified: added Contact Information section |
| `resources/lang/en/site.php`                           | Modified: added 8 contact keys              |
| `resources/lang/vi/site.php`                           | Modified: added 8 contact keys              |
| `routes/web.php`                                       | Modified: added `/contact` route            |

---

## 4. Performance Optimizations

### Artisan cache

```bash
php artisan config:cache   # ✅
php artisan route:cache    # ✅
php artisan view:cache     # ✅
```

### Database indexes

Migration: `2026_08_16_000001_add_performance_indexes.php`

| Table                 | Column(s)                |
| --------------------- | ------------------------ |
| `page_views`          | `visited_at`             |
| `news`                | `active`, `published_at` |
| `research_activities` | `type`                   |
| `student_projects`    | `department`, `year`     |

---

## 5. Security Improvements

### HTTP Security Headers

Created `app/Http/Middleware/SecurityHeaders.php`, registered globally in `Kernel.php`:

```
X-Frame-Options: SAMEORIGIN
X-Content-Type-Options: nosniff
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
```

### Audits passed

| Check                                | Result                                                                          |
| ------------------------------------ | ------------------------------------------------------------------------------- |
| `@csrf` on all POST forms            | ✅ All verified                                                                 |
| User data escaping (`{!! !!}` audit) | ✅ All uses legitimate (CKEditor/admin content, paginator, `strip_tags`, `e()`) |
| `.env` in `.gitignore`               | ✅ `.env` + `.env.backup` both listed                                           |
| No hardcoded secrets in PHP code     | ✅ None found                                                                   |

---

## 6. Analytics Dashboard Improvements

**Controller:** `AdminAnalyticsController@index`

New metrics:

- **Today** : visits today
- **This week** : visits since `startOfWeek()`
- **This month** : visits since `startOfMonth()`
- **Last 30 days per day** : replaces previous 14-day window

New section breakdown (pie chart):

| Section          | Prefix rule                            |
| ---------------- | -------------------------------------- |
| Home             | Exact match `/`                        |
| News             | `str_starts_with('/news')`             |
| Research         | `str_starts_with('/research')`         |
| Departments      | `str_starts_with('/departments')`      |
| Lecturers        | `str_starts_with('/lecturers')`        |
| Student Projects | `str_starts_with('/student-projects')` |
| About            | `str_starts_with('/about')`            |
| Other            | all remaining                          |

**View improvements:**

- 3 info-box cards (Primary / Success / Warning)
- Line chart (30 days, Chart.js)
- Pie chart by section (Chart.js, 8 distinct colors)
- Top 10 pages table with rank column

**Tracking fix:** `TrackPageView` middleware now excludes `/language/*` in addition to `/admin*` and `/api*`.

---

## 7. UAT Results

**Date:** 2026-08-19 | **Method:** code audit + HTTP requests

| Profile                      | Tests  | Passed | Failed |
| ---------------------------- | ------ | ------ | ------ |
| Faculty Office Staff (Admin) | 7      | 7      | 0      |
| Lecturer (Public User)       | 6      | 6      | 0      |
| Student (Public User)        | 6      | 6      | 0      |
| **Total**                    | **19** | **19** | **0**  |

Full results: see `UAT_REPORT.md`.

---

## 8. Files Created

| File                                                                | Purpose                          |
| ------------------------------------------------------------------- | -------------------------------- |
| `app/Http/Controllers/ContactController.php`                        | Contact page controller          |
| `app/Http/Middleware/SecurityHeaders.php`                           | HTTP security headers middleware |
| `resources/views/faculty/contact.blade.php`                         | Contact public view              |
| `database/migrations/2026_08_16_000001_add_performance_indexes.php` | DB performance indexes           |
| `PHASE3_AUDIT_REPORT.md`                                            | Bug audit report                 |
| `PHASE3_RESPONSIVE_REPORT.md`                                       | Responsive design audit report   |
| `PHASE3_PERF_SECURITY_REPORT.md`                                    | Performance & security report    |
| `PHASE3_REPORT.md`                                                  | This document                    |
| `UAT_REPORT.md`                                                     | User Acceptance Testing report   |

---

## 9. Files Modified

| File                                                      | Changes                                                                       |
| --------------------------------------------------------- | ----------------------------------------------------------------------------- |
| `resources/views/news/show.blade.php`                     | BUG-01 color fix, image placeholder, `overflow-x:auto`                        |
| `resources/views/news/index.blade.php`                    | BUG-02 color fix                                                              |
| `resources/views/admin/news/create.blade.php`             | BUG-03 `@error` inline validation, 2MB limit                                  |
| `resources/views/admin/news/edit.blade.php`               | BUG-04 `@error` + `old()` fallback, 2MB limit                                 |
| `resources/views/header.blade.php`                        | Navbar overflow fixes, mobile EN/VI switcher, icon-only auth, `/contact` link |
| `resources/views/admin/sidebar.blade.php`                 | Fixed files link, removed dead Contact Management link                        |
| `resources/views/admin/faculty_info/index.blade.php`      | Added Contact Information section                                             |
| `resources/views/admin/analytics/index.blade.php`         | Full dashboard redesign                                                       |
| `resources/views/admin/research/index.blade.php`          | `table-responsive`, pagination fix                                            |
| `resources/views/admin/student-projects/index.blade.php`  | `table-responsive`, pagination fix                                            |
| `resources/views/admin/news/index.blade.php`              | `table-responsive`, pagination fix                                            |
| `resources/views/admin/lecturers/index.blade.php`         | `table-responsive`, pagination fix                                            |
| `resources/views/admin/departments/index.blade.php`       | `table-responsive`                                                            |
| `resources/views/faculty/about.blade.php`                 | `overflow-x:auto` on content blocks                                           |
| `resources/views/faculty/departments/show.blade.php`      | `overflow-x:auto` on content blocks                                           |
| `resources/views/faculty/research.blade.php`              | `min-width:0; overflow-wrap:break-word` fix                                   |
| `resources/views/head.blade.php`                          | `$title` null-safe fallback                                                   |
| `app/Http/Controllers/Admin/FacultyInfoController.php`    | Added `CONTACT_FIELDS`, updated `index()`/`update()`                          |
| `app/Http/Controllers/Admin/AdminAnalyticsController.php` | Full rewrite with week/month/30-day/sections                                  |
| `app/Http/Middleware/TrackPageView.php`                   | Exclude `/language/*` from tracking                                           |
| `app/Http/Kernel.php`                                     | Registered `SecurityHeaders` middleware globally                              |
| `routes/web.php`                                          | Added `/contact` route, fixed files route typo                                |
| `resources/lang/en/site.php`                              | Added 8 contact translation keys                                              |
| `resources/lang/vi/site.php`                              | Added 8 contact translation keys                                              |
| `README.md`                                               | Updated with Phase 3 content                                                  |

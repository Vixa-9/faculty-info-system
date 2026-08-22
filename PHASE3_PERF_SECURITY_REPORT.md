# Performance & Security Report : Phase 3

**Date:** 2026-08-16 | **Branch:** `phase3`

---

## PERFORMANCE

| #   | Check                                        | Status     | Action                                                                  |
| --- | -------------------------------------------- | ---------- | ----------------------------------------------------------------------- |
| 1a  | `config:cache`                               | ✅ OK      | Executed: config compiled                                               |
| 1b  | `route:cache`                                | ✅ OK      | Executed: routes compiled                                               |
| 1c  | `view:cache`                                 | ✅ OK      | Executed: Blade views compiled                                          |
| 1d  | PHP 8.5 deprecation `PDO::MYSQL_ATTR_SSL_CA` | ⚠️ Warning | Non-blocking, from `config/database.php:62` : out of scope              |
| 2   | Missing DB indexes                           | ✅ Fixed   | Migration created and executed                                          |
| 3   | Symlink `public/storage`                     | ✅ Exists  | No action required                                                      |
| 4   | Public controller pagination                 | ✅ OK      | News: `paginate(10)`, Research: `paginate(10)`, Projects: `paginate(9)` |

### Indexes Added

Migration: `2026_08_16_000001_add_performance_indexes.php`

| Table                 | Column(s)                |
| --------------------- | ------------------------ |
| `page_views`          | `visited_at`             |
| `news`                | `active`, `published_at` |
| `research_activities` | `type`                   |
| `student_projects`    | `department`, `year`     |

---

## SECURITY

| #   | Check                                       | Status     | Action                                                              |
| --- | ------------------------------------------- | ---------- | ------------------------------------------------------------------- |
| 5   | `@csrf` token on all POST forms             | ✅ OK      | All verified: GET (search) forms exempt                             |
| 6   | User data escaping                          | ✅ OK      | See detail below                                                    |
| 7   | `.env` in `.gitignore` / hardcoded keys     | ✅ OK      | `.env` + `.env.backup` in `.gitignore`, no hardcoded keys found     |
| 8   | HTTP security headers                       | ✅ Fixed   | `SecurityHeaders` middleware created and registered globally        |

### `{!! !!}` Detail — all legitimate

| File                                    | Usage                                 | Justification                        |
| --------------------------------------- | ------------------------------------- | ------------------------------------ |
| `faculty/about.blade.php`               | `$info['introduction']` etc.          | Admin-entered CKEditor content       |
| `faculty/departments/show.blade.php`    | `$department->introduction` etc.      | Admin-entered CKEditor content       |
| `faculty/departments/show.blade.php:84` | `nl2br(e($department->contact_info))` | Escaped with `e()` before display    |
| `faculty/departments/index.blade.php`   | `Str::limit(strip_tags(...))`         | HTML stripped before display         |
| `news/show.blade.php`                   | `$news->content`                      | Admin-entered CKEditor content       |
| Pagination views                        | `$paginator->links()`                 | Laravel framework internal output    |

### Security Headers Added

File: `app/Http/Middleware/SecurityHeaders.php` — registered in the global middleware stack (`Kernel.php`)

```
X-Frame-Options: SAMEORIGIN
X-Content-Type-Options: nosniff
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
```

---

## Files Modified / Created

| File                                                                | Type                                  |
| ------------------------------------------------------------------- | ------------------------------------- |
| `app/Http/Middleware/SecurityHeaders.php`                           | Created                               |
| `app/Http/Kernel.php`                                               | Modified: SecurityHeaders registered  |
| `database/migrations/2026_08_16_000001_add_performance_indexes.php` | Created + migrated                    |

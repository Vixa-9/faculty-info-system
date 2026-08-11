# Phase 3 : Bug Audit Report

**Date:** 2026-08-11  
**Scope:** All public routes, all admin routes, form validation, null image handling, auth protection

---

## Audit Summary

| Check                                          | Result                                                                  |
| ---------------------------------------------- | ----------------------------------------------------------------------- |
| All public routes return 200                   | ✅ Pass                                                                 |
| All admin routes return 302 (unauthenticated)  | ✅ Pass                                                                 |
| Admin forms have server-side validation        | ✅ Pass (all modules)                                                   |
| Admin forms show inline per-field errors       | ⚠️ Fixed (news create/edit were missing)                                |
| Public pages handle empty DB gracefully        | ✅ Pass (all use `@forelse`/`@empty`)                                   |
| Null image/photo shows placeholder             | ✅ Pass (all Phase 2 modules); news views skip image section (no crash) |
| Auth middleware protects all `/admin/*` routes | ✅ Pass                                                                 |

---

## Bugs Found & Fixed

### BUG-01 : White text on white background: `news/show.blade.php`

**Severity:** High : content invisible to users  
**Root cause:** Global CSS in `header.blade.php` sets `body { color: var(--white) }`. The `.bg-white border p-4` container had no color override.  
**Fix:** Added `style="color:#333;"` to the outer content container div.  
**File:** `resources/views/news/show.blade.php`

---

### BUG-02 : White text on white background: `news/index.blade.php`

**Severity:** High : news card body (date, title, excerpt) invisible  
**Root cause:** Same global CSS issue. The `.bg-white border border-top-0 p-4` card body div had no color override.  
**Fix:** Added `style="color:#333;"` to the card body div.  
**File:** `resources/views/news/index.blade.php`

---

### BUG-03 : No inline validation errors: `admin/news/create.blade.php`

**Severity:** Medium : server-side validation fires but users see only a generic error list at the top, no per-field highlighting  
**Root cause:** Form fields `title`, `summary`, `content` had no `@error` directives or `is-invalid` CSS class. This was a Phase 1 view not updated during Phase 2.  
**Fix:** Added `@error('field') is-invalid @enderror` on each input/textarea, and `<div class="invalid-feedback">{{ $message }}</div>` below each.  
**File:** `resources/views/admin/news/create.blade.php`

---

### BUG-04 : No inline validation errors + missing `old()`: `admin/news/edit.blade.php`

**Severity:** Medium : same as BUG-03; additionally, on validation failure the `title` and `summary` fields lost user input (no `old()` fallback)  
**Fix:** Added `@error` / `is-invalid` / `invalid-feedback` to `title`, `summary`, `content`. Changed `value="{{ $news->title }}"` to `value="{{ old('title', $news->title) }}"` and same for `summary` textarea.  
**File:** `resources/views/admin/news/edit.blade.php`

---

## Pre-existing Bugs (Phase 1 : Not Fixed)

### BUG-P1 : Route typo: `admin/files/lis`

**Severity:** Low : pre-existing from Phase 1  
**Detail:** Route defined as `Route::get('lis', ...)` instead of `list`. Sidebar links to `/admin/files/outline` (non-existent). The Files module is not part of Phase 2/3 scope.  
**Status:** TODO : low priority, requires Phase 1 cleanup.

---

## What Was Verified Working

- All 11 public URLs return HTTP 200 with no exceptions
- All 15+ admin URLs return HTTP 302 (unauthenticated) : auth middleware working
- Phase 2 admin forms (lecturers, departments, research, student-projects) all have proper `@error` inline display
- All Phase 2 public pages handle empty DB: `@forelse`/`@empty` pattern in all views
- Null image: all Phase 2 views show placeholder icon/div; news views skip image section (no crash, no placeholder : acceptable)
- Bilingual (EN/VI): all Phase 2 views use `__('site.key')`, `SetLocale` middleware in correct position
- `Str` facade alias available in all Blade views
- CKEditor scripts always in `@section('footer')` : correct

---

## TODO (Remaining)

| #   | Description                                                                                         | Priority | Status                                    |
| --- | --------------------------------------------------------------------------------------------------- | -------- | ----------------------------------------- |
| 1   | Fix `admin/files/lis` route typo → `list` and fix sidebar link                                      | Low      | ✅ Fixed                                  |
| 2   | Add image placeholder to `news/show.blade.php` when `$news->image` is null                          | Low      | ✅ Fixed                                  |
| 3   | Standardize news image max size to 2 MB (label + JS, controller already at 2 MB)                    | Low      | ✅ Fixed                                  |
| 4   | Pagination row number resets to 1 on page 2+ — 4 admin tables (research, projects, news, lecturers) | Cosmetic | ✅ Fixed                                  |
| 5   | `contact.html` link in navbar points to static file (404) : replace with real route or remove       | Low      | ⏳ Pending : awaiting supervisor decision |

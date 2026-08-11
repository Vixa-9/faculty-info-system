# Phase 3 — Responsive Design Audit Report

**Date:** 2026-08-11  
**Breakpoints tested:** mobile 375px / tablet 768px / desktop 1200px+ / iPad 1366px

---

## Summary

| Area | Issue | Status |
|------|-------|--------|
| Header — EN/VI switcher hidden on mobile | Hidden inside hamburger collapse | ✅ Fixed |
| Header — navbar overflow on iPad/small desktop | Too many items for 1200–1366px | ✅ Fixed |
| Header — non-functional search box causing overflow | Decorative input taking 190px | ✅ Removed |
| Admin tables — horizontal overflow on mobile | No `table-responsive` wrapper (5 tables) | ✅ Fixed |
| CKEditor content blocks — potential overflow | No `overflow-x:auto` on content wrappers | ✅ Fixed |
| Research items — email overflow on narrow screens | Flex child had no `min-width:0` | ✅ Fixed |
| Homepage grids | Bootstrap col-* correct, no issues | ✅ OK |
| Public page layouts (/about, /news, /lecturers, etc.) | Full-width containers, no overflow | ✅ OK |

---

## Problems Found & Fixed

### RESP-01 — EN/VI language switcher hidden on mobile

**File:** `resources/views/header.blade.php`  
**Problem:** The EN/VI switcher was inside `.collapse.navbar-collapse`, invisible on mobile until the user opened the hamburger menu.  
**Fix:** Added a mobile-only duplicate of the EN/VI buttons (`.nav-lang-mobile`) outside the collapse div, positioned between the brand and the toggler via `ml-auto mr-2`. The desktop version inside the collapse uses `.nav-lang-desktop`, shown/hidden via custom CSS at the 1200px breakpoint.  
**Result:** EN/VI always visible on mobile (right of brand). Auth buttons remain inside the collapse (hamburger-accessible).

---

### RESP-02 — Navbar overflow on iPad (1366px) and small desktops

**File:** `resources/views/header.blade.php`  
**Problem:** The site has 9 nav items + EN/VI + auth buttons. At 1366px (iPad 13", common laptops), the total width required (~1280px) exceeded the available space (~1270px), cutting off the rightmost buttons.  

**Root causes identified and fixed:**

| Fix | Space saved |
|-----|-------------|
| Removed non-functional search box (was `d-none d-lg-flex`, 190px max-width) | ~190px |
| Auth buttons → icon-only with `title` tooltip (was text + icon) | ~140px |
| Nav outer padding: `px-xl-5` (48px/side) → `px-xl-3` (16px/side) | ~64px |
| Nav link font: `0.82rem` → `0.78rem`, padding: `0.55rem` → `0.45rem` | ~70px |

**Total freed: ~240px.** Navbar now fits comfortably at 1200px+ with the standard `navbar-expand-xl` breakpoint. No custom media query hacks.

**Collapse breakpoint:** `navbar-expand-xl` — hamburger shows at < 1200px (mobile + tablet). Full horizontal navbar at ≥ 1200px.

---

### RESP-03 — Admin tables overflow horizontally on mobile

**Files:**
- `resources/views/admin/research/index.blade.php`
- `resources/views/admin/student-projects/index.blade.php`
- `resources/views/admin/lecturers/index.blade.php`
- `resources/views/admin/departments/index.blade.php`
- `resources/views/admin/news/index.blade.php`

**Problem:** All 5 admin tables had no `<div class="table-responsive">` wrapper. Wide tables caused full-page horizontal scroll on mobile.  
**Fix:** Wrapped each `<table>` in `<div class="table-responsive">`. Table scrolls independently; page layout preserved.

---

### RESP-04 — CKEditor content blocks could overflow on mobile

**Files:**
- `resources/views/faculty/about.blade.php` (6 content blocks)
- `resources/views/faculty/departments/show.blade.php` (3 content blocks)
- `resources/views/news/show.blade.php` (`.news-content` div)

**Problem:** CKEditor HTML (`{!! ... !!}`) can contain wide tables or large images. No `overflow-x:auto` on containers → full-page horizontal scroll on mobile.  
**Fix:** Added `overflow-x:auto;` to all CKEditor wrapper divs.

---

### RESP-05 — Research item text overflow on narrow screens

**File:** `resources/views/faculty/research.blade.php`  
**Problem:** `d-flex` layout with fixed 120×90px image + flex text container (`flex:1`). Without `min-width:0`, long emails/author names overflowed on narrow screens.  
**Fix:** Added `min-width:0; overflow-wrap:break-word;` to the text container.

---

## What Was Verified Working (No Changes Needed)

### Homepage (`main.blade.php`)
- **Slider:** `col-lg-7` / `col-lg-5` — stacks on mobile ✓
- **Departments grid:** `col-md-4 col-lg` — 1 per row on mobile ✓
- **Featured Research / Student Projects:** `col-md-4` — 1 per row on mobile ✓
- **Quick Links:** `col-6 col-md-4 col-lg-2` — 2 per row on mobile ✓
- **Latest News cards:** `col-lg-6` — 1 per row on mobile ✓

### Public pages
- `/lecturers`: `col-md-6 col-lg-4` — 1 per row on mobile ✓
- `/departments`: `col-md-6` — 1 per row on mobile ✓
- `/departments/{slug}`: full-width content, lecturer grid same as above ✓
- `/student-projects`: `col-md-6 col-lg-4` — 1 per row on mobile ✓
- `/research`: flex items readable on 375px ✓ (word-break fixed)
- `/news`: `col-lg-6` — 1 per row on mobile ✓
- `/news/{id}`: single-column article layout ✓
- `/about`: full-width content blocks ✓

### Admin panel
- AdminLTE responsive by default — sidebar collapses, top bar adapts ✓
- All 5 tables wrapped with `table-responsive` ✓

---

## Notes

- Auth buttons are icon-only on desktop (tachometer / sign-out / sign-in icons). Labels accessible via `title` tooltip on hover.
- The `contact.html` link in the navbar points to a non-existent static file — pending supervisor decision (see `PHASE3_AUDIT_REPORT.md` TODO #5).

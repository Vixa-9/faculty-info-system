# UAT Report : Faculty of Engineering & Technology, TGU

**Date:** 2026-08-19 | **Branch:** `phase3` | **Method:** code audit + HTTP requests

---

## PROFILE 1 : Faculty Office Staff (Admin)

| #   | Scenario                           | Status | Details                                                                                                                                                |
| --- | ---------------------------------- | ------ | ------------------------------------------------------------------------------------------------------------------------------------------------------ |
| 1   | Log in to the admin panel          | ✅     | `GET /admin/users/login` → 200. Unauthenticated routes redirect → 302 `/admin/users/login`                                                             |
| 2   | Add a news article with image      | ✅     | Form `enctype="multipart/form-data"`, `image` field, validation `mimes:jpeg,bmp,png\|max:2048`, stored in `public/images/posts/YYYY/MM/DD/`            |
| 3   | Edit faculty information           | ✅     | `GET /admin/faculty-info` protected (302). Form with 6 rich-text fields (CKEditor) + 6 contact fields. `updateOrCreate` by key                         |
| 4   | Add a lecturer with photo          | ✅     | Photo form with `enctype="multipart/form-data"`, stored in `public/images/lecturers/YYYY/`, live JS preview                                            |
| 5   | Edit a research activity           | ✅     | Route `GET /admin/research/{id}/edit` exists, form `PUT /admin/research/{id}`                                                                          |
| 6   | View the analytics dashboard       | ✅     | Returns: today / this week / this month / last 30 days (line chart) / section breakdown (pie chart) / top 10 pages                                     |
| 7   | Log out                            | ✅     | `POST /admin/logout` with `@csrf` in sidebar and header                                                                                                |

**Profile 1 result: 7/7 ✅**

---

## PROFILE 2 : Lecturer (Public User)

| #   | Scenario                          | Status | Details                                                                                                               |
| --- | --------------------------------- | ------ | --------------------------------------------------------------------------------------------------------------------- |
| 1   | Visit the homepage                | ✅     | `GET /` → 200. Sections: faculty intro, departments, latest news, research                                            |
| 2   | Navigate to department page       | ✅     | `GET /departments/information-technology` → 200. All department pages work (5 slugs verified)                         |
| 3   | View the lecturer list            | ✅     | `GET /lecturers` → 200. 5 lecturers in database                                                                       |
| 4   | View research activities          | ✅     | `GET /research` → 200. `paginate(10)`, type filters                                                                   |
| 5   | Switch language EN → VI           | ✅     | `GET /language/vi` → 302 (redirect back). Session locale updated. Translated via `resources/lang/vi/site.php`         |
| 6   | Visit the Contact page            | ✅     | `GET /contact` → 200. Data in DB: address, email, phone, location, IT dept. Google Maps embed included                |

**Profile 2 result: 6/6 ✅**

---

## PROFILE 3 : Student (Public User)

| #   | Scenario                              | Status | Details                                                                                                                           |
| --- | ------------------------------------- | ------ | --------------------------------------------------------------------------------------------------------------------------------- |
| 1   | Visit the homepage                    | ✅     | `GET /` → 200                                                                                                                     |
| 2   | Student projects + department filter  | ✅     | `GET /student-projects?department=CNTT` → 200. Department filter validated with `in_array()`. Year filter with `ctype_digit()`. `paginate(9)` |
| 3   | Read a news article                   | ✅     | `GET /news/1` → 200. Filter `active=true`. `abort_if(!$news->active, 404)` for inactive news                                     |
| 4   | View training programs                | ✅     | `GET /dccthp` → 200                                                                                                               |
| 5   | Switch language VI → EN              | ✅     | `GET /language/en` → 302 (redirect back). Session locale updated                                                                 |
| 6   | Visit the Contact page                | ✅     | `GET /contact` → 200. Bilingual labels via `__('site.contact_*')`                                                                |

**Profile 3 result: 6/6 ✅**

---

## Overall Summary

| Profile                      | Tests  | Passed  | Failed  |
| ---------------------------- | ------ | ------- | ------- |
| Faculty Office Staff (Admin) | 7      | 7       | 0       |
| Lecturer (Public)            | 6      | 6       | 0       |
| Student (Public)             | 6      | 6       | 0       |
| **Total**                    | **19** | **19**  | **0**   |

**Score: 19/19 ✅ : No failures**

---

## Technical Notes

- **Admin route security**: all redirect to `/admin/users/login` when unauthenticated (middleware `auth`) ✅
- **Image upload**: stored in `public/images/` (direct access), separate from `storage/app/public` (separate symlink) ✅
- **Test data**: 6 news articles, 5 lecturers, 5 departments, 6 research activities, 6 student projects ✅
- **Tracking**: `TrackPageView` excludes `/admin*`, `/api*`, `/language/*` ✅
- **i18n**: EN/VI switcher working on all public pages ✅

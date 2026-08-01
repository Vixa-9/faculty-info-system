# Phase 2 : Complete Development Report

Branch: `phase2` | Period: July 2026

---

## Summary

Phase 2 added 5 new content modules, bilingual support (EN/VI), a restructured navbar, and significant homepage improvements to the Faculty of Engineering & Technology CMS built on Laravel 8.

---

## 1. Migrations Added

| File                                                     | Table                 | Description                                         |
| -------------------------------------------------------- | --------------------- | --------------------------------------------------- |
| `2026_07_14_000001_create_faculty_info_table.php`        | `faculty_info`        | Key-value store for faculty page sections           |
| `2026_07_18_000001_create_lecturers_table.php`           | `lecturers`           | Lecturer profiles with photo, department, bio       |
| `2026_07_18_000002_create_departments_table.php`         | `departments`         | 5 fixed departments with rich-text content fields   |
| `2026_07_22_000001_create_research_activities_table.php` | `research_activities` | Research activities with type, authors, date, image |
| `2026_07_22_000002_create_student_projects_table.php`    | `student_projects`    | Student projects with team, supervisor, award, year |

> **Note:** All tables were created via `DB::statement()` in tinker due to migration table inconsistencies from Phase 1. Each migration is manually recorded in the `migrations` table (batch 99).

---

## 2. Models Created

| File                              | Model              | Key Fields / Notes                                                                                                                       |
| --------------------------------- | ------------------ | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `app/Models/FacultyInfo.php`      | `FacultyInfo`      | `key`, `value` : key-value pairs                                                                                                         |
| `app/Models/Lecturer.php`         | `Lecturer`         | `name`, `title`, `position`, `department`, `email`, `phone`, `bio`, `photo`, `research_interests` : static `$departments` array          |
| `app/Models/Department.php`       | `Department`       | `name`, `slug`, `introduction`, `training_programs`, `research_activities`, `contact_info` : `hasMany(Lecturer)` via `department`/`name` |
| `app/Models/ResearchActivity.php` | `ResearchActivity` | `title`, `type`, `description`, `authors`, `date`, `link`, `image`, `department` : static `$types` array                                 |
| `app/Models/StudentProject.php`   | `StudentProject`   | `title`, `description`, `team_members`, `supervisor`, `department`, `year`, `award`, `image`                                             |

---

## 3. Controllers Created

### Admin Controllers

| File                                                        | Routes Handled                 | Notes                                              |
| ----------------------------------------------------------- | ------------------------------ | -------------------------------------------------- |
| `app/Http/Controllers/Admin/FacultyInfoController.php`      | GET/POST `/admin/faculty-info` | index + update (no create/destroy : fixed fields)  |
| `app/Http/Controllers/Admin/LecturerController.php`         | `/admin/lecturers`             | Full CRUD + photo upload (`Str::uuid()`)           |
| `app/Http/Controllers/Admin/DepartmentController.php`       | `/admin/departments`           | index + edit + update only (departments are fixed) |
| `app/Http/Controllers/Admin/ResearchActivityController.php` | `/admin/research`              | Full CRUD + image upload (`Str::uuid()`)           |
| `app/Http/Controllers/Admin/StudentProjectController.php`   | `/admin/student-projects`      | Full CRUD + image upload (`Str::uuid()`)           |

### Public Controllers

| File                                                      | Routes Handled                                                     |
| --------------------------------------------------------- | ------------------------------------------------------------------ |
| `app/Http/Controllers/FacultyPublicController.php`        | GET `/about`                                                       |
| `app/Http/Controllers/LecturerPublicController.php`       | GET `/lecturers`                                                   |
| `app/Http/Controllers/DepartmentPublicController.php`     | GET `/departments`, GET `/departments/{department:slug}`           |
| `app/Http/Controllers/ResearchPublicController.php`       | GET `/research` (with `?type=` filter)                             |
| `app/Http/Controllers/StudentProjectPublicController.php` | GET `/student-projects` (with `?department=` and `?year=` filters) |

### Modified Controllers

| File                                                   | Change                                                                                                             |
| ------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `app/Http/Controllers/Admin/Users/LoginController.php` | Added `logout()` method                                                                                            |
| `app/Http/Controllers/MainControllers.php`             | Added queries for `facultyIntro`, `departments`, `featuredResearch`, `featuredProjects`; `latestNews` reduced to 4 |

---

## 4. Middleware

| File                                | Purpose                                               | Registration                         |
| ----------------------------------- | ----------------------------------------------------- | ------------------------------------ |
| `app/Http/Middleware/SetLocale.php` | Reads `session('locale')`, applies `App::setLocale()` | Added to `web` group in `Kernel.php` |

---

## 5. Routes Added (`routes/web.php`)

### Public Routes

| Method | URI                              | Controller                             |
| ------ | -------------------------------- | -------------------------------------- |
| GET    | `/about`                         | `FacultyPublicController@about`        |
| GET    | `/lecturers`                     | `LecturerPublicController@index`       |
| GET    | `/departments`                   | `DepartmentPublicController@index`     |
| GET    | `/departments/{department:slug}` | `DepartmentPublicController@show`      |
| GET    | `/research`                      | `ResearchPublicController@index`       |
| GET    | `/student-projects`              | `StudentProjectPublicController@index` |
| GET    | `/language/{locale}`             | Closure : stores `en`/`vi` in session  |

### Admin Routes (all auth-protected)

| Method | URI                                             | Controller                           |
| ------ | ----------------------------------------------- | ------------------------------------ |
| GET    | `/admin/faculty-info`                           | `FacultyInfoController@index`        |
| POST   | `/admin/faculty-info`                           | `FacultyInfoController@update`       |
| GET    | `/admin/lecturers`                              | `LecturerController@index`           |
| GET    | `/admin/lecturers/create`                       | `LecturerController@create`          |
| POST   | `/admin/lecturers`                              | `LecturerController@store`           |
| GET    | `/admin/lecturers/{lecturer}/edit`              | `LecturerController@edit`            |
| PUT    | `/admin/lecturers/{lecturer}`                   | `LecturerController@update`          |
| DELETE | `/admin/lecturers/destroy`                      | `LecturerController@destroy`         |
| GET    | `/admin/departments`                            | `DepartmentController@index`         |
| GET    | `/admin/departments/{department}/edit`          | `DepartmentController@edit`          |
| PUT    | `/admin/departments/{department}`               | `DepartmentController@update`        |
| GET    | `/admin/research`                               | `ResearchActivityController@index`   |
| GET    | `/admin/research/create`                        | `ResearchActivityController@create`  |
| POST   | `/admin/research`                               | `ResearchActivityController@store`   |
| GET    | `/admin/research/{research}/edit`               | `ResearchActivityController@edit`    |
| PUT    | `/admin/research/{research}`                    | `ResearchActivityController@update`  |
| DELETE | `/admin/research/destroy`                       | `ResearchActivityController@destroy` |
| GET    | `/admin/student-projects`                       | `StudentProjectController@index`     |
| GET    | `/admin/student-projects/create`                | `StudentProjectController@create`    |
| POST   | `/admin/student-projects`                       | `StudentProjectController@store`     |
| GET    | `/admin/student-projects/{studentProject}/edit` | `StudentProjectController@edit`      |
| PUT    | `/admin/student-projects/{studentProject}`      | `StudentProjectController@update`    |
| DELETE | `/admin/student-projects/destroy`               | `StudentProjectController@destroy`   |
| POST   | `/admin/logout`                                 | `LoginController@logout`             |

---

## 6. Views Created

### Admin Views

| File                                                      | Purpose                                        |
| --------------------------------------------------------- | ---------------------------------------------- |
| `resources/views/admin/faculty_info/index.blade.php`      | Edit 6 faculty info fields (CKEditor on 5)     |
| `resources/views/admin/lecturers/index.blade.php`         | Lecturer list with photo thumbnail             |
| `resources/views/admin/lecturers/create.blade.php`        | Add lecturer form with photo preview           |
| `resources/views/admin/lecturers/edit.blade.php`          | Edit lecturer form with existing photo display |
| `resources/views/admin/departments/index.blade.php`       | Department list with lecturer count            |
| `resources/views/admin/departments/edit.blade.php`        | Edit department (CKEditor on 3 fields)         |
| `resources/views/admin/research/index.blade.php`          | Research list with type badges                 |
| `resources/views/admin/research/create.blade.php`         | Add research activity form                     |
| `resources/views/admin/research/edit.blade.php`           | Edit research activity form                    |
| `resources/views/admin/student-projects/index.blade.php`  | Project list with award badges                 |
| `resources/views/admin/student-projects/create.blade.php` | Add project form                               |
| `resources/views/admin/student-projects/edit.blade.php`   | Edit project form                              |

### Public Views

| File                                                  | URL                   | Purpose                                        |
| ----------------------------------------------------- | --------------------- | ---------------------------------------------- |
| `resources/views/faculty/about.blade.php`             | `/about`              | Faculty info sections (conditional display)    |
| `resources/views/faculty/lecturers.blade.php`         | `/lecturers`          | Lecturer cards grouped by department           |
| `resources/views/faculty/departments/index.blade.php` | `/departments`        | Department cards with intro excerpt            |
| `resources/views/faculty/departments/show.blade.php`  | `/departments/{slug}` | Full department page + lecturers               |
| `resources/views/faculty/research.blade.php`          | `/research`           | Research activities with type filter tabs      |
| `resources/views/faculty/student-projects.blade.php`  | `/student-projects`   | Project card grid with department/year filters |

---

## 7. Views Modified

| File                                      | Changes                                                                                                                                                                       |
| ----------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `resources/views/header.blade.php`        | Logo path fix (`/images/logo/…`), login/logout nav, language switcher (EN/VI), navbar fully restructured to hardcoded bilingual structure, navbar font-size/padding reduction |
| `resources/views/admin/sidebar.blade.php` | Added links: Analytics, Faculty Info, Lecturers, Departments, Research Activities, Student Projects; all active states use `request()->is()`                                  |
| `resources/views/main.blade.php`          | Added sections: Faculty Introduction, Our Departments, Featured Research, Student Projects, Quick Links; News section title translated; `latestNews` uses take(4)             |

---

## 8. Seeders Created

| File                                          | Records                                 | Strategy                         |
| --------------------------------------------- | --------------------------------------- | -------------------------------- |
| `database/seeders/FacultyInfoSeeder.php`      | 6 key-value pairs                       | `updateOrCreate(['key' => …])`   |
| `database/seeders/LecturerSeeder.php`         | 5 lecturers (one per department)        | `updateOrCreate(['email' => …])` |
| `database/seeders/DepartmentSeeder.php`       | 5 departments with full English content | `updateOrCreate(['slug' => …])`  |
| `database/seeders/ResearchActivitySeeder.php` | 5 activities (one per type)             | `updateOrCreate(['title' => …])` |
| `database/seeders/StudentProjectSeeder.php`   | 5 projects (varied depts/years/awards)  | `updateOrCreate(['title' => …])` |

---

## 9. Bilingual Support

### Infrastructure

| File                                | Role                                              |
| ----------------------------------- | ------------------------------------------------- |
| `app/Http/Middleware/SetLocale.php` | Sets Laravel locale from session each request     |
| `app/Http/Kernel.php`               | `SetLocale` registered in `web` middleware group  |
| `routes/web.php`                    | `GET /language/{locale}` stores locale in session |
| `resources/views/header.blade.php`  | EN/VI toggle buttons (active = yellow `#f6c500`)  |

### Translation Files

| File                         | Keys                                                                         |
| ---------------------------- | ---------------------------------------------------------------------------- |
| `resources/lang/en/site.php` | 50+ keys covering navigation, section titles, buttons, filters, empty states |
| `resources/lang/vi/site.php` | Same keys in Vietnamese                                                      |

### Key groups covered

- Navigation: `nav_home`, `nav_about_dropdown`, `nav_about_faculty`, `nav_faculty_office`, `nav_departments_link`, `nav_lecturers_link`, `nav_education`, `nav_training_programs`, `nav_admissions`, `nav_research_dropdown`, `nav_research_activities`, `nav_procedures`, `nav_student_projects`, `nav_news_dropdown`, `nav_news_link`, `nav_announcements`, `nav_contact`
- About page: `introduction`, `vision`, `mission`, `history`, `org_structure`, `contact_office`
- Departments: `departments`, `view_details`, `back_to_departments`, `training_programs`, `dept_research`, `lecturers`, `contact`, `lecturer_count`
- Research: `research_activities`, `filter_all`, `view_more`, `no_research`, `type_Research Project`, `type_Publication`, `type_Conference`, `type_Workshop`, `type_Award`
- Student Projects: `student_projects`, `all_departments`, `all_years`, `clear_filters`, `supervisor`, `no_projects`
- Homepage: `home_faculty_intro`, `home_learn_more`, `home_our_departments`, `home_latest_news`, `home_all_news`, `home_featured_research`, `home_all_research`, `home_all_projects`, `home_quick_links`, `home_view_all`

---

## 10. Notable Technical Decisions

| Decision                                                                       | Reason                                                                                                                   |
| ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| Tables created via `DB::statement()` in tinker                                 | Migration table from Phase 1 has inconsistent entries; running `php artisan migrate` would fail or re-run old migrations |
| `Department hasMany Lecturer` via `department`/`name` (string FK, not integer) | `lecturers.department` stores the department name as a string (existing design); no FK constraint needed                 |
| `SetLocale` in `web` middleware group (after `StartSession`)                   | Session must be started before reading `session('locale')`                                                               |
| `Str::uuid()` for uploaded image filenames                                     | Prevents filename collisions, path traversal attacks, and information leakage                                            |
| `AJAX delete` via `removeRow(id, url)`                                         | Consistent with existing Article/News/Slide delete pattern using `/public/template/admin/js/main.js`                     |
| No CKEditor on `contact_info` in department edit                               | Plain text is more appropriate for address/phone/email multiline data                                                    |
| Research type filter tabs keep English URL param                               | DB stores English values; translated labels display only, filter logic uses English strings                              |

---

## 11. Bug Fixes

| Bug                                                     | Fix                                                                                                                         |
| ------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------- |
| Logo broken on nested public URLs (`/departments/slug`) | `src="{{'images/logo/…'}}"` had no leading `/` → relative path failed → added `/`                                           |
| Double flash message on department list after save      | `admin/main.blade.php` already includes `admin.alert` → removed duplicate alert from index view                             |
| Research activity badge type not translated             | Added `__('site.type_' . $type)` lookup with keys defined in both lang files                                                |
| Navbar wrapping to two lines in VI mode                 | Added `.navbar-nav .nav-link { font-size:0.82rem; padding: … ; white-space:nowrap }`, shrunk search box from 250px to 190px |

---

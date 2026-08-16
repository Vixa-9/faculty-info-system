# Rapport Performance & Sécurité : Phase 3

**Date :** 2026-08-16 | **Branche :** `phase3`

---

## PERFORMANCE

| #   | Vérification                                 | Statut     | Action                                                                  |
| --- | -------------------------------------------- | ---------- | ----------------------------------------------------------------------- |
| 1a  | `config:cache`                               | ✅ OK      | Exécuté : config compilée                                               |
| 1b  | `route:cache`                                | ✅ OK      | Exécuté : routes compilées                                              |
| 1c  | `view:cache`                                 | ✅ OK      | Exécuté : vues Blade compilées                                          |
| 1d  | Déprecation PHP 8.5 `PDO::MYSQL_ATTR_SSL_CA` | ⚠️ Warning | Non-bloquant, vient de `config/database.php:62` : hors scope            |
| 2   | Index BDD manquants                          | ✅ Corrigé | Migration créée et exécutée                                             |
| 3   | Symlink `public/storage`                     | ✅ Existe  | Aucune action requise                                                   |
| 4   | Pagination contrôleurs publics               | ✅ OK      | News: `paginate(10)`, Research: `paginate(10)`, Projects: `paginate(9)` |

### Index ajoutés

Migration : `2026_08_16_000001_add_performance_indexes.php`

| Table                 | Colonne(s)               |
| --------------------- | ------------------------ |
| `page_views`          | `visited_at`             |
| `news`                | `active`, `published_at` |
| `research_activities` | `type`                   |
| `student_projects`    | `department`, `year`     |

---

## SÉCURITÉ

| #   | Vérification                                | Statut     | Action                                                                 |
| --- | ------------------------------------------- | ---------- | ---------------------------------------------------------------------- |
| 5   | Token `@csrf` sur tous les formulaires POST | ✅ OK      | Tous vérifiés : formulaires GET (search) exemptés                      |
| 6   | Échappement données utilisateur             | ✅ OK      | Voir détail ci-dessous                                                 |
| 7   | `.env` dans `.gitignore` / clés hardcodées  | ✅ OK      | `.env` + `.env.backup` dans `.gitignore`, aucune clé hardcodée trouvée |
| 8   | Headers HTTP de sécurité                    | ✅ Corrigé | Middleware `SecurityHeaders` créé et enregistré globalement            |

### Détail `{!! !!}` : tous légitimes

| Fichier                                 | Usage                                 | Justification                       |
| --------------------------------------- | ------------------------------------- | ----------------------------------- |
| `faculty/about.blade.php`               | `$info['introduction']` etc.          | Contenu CKEditor entré par admin    |
| `faculty/departments/show.blade.php`    | `$department->introduction` etc.      | Contenu CKEditor entré par admin    |
| `faculty/departments/show.blade.php:84` | `nl2br(e($department->contact_info))` | Échappé avec `e()` avant affichage  |
| `faculty/departments/index.blade.php`   | `Str::limit(strip_tags(...))`         | HTML strippé avant affichage        |
| `news/show.blade.php`                   | `$news->content`                      | Contenu CKEditor entré par admin    |
| Vues avec pagination                    | `$paginator->links()`                 | Output interne du framework Laravel |

### Headers de sécurité ajoutés

Fichier : `app/Http/Middleware/SecurityHeaders.php` : enregistré dans le stack global (`Kernel.php`)

```
X-Frame-Options: SAMEORIGIN
X-Content-Type-Options: nosniff
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
```

---

## Fichiers modifiés / créés

| Fichier                                                             | Type                                 |
| ------------------------------------------------------------------- | ------------------------------------ |
| `app/Http/Middleware/SecurityHeaders.php`                           | Créé                                 |
| `app/Http/Kernel.php`                                               | Modifié : SecurityHeaders enregistré |
| `database/migrations/2026_08_16_000001_add_performance_indexes.php` | Créé + migré                         |

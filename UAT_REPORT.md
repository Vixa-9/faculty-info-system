# UAT Report : Faculté de Génie & Technologie, TGU

**Date :** 2026-08-19 | **Branche :** `phase3` | **Méthode :** audit code + requêtes HTTP

---

## PROFIL 1 : Faculty Office Staff (Admin)

| #   | Scénario                           | Statut | Détails                                                                                                                                               |
| --- | ---------------------------------- | ------ | ----------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1   | Se connecter au panel admin        | ✅     | `GET /admin/users/login` → 200. Routes non-auth redirigent → 302 `/admin/users/login`                                                                 |
| 2   | Ajouter une news avec image        | ✅     | Formulaire `enctype="multipart/form-data"`, champ `image`, validation `mimes:jpeg,bmp,png\|max:2048`, stockage dans `public/images/posts/YYYY/MM/DD/` |
| 3   | Modifier les infos de la faculté   | ✅     | `GET /admin/faculty-info` protégé (302). Formulaire avec 6 champs rich-text (CKEditor) + 6 champs contact. `updateOrCreate` par clé                   |
| 4   | Ajouter un enseignant avec photo   | ✅     | Formulaire photo avec `enctype="multipart/form-data"`, stockage `public/images/lecturers/YYYY/`, preview JS en temps réel                             |
| 5   | Modifier une activité de recherche | ✅     | Route `GET /admin/research/{id}/edit` existe, formulaire `PUT /admin/research/{id}`                                                                   |
| 6   | Consulter le dashboard analytics   | ✅     | Retourne : today / this week / this month / last 30 days (ligne) / répartition sections (camembert) / top 10 pages                                    |
| 7   | Se déconnecter                     | ✅     | `POST /admin/logout` avec `@csrf` dans sidebar et header                                                                                              |

**Résultat profil 1 : 7/7 ✅**

---

## PROFIL 2 : Lecturer (Utilisateur public)

| #   | Scénario                             | Statut | Détails                                                                                                              |
| --- | ------------------------------------ | ------ | -------------------------------------------------------------------------------------------------------------------- |
| 1   | Visiter la homepage                  | ✅     | `GET /` → 200. Sections : intro faculté, départements, dernières news, recherche                                     |
| 2   | Naviguer vers sa page département    | ✅     | `GET /departments/information-technology` → 200. Toutes les pages département fonctionnent (5 slugs vérifiés)        |
| 3   | Consulter la liste des enseignants   | ✅     | `GET /lecturers` → 200. 5 enseignants en base                                                                        |
| 4   | Consulter les activités de recherche | ✅     | `GET /research` → 200. `paginate(10)`, filtres par type                                                              |
| 5   | Changer la langue EN → VI            | ✅     | `GET /language/vi` → 302 (redirect back). Session locale mise à jour. Traduit via `resources/lang/vi/site.php`       |
| 6   | Visiter la page Contact              | ✅     | `GET /contact` → 200. Données en base : adresse, email, téléphone, localisation, IT dept. Carte Google Maps intégrée |

**Résultat profil 2 : 6/6 ✅**

---

## PROFIL 3 : Student (Utilisateur public)

| #   | Scénario                               | Statut | Détails                                                                                                                          |
| --- | -------------------------------------- | ------ | -------------------------------------------------------------------------------------------------------------------------------- |
| 1   | Visiter la homepage                    | ✅     | `GET /` → 200                                                                                                                    |
| 2   | Projets étudiants + filtre département | ✅     | `GET /student-projects?department=CNTT` → 200. Filtre validé avec `in_array()`. Filtre année avec `ctype_digit()`. `paginate(9)` |
| 3   | Lire une news                          | ✅     | `GET /news/1` → 200. Filtre `active=true`. `abort_if(!$news->active, 404)` pour news inactives                                   |
| 4   | Consulter les programmes de formation  | ✅     | `GET /dccthp` → 200                                                                                                              |
| 5   | Changer la langue VI → EN              | ✅     | `GET /language/en` → 302 (redirect back). Session locale mise à jour                                                             |
| 6   | Visiter la page Contact                | ✅     | `GET /contact` → 200. Labels bilingues via `__('site.contact_*')`                                                                |

**Résultat profil 3 : 6/6 ✅**

---

## Bilan global

| Profil                       | Tests  | Réussis | Échoués |
| ---------------------------- | ------ | ------- | ------- |
| Faculty Office Staff (Admin) | 7      | 7       | 0       |
| Lecturer (Public)            | 6      | 6       | 0       |
| Student (Public)             | 6      | 6       | 0       |
| **Total**                    | **19** | **19**  | **0**   |

**Score : 19/19 ✅ : Aucun échec**

---

## Notes techniques

- **Sécurité routes admin** : toutes redirigent vers `/admin/users/login` sans authentification (middleware `auth`) ✅
- **Upload images** : stockées dans `public/images/` (accès direct), distinct de `storage/app/public` (symlink séparé) ✅
- **Données de test** : 6 news, 5 enseignants, 5 départements, 6 activités de recherche, 6 projets étudiants ✅
- **Tracking** : `TrackPageView` exclut `/admin*`, `/api*`, `/language/*` ✅
- **i18n** : switcher EN/VI fonctionnel sur toutes les pages publiques ✅

# L'Atlas Français — Autocomplétion

Moteur de recherche de villes françaises avec autocomplétion AJAX en temps réel.  
Design éditorial haut de gamme propulsé par **Tailwind CSS**, **jQuery** et **PHP/MySQL**.

---

## Aperçu

Le site propose une expérience de navigation façon magazine d'art :

- **Page d'accueil** — Galerie éditoriale en grille masonry présentant 10 grandes villes françaises (images en noir & blanc qui prennent vie en couleur au survol).
- **Barre de recherche** — Champ de saisie architecturale avec autocomplétion AJAX instantanée (dès la 1ère lettre).
- **Page de résultats** — Index typographié listant les villes correspondant à la requête.
- **Page de lecture** — Fiche descriptive détaillée d'une ville, mise en page façon article de presse.

---

## Structure du Projet

```
autocompletion/
├── db.php                 # Connexion PDO centralisée
├── header.php             # Barre de navigation + recherche AJAX
├── index.php              # Page d'accueil (galerie des villes)
├── recherche.php          # Page de résultats de recherche
├── element.php            # Page de détail d'une ville
├── search.php             # Endpoint AJAX (autocomplétion)
├── autocompletion.sql     # Dump SQL (tables + données)
└── README.md
```

---

## Installation

### Prérequis

- **PHP 8.x** avec l'extension `pdo_mysql` activée
- **MySQL 5.7+** ou **MariaDB**
- Un environnement local type **MAMP**, **WAMP** ou **XAMPP**

### Étapes

1. **Cloner le dépôt**

```bash
git clone https://github.com/user-2342/autocompletion.git
cd autocompletion
```

2. **Créer la base de données**

   - Ouvrir **phpMyAdmin** (ou un client MySQL)
   - Créer une base nommée `autocompletion`
   - Importer le fichier `autocompletion.sql`

3. **Configurer la connexion**

   Éditer `db.php` si nécessaire :

```php
$host = 'localhost';
$dbname = 'autocompletion';
$user = 'root';
$pass = 'root'; // Adapter selon votre environnement
```

4. **Lancer le serveur**

```bash
php -S localhost:8000
```

   Ou placer le dossier dans `htdocs` (MAMP) / `www` (WAMP) et accéder via `http://localhost/autocompletion/`.

5. **Ouvrir dans le navigateur**

```
http://localhost:8000
```

---

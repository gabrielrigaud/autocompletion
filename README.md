# Autocomplétion

Moteur de recherche de villes françaises avec suggestions en temps réel via AJAX, page de résultats et fiches descriptives détaillées.

Démo en ligne : [solowia.fr/autocompletion](https://solowia.fr/autocompletion/)

## Stack technique

- **Back-end :** PHP 8, PDO (`utf8mb4`, `PDO::ATTR_EMULATE_PREPARES => false`)
- **Base de données :** MySQL
- **Front-end :** HTML5, Tailwind CSS (CDN), jQuery 3.6 (AJAX)

## Architecture et choix techniques

- **Autocomplétion en temps réel (`header.php`, `search.php`) :** interception de la saisie sur `#search`, requête `$.ajax` (GET) vers `search.php` qui exécute une requête PDO préparée (`LIKE :search`, `LIMIT 10`) et renvoie les liens de suggestions.
- **Recherche & Fiches (`recherche.php`, `element.php`) :**
  - Recherche élargie par sous-chaîne (`'%' . $search . '%'`).
  - Validation numérique de l'identifiant (`is_numeric($_GET['id'])`) avant requête préparée.
  - Échappement systématique des sorties HTML avec `htmlspecialchars()`.
- **Interface éditoriale (`index.php`) :** grille masonry présentant une sélection de villes françaises avec accès direct aux résultats.

## Installation locale

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/gabrielrigaud/autocompletion.git
   cd autocompletion
   ```
2. Configurer la connexion MySQL dans `db.php`.
3. Lancer le serveur PHP local :
   ```bash
   php -S localhost:8000
   ```
   Puis ouvrir `http://localhost:8000`.

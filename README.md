# Test Techique

Ce projet Laravel implémente une API pour gérer des profils et des commentaires, avec authentification des administrateurs utilisant Laravel Sanctum. 

## Prérequis

- PHP >= 8.0
- Composer
- MySQL (au choix)
- Node.js & npm (pour les assets si nécessaire)

## Installation

### Cloner le dépôt

```bash
git https://github.com/TolgaGu/hellocse
cd hellocse
```

## Installer les dépendances
```bash
composer install
```

## Configurer l'environnement
```bash
cp .env.example .env
```

Modifier les variables de configuration dans le fichier .env selon votre environnement local


## Générer la clé d'application
```bash
php artisan key:generate
```


## Migrer la base de données
```bash
php artisan migrate

```

## Peupler la base de données
```bash
php artisan db:seed
```

## Utilisation
```bash
php artisan serve
```

# Endpoints de l'API

## Authentification
Login : POST /api/login

    Paramètres : email, password
    Réponse : token

Logout (protégé) : POST /api/logout

    Header : Authorization: Bearer {token}

## Profils

Lister les profils actifs : GET /api/profils

    Réponse : Liste des profils actifs (sans le champ statut)

Modifier un profil (protégé) : PUT /api/profils/{id}

    Header : Authorization: Bearer {token}
    Paramètres : nom, prenom, image, statut

Supprimer un profil (protégé) : DELETE /api/profils/{id}

    Header : Authorization: Bearer {token}

## Commentaires
Ajouter un commentaire sur un profil (protégé) : POST /api/commentaires

    Header : Authorization: Bearer {token}
    Paramètres : profil_id, contenu
    Note : Un administrateur ne peut poster qu'un seul commentaire par profil.
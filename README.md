# 🕒 Laravel Timeline - Mini Réseau Social

Ce projet est une application web de type mini-réseau social développée avec **Laravel 10**. Il permet aux utilisateurs de **publier des messages**, **liker** ceux des autres, et **gérer leur profil**. L’interface est responsive et en mode sombre pour un affichage moderne.



## ✨ Fonctionnalités principales

- 👤 Authentification utilisateur (Laravel Breeze ou Jetstream)
- 📝 Création de publications via un champ texte
- ❤️ Système de like (1 like par utilisateur et par post)
- 🗂 Liste des publications en temps réel dans une **timeline**
- ⏱ Affichage relatif du temps de publication (`12 minutes ago`)
- 👨‍🔧 Gestion du profil utilisateur
- 🌙 Interface sombre claire et simple



## 📁 Structure du projet

### Dossier `app/Http/Controllers`

| Fichier                  | Rôle                                       |
|--------------------------|--------------------------------------------|
| `TimelineController.php` | Affichage de la timeline                   |
| `PostController.php`     | Création de publications (`store`)         |
| `LikeController.php`     | Ajout de likes (`like`)                    |
| `ProfileController.php`  | Modification du profil utilisateur         |

### Dossier `app/Models`

- `User.php` : modèle utilisateur
- `Post.php` : modèle des publications
- `Like.php` : modèle des likes



## 🛣 Routing (`routes/web.php`)

| Route            | Contrôleur / Méthode   | Middleware         |
|------------------|------------------------|--------------------|
| `/`              | `TimelineController@timeline` | -              |
| `/user`          | `TimelineController@user`     | -              |
| `POST /post`     | `PostController@store`        | Auth            |
| `POST /like`     | `LikeController@like`         | Auth            |
| `/profile`       | `ProfileController` (edit, update, destroy) | Auth |
| `/dashboard`     | Vue dashboard + auth + email vérifié         |

---

## 🖼 Aperçu visuel


- Zone de texte pour publier un message
- Liste des posts avec auteur, date, contenu
- Icône de cœur cliquable pour liker les messages



## ⚙️ Technologies

- Laravel 10
- Blade templating
- Tailwind CSS (présumé, ou CSS personnalisé)
- PHP 8.1+
- MySQL / SQLite
  

## 🚀 Installation

git clone https://github.com/ton-utilisateur/laravel-timeline.git
cd laravel-timeline

composer install
cp .env.example .env
php artisan key:generate

# Configure ta base de données dans le fichier .env
php artisan migrate

# Lancer le serveur de développement
php artisan serve

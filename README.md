# Mini CMS Basé sur Laravel 8
## Installation du site

Avant d'utiliser le site, il y a quelques manipulation à faire en ligne de commande. Si il s'agit d'un clone du dépôt git il faut commencer par un composer install et npm init.

Renseigner les différentes variables d'environnement dans le fichier .env (base de donné, application...)

Ensuite il faut s'assurer que les lignes 21 à 27 dans le fichier app/Providers/AppServiceProvider.php sont commentées, sinon elles empèchent le fonctionnement de l'outil artisan de Laravel.

En ligne de commande depuis la racine du projet, lancer les migrations :
```shell
php artisan migrate
```

Puis lancer les seeder dans l'ordre suivant :
```shell
php artisan db:seed --class=ConfigSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=PageAndMediaSeeder
```

Enfin décommentées les lignes 21 à 27 dans le fichier app/Providers/AppServiceProvider.php C'est ce qui va permettre de générer le menu de navigation.


Un site de démonstration sera alors disponible, avec un mini back-office . Identifiant d'accès au backoffice : 
- identifiant : test@test.fr
- mot de passe : dadfba16

## Laravel Auth
Point important, L'application est en Laravel 8, mais le système d'authentification est resté celui de la version 5.8 de Laravel. En effet après cette version le système d'authentification devient plus complexe et se trouve lié avec des framework Frontent (Vue, Tailwindcss ...)

## About Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## TODO

- [x] Vérifier que toutes les routes admin soit couvert par le Auth middleware
- [x] Inclure la configuration du site dans le tableau de bord
- [x] remettre de l'ordre dans les assets
- [x] Inclure L'upload de fichier dans le wysiwyg
- [x] Inclure des formats et un css pour le wysiwyg
- [ ] Ajouter des slider pour la page médias
- [ ] Dans le backoffice, quand il y a un slug mettre en place une "slugification" automatique (js).


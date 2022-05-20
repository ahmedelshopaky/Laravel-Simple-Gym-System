# Simple Gym System

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/ahmedelshopaky/Laravel-Simple-Gym-System">
    <img src="public/images/gym-logo.jpg" alt="Logo" width="150" />
  </a>

  <h3 align="center">Simple Gym System</h3>

  <p align="center">
    This is a Laravel PHP Web Application based on rules like Admin, City Manager, Gym Manager. All features and roles are explained below.
  </p>
</div>



<!-- ABOUT THE PROJECT -->
## About The Project

### Built With

* [Laravel](https://laravel.com/)
* [Admin LTE](https://adminlte.io/)
* [Laravel Cashier](https://github.com/laravel/cashier-stripe/)
* [Laravel Sanctum](https://github.com/laravel/sanctum/)
* [Laravel Ban](https://github.com/cybercog/laravel-ban/)
* [Laravel Permissions](https://github.com/spatie/laravel-permission/)
* [Laravel UI](https://github.com/laravel/ui)


### ERD & Mapping 

![gym edited](https://user-images.githubusercontent.com/97949768/156903803-d0e015de-a274-4a9a-a25c-de8434383991.png)


### Prerequisites

* Apache Web Server
* PHP 8.0
* Composer

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/ahmedelshopaky/Laravel-Simple-Gym-System
   ```
2. Run this command to install dependencies
   ```sh
   composer update
   ```
3. Configure your database in `.env` file
4. Run this command
   ```sh
   php artisan migrate --seed
   ```
5. Run this command to create an admin account
   ```sh
   php artisan create:admin
   ```


### Roles

- Admin will have access to everything in the system, he can see any links or make any action Gym Manager and City Manager can do with these extra functionalities.
- City Manager can do what Gym Manager do with extra functionalities like he can see all gyms in his city and make CRUD on any gym or gym manager in his city.
- Gym Manager can CRUD training sessions and assign coaches to these sessions, also he can buy training package for a user through stripe.
- User will have an endpoint to register, after he registers he must verify his email via verification link sent to him.

### Contributors

<table>
  <tr>
    <td>
      <img src="https://avatars.githubusercontent.com/u/58668061?v=4" />
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/56225081?v=4" />
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97956558?v=4" />
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/ahmedelshopaky">Ahmed Elshopaky</a>
    </td>
      <td>
      <a href="https://github.com/Asmaa100">Asmaa Ibrahim</a>
    </td>
     <td>
      <a href="https://github.com/abdeladlshaheen421">Abdeladl Shaheen</a>
    </td>
  </tr>
  <tr>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97949768?v=4" />
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/75224277?v=4" />
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97910397?v=4" />
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/EngAbdelrahmanMagdi">Abdelrahman Magdy</a>
    </td>
      <td>
      <a href="https://github.com/AshourDono">Ahmed Ashour</a>
    </td>
     <td>
      <a href="https://github.com/AliTaarek">Ali Tarek</a>
    </td>
  </tr>
</table>

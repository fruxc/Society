# Society Application

## Laravel MySQL

This is my first semester project Society Management System using laravel framework. It has basic functionalities like Maintenance CRUD and Staff Member CRUD and it also has different authentication like Admin Dashboard and Member Dashboard. Use it as you want. Pull it make changes as you want would love to see that.
It also generates PDF file of maintenance.

## Patch One

### Kindly just follow the below steps to run on your local machine

### Pull repository

### Dependencies

- PHP version >=v7.3
- Composer >=v1.10.13
- Xampp Server >= v3.2.0

### Open terminal

```bash
composer install
```

### Make changes to your env file

such as your DB_DATABASE, DB_USERNAME and DB_PASSWORD

Generate your application key using following command:

```bash
php artisan key:generate
```

### Start your XAMPP server

Come back to the terminal and paste the following command

```bash
php artisan migrate:fresh --seed
```

### Run on your machine

```bash
php artisan serve
```

It's running on your local machine, just click the link below

[https://127.0.0.1:8000](http://127.0.0.1:8000)

### Note: Complaint feature is not completed yet.

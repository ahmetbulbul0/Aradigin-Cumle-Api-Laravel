# Aradigin-Cumle-Api

***Aradigin Cumle Api Project***

## Technologies
* **Laravel**
* **Php**

## Project Setup Process

### Install composer (for php packages)
```sh
composer install
```

### Create .env file
```sh
1. duplicate the ".env.example" in main folder
2. rename the file you copied to ".env"
3. configure the ".env" file you renamed
```

### Create app key
```sh
php artisan key:generate
```

### Run migrations (for create database tables)
```sh
php artisan migrate
```

### Run seeders (for test datas, example: users, news, categories...)
```sh
php artisan db:seed
```

### Run project
```sh
php artisan serve
```

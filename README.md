# Aradigin-Cumle-Api-Laravel

"Aradığın Cümle" is an open-source project designed to provide you with the essential information from news articles by removing unnecessary details and presenting the content in a clean and concise format.

Key Features:

- Laravel API:
    - A robust API developed using Laravel to manage and deliver news data efficiently.
- Simplified News Delivery:
    - Filters out irrelevant content to focus on the core information that users need to know.
- Open Source:
    - Fully open-source, allowing developers to extend and adapt the API for their specific needs.
- Efficient Architecture:
    - Built with Laravel's scalable and secure framework, ensuring fast and reliable performance.
  
This project is ideal for applications or platforms that prioritize clean and concise news presentation.


## Technologies (languages & frameworks)

- Php
- Laravel
- MySql

## Setup

1. Install Php Packages
```sh
composer install
```
2. Create .env File
```sh
1. duplicate the ".env.example" in main folder
2. rename the file you copied to ".env"
3. configure the ".env" file you renamed
```
3. Create App Key
```sh
php artisan key:generate
```
4. Run Migrations
```sh
php artisan migrate
```
5. Run Seeders (For Test Datas)
```sh
php artisan db:seed
```
6. Run Laravel Project
```sh
php artisan serve
```

## Endpoints

- Register [localhost:8000/public/news](http://localhost:8000/public/news) Method: POST
- Login [localhost:8000/login](http://localhost:8000/login) Method: POST
- Log Out [localhost:8000/log-out](http://localhost:8000/log-out) Method: POST
- Auth User [localhost:8000/user](http://localhost:8000/user) Method: GET
- Public News List [localhost:8000/public/news](http://localhost:8000/public/news) Method: GET
- Public News Show [localhost:8000/public/news/{newsSlug}](http://localhost:8000/public/news/{newsSlug}) Method: GET
- User Type Create [localhost:8000/api/user-types](http://localhost:8000/api/user-types) Method: POST
- User Type Show [localhost:8000/api/user-types/:id](http://localhost:8000/api/user-types/:id) Method: GET
- User Type Update [localhost:8000/api/user-types/:id](http://localhost:8000/api/user-types/:id) Method: PATCH
- User Type Delete [localhost:8000/api/user-types/:id](http://localhost:8000/api/user-types/:id) Method: DELETE
- User Type Permission's List [localhost:8000/api/user-type-permissions](http://localhost:8000/api/user-type-permissions) Method: GET
- User Type Permission Create [localhost:8000/api/user-type-permissions](http://localhost:8000/api/user-type-permissions) Method: POST
- User Type Permission Show [localhost:8000/api/user-type-permissions/:id](http://localhost:8000/api/user-type-permissions/:id) Method: GET
- User Type Permission Update [localhost:8000/api/user-type-permissions/:id](http://localhost:8000/api/user-type-permissions/:id) Method: PATCH
- User Type Permission Delete [localhost:8000/api/user-type-permissions/:id](http://localhost:8000/api/user-type-permissions/:id) Method: DELETE
- User's List [localhost:8000/api/users](http://localhost:8000/api/users) Method: GET
- User Create [localhost:8000/api/users](http://localhost:8000/api/users) Method: POST
- User Show [localhost:8000/api/users/:id](http://localhost:8000/api/users/:id) Method: GET
- User Update [localhost:8000/api/users/:id](http://localhost:8000/api/users/:id) Method: PATCH
- User Delete [localhost:8000/api/users/:id](http://localhost:8000/api/users/:id) Method: DELETE
- User Permission's List [localhost:8000/api/user-permissions](http://localhost:8000/api/user-permissions) Method: GET
- User Permission Create [localhost:8000/api/user-permissions](http://localhost:8000/api/user-permissions) Method: POST
- User Permission Show [localhost:8000/api/user-permissions/:id](http://localhost:8000/api/user-permissions/:id) Method: GET
- User Permission Update [localhost:8000/api/user-permissions/:id](http://localhost:8000/api/user-permissions/:id) Method: PATCH
- User Permission Delete [localhost:8000/api/user-permissions/:id](http://localhost:8000/api/user-permissions/:id) Method: DELETE
- User Setting's List [localhost:8000/api/user-settings](http://localhost:8000/api/user-settings) Method: GET
- User Setting Create [localhost:8000/api/user-settings](http://localhost:8000/api/user-settings) Method: POST
- User Setting Show [localhost:8000/api/user-settings/:id](http://localhost:8000/api/user-settings/:id) Method: GET
- User Setting Update [localhost:8000/api/user-settings/:id](http://localhost:8000/api/user-settings/:id) Method: PATCH
- User Setting Delete [localhost:8000/api/user-settings/:id](http://localhost:8000/api/user-settings/:id) Method: DELETE
- Categories List [localhost:8000/api/categories](http://localhost:8000/api/categories) Method: GET
- Category Create [localhost:8000/api/categories](http://localhost:8000/api/categories) Method: POST
- Category Show [localhost:8000/api/categories/:id](http://localhost:8000/api/categories/:id) Method: GET
- Category Update [localhost:8000/api/categories/:id](http://localhost:8000/api/categories/:id) Method: PATCH
- Category Delete [localhost:8000/api/categories/:id](http://localhost:8000/api/categories/:id) Method: DELETE
- Resource Platform's List [localhost:8000/api/resource-platforms](http://localhost:8000/api/resource-platforms) Method: GET
- Resource Platform Create [localhost:8000/api/resource-platforms](http://localhost:8000/api/resource-platforms) Method: POST
- Resource Platform Show [localhost:8000/api/resource-platforms/:id](http://localhost:8000/api/resource-platforms/:id) Method: GET
- Resource Platform Update [localhost:8000/api/resource-platforms/:id](http://localhost:8000/api/resource-platforms/:id) Method: PATCH
- Resource Platform Delete [localhost:8000/api/resource-platforms/:id](http://localhost:8000/api/resource-platforms/:id) Method: DELETE
- Resource Url's List [localhost:8000/api/resource-urls](http://localhost:8000/api/resource-urls) Method: GET
- Resource Url Create [localhost:8000/api/resource-urls](http://localhost:8000/api/resource-urls) Method: POST
- Resource Url Show [localhost:8000/api/resource-urls/:id](http://localhost:8000/api/resource-urls/:id) Method: GET
- Resource Url Update [localhost:8000/api/resource-urls/:id](http://localhost:8000/api/resource-urls/:id) Method: PATCH
- Resource Url Delete [localhost:8000/api/resource-urls/:id](http://localhost:8000/api/resource-urls/:id) Method: DELETE
- News List [localhost:8000/api/news](http://localhost:8000/api/news) Method: GET
- News Create [localhost:8000/api/news](http://localhost:8000/api/news) Method: POST
- News Show [localhost:8000/api/news/:id](http://localhost:8000/api/news/:id) Method: GET
- News Update [localhost:8000/api/news/:id](http://localhost:8000/api/news/:id) Method: PATCH
- News Delete [localhost:8000/api/news/:id](http://localhost:8000/api/news/:id) Method: DELETE

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

## **Api Documentation**

### ***User Types***

* *Controller*: UserTypesController
* *Model*: UserTypes
* *Database*: user_types
* *Collection*: UserTypesCollection
* *Resource*: UserTypesResource
* *Main Route*: /api/user-types

> **Routes**
>   
> * /api/user-types
>   - Parameters:
>       - hasUsers (optional)
>           - value: everything
>       - sorting (optional)
>           - value: only available values [no09, no90, nameAZ, nameZA, slugAZ, slugZA, permissionsAZ, permissionsZA]
> 
> * /api/user-types/:userTypeNo
>     - Parameters:
>         - hasUsers (optional)
>             - value: everything
>

### ***User Type Permissions***

* *Controller*: UserTypePermissionsController
* *Model*: UserTypePermissions
* *Database*: user_type_permissions
* *Collection*: UserTypePermissionsCollection
* *Resource*: UserTypePermissionsResource
* *Main Route*: /api/user-type-permissions

> **Routes**
>   
> * /api/user-type-permissions
>     - Parameters:
>         - sorting (optional)
>             - value: only available values [no09, no90, userTypeNoAZ, userTypeNoZA]
>
> * /api/user-type-permissions/:userTypeNo

### ***Users***

* *Controller*: UsersController
* *Model*: Users
* *Database*: users
* *Collection*: UsersCollection
* *Resource*: UsersResource
* *Main Route*: /api/users

> **Routes**
>   
> * /api/users
>   - Parameters:
>       - hasNews (optional)
>           - value: everything
>       - sorting (optional)
>           - value: only available values [no09, no90, usernameAZ, usernameZA, fullNameAZ, fullNameZA, passwordAZ, passwordZA, typeAZ, typeZA, settingsAZ, settingsZA, permissionsAZ, permissionsZA]
>       - page (optional)
>           - value: numeric values
>
> * /api/users/:userTypeNo
>   - Parameters:
>       - hasNews (optional)
>           - value: everything

### ***User Permissions***

* *Controller*: UserPermissionsController
* *Model*: UserPermissions
* *Database*: user_permissions
* *Collection*: UserPermissionsCollection
* *Resource*: UserPermissionsResource
* *Main Route*: /api/user-permissions

> **Routes**
>   
> * /api/user-permissions
>     - Parameters:
>         - sorting (optional)
>             - value: only available values [no09, no90, userNoAZ, userNoZA, isBannedAZ, isBannedZA]
>
> * /api/user-permissions/:userTypeNo

### ***User Settings***

* *Controller*: UserSettingsController
* *Model*: UserSettings
* *Database*: user_settings
* *Collection*: UserSettingsCollection
* *Resource*: UserSettingsResource
* *Main Route*: /api/user-settings

> **Routes**
>   
> * /api/user-settings
>     - Parameters:
>         - sorting (optional)
>             - value: only available values [no09, no90, userNoAZ, userNoZA, isPublicAZ, isPublicZA, profilePhotoAZ, profilePhotoZA, websiteThemeAZ, websiteThemeZA, dashboardThemeAZ, dashboardThemeZA]
>
> * /api/user-settings/:userTypeNo

### ***Categories***

* *Controller*: CategoriesController
* *Model*: Categories
* *Database*: categories
* *Collection*: CategoriesCollection
* *Resource*: CategoriesResource
* *Main Route*: /api/categories

> **Routes**
>   
> * /api/categories
>       - Parameters:
>           - hasChildrenCategories (optional)
>               - value: everything
>           - hasNews (optional)
>               - value: everything
>           - sorting (optional)
>               - value: only available values [no09, no90, nameAZ, nameZA, slugAZ, slugZA, isParent09, isParent90, parentCategoryAZ, parentCategoryZA]
> 
> * /api/categories/:userTypeNo
>       - Parameters:
>           - hasChildrenCategories (optional)
>               - value: everything
>           - hasNews (optional)
>               - value: everything

### ***Resource Platforms***

* *Controller*: ResourcePlatformsController
* *Model*: ResourcePlatforms
* *Database*: resource_platforms
* *Collection*: ResourcePlatformsCollection
* *Resource*: ResourcePlatformsResource
* *Main Route*: /api/resource-platforms

> **Routes**
>   
> /api/resource-platforms
>
> /api/resource-platforms/:userTypeNo

### ***Resource Urls***

* *Controller*: ResourceUrlsController
* *Model*: ResourceUrls
* *Database*: resource_urls
* *Collection*: ResourceUrlsCollection
* *Resource*: ResourceUrlsResource
* *Main Route*: /api/resource-urls

> **Routes**
>   
> /api/resource-urls
>
> /api/resource-urls/:userTypeNo

### ***News***

* *Controller*: NewsController
* *Model*: News
* *Database*: news
* *Collection*: NewsCollection
* *Resource*: NewsResource
* *Main Route*: /api/news

> **Routes**
>   
> /api/news
>
> /api/news/:userTypeNo

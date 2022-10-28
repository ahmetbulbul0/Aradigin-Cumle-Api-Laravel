# Aradigin-Cumle-Api

**_Aradigin Cumle Api Project_**

## Technologies

-   **Laravel**
-   **Php**

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

### **_User Types_**

-   _Controller_: UserTypesController
-   _Model_: UserTypes
-   _Database_: user_types
-   _Collection_: UserTypesCollection
-   _Resource_: UserTypesResource
-   _Main Route_: /api/user-types

> **Routes**
>
> -   /api/user-types
>
>     -   Parameters:
>         -   hasUsers (optional)
>             -   value: everything
>         -   sorting (optional)
>             -   value: only available values [no09, no90, nameAZ, nameZA, slugAZ, slugZA, permissionsAZ, permissionsZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/user-types/:userTypeNo
>     -   Parameters:
>         -   hasUsers (optional)
>             -   value: everything

### **_User Type Permissions_**

-   _Controller_: UserTypePermissionsController
-   _Model_: UserTypePermissions
-   _Database_: user_type_permissions
-   _Collection_: UserTypePermissionsCollection
-   _Resource_: UserTypePermissionsResource
-   _Main Route_: /api/user-type-permissions

> **Routes**
>
> -   /api/user-type-permissions
>
>     -   Parameters:
>         -   sorting (optional)
>             -   value: only available values [no09, no90, userTypeNoAZ, userTypeNoZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/user-type-permissions/:userTypeNo

### **_Users_**

-   _Controller_: UsersController
-   _Model_: Users
-   _Database_: users
-   _Collection_: UsersCollection
-   _Resource_: UsersResource
-   _Main Route_: /api/users

> **Routes**
>
> -   /api/users
>
>     -   Parameters:
>         -   hasNews (optional)
>             -   value: everything
>         -   sorting (optional)
>             -   value: only available values [no09, no90, usernameAZ, usernameZA, fullNameAZ, fullNameZA, passwordAZ, passwordZA, typeAZ, typeZA, settingsAZ, settingsZA, permissionsAZ, permissionsZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/users/:userTypeNo
>     -   Parameters:
>         -   hasNews (optional)
>             -   value: everything

### **_User Permissions_**

-   _Controller_: UserPermissionsController
-   _Model_: UserPermissions
-   _Database_: user_permissions
-   _Collection_: UserPermissionsCollection
-   _Resource_: UserPermissionsResource
-   _Main Route_: /api/user-permissions

> **Routes**
>
> -   /api/user-permissions
>
>     -   Parameters:
>         -   sorting (optional)
>             -   value: only available values [no09, no90, userNoAZ, userNoZA, isBannedAZ, isBannedZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/user-permissions/:userTypeNo

### **_User Settings_**

-   _Controller_: UserSettingsController
-   _Model_: UserSettings
-   _Database_: user_settings
-   _Collection_: UserSettingsCollection
-   _Resource_: UserSettingsResource
-   _Main Route_: /api/user-settings

> **Routes**
>
> -   /api/user-settings
>
>     -   Parameters:
>         -   sorting (optional)
>             -   value: only available values [no09, no90, userNoAZ, userNoZA, isPublicAZ, isPublicZA, profilePhotoAZ, profilePhotoZA, websiteThemeAZ, websiteThemeZA, dashboardThemeAZ, dashboardThemeZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/user-settings/:userTypeNo

### **_Categories_**

-   _Controller_: CategoriesController
-   _Model_: Categories
-   _Database_: categories
-   _Collection_: CategoriesCollection
-   _Resource_: CategoriesResource
-   _Main Route_: /api/categories

> **Routes**
>
> -   /api/categories
>
>     -   Parameters:
>         -   hasChildrenCategories (optional)
>             -   value: everything
>         -   hasNews (optional)
>             -   value: everything
>         -   sorting (optional)
>             -   value: only available values [no09, no90, nameAZ, nameZA, slugAZ, slugZA, isParent09, isParent90, parentCategoryAZ, parentCategoryZA]
>         -   page (optional)
>             -   value: numeric values
>
> -   /api/categories/:userTypeNo
>     -   Parameters:
>         -   hasChildrenCategories (optional)
>             -   value: everything
>         -   hasNews (optional)
>             -   value: everything

### **_Resource Platforms_**

-   _Controller_: ResourcePlatformsController
-   _Model_: ResourcePlatforms
-   _Database_: resource_platforms
-   _Collection_: ResourcePlatformsCollection
-   _Resource_: ResourcePlatformsResource
-   _Main Route_: /api/resource-platforms

> **Routes**
>
> /api/resource-platforms
>
> -   Parameters:
>     -   hasResourceUrls (optional)
>         -   value: everything
>     -   hasNews (optional)
>         -   value: everything
>     -   sorting (optional)
>         -   value: only available values [no09, no90, nameAZ, nameZA, mainUrlAZ, mainUrlZA, slugAZ, slugZA]
>     -   page (optional)
>         -   value: numeric values
>
> /api/resource-platforms/:userTypeNo
>
> -   Parameters:
>     -   hasResourceUrls (optional)
>         -   value: everything
>     -   hasNews (optional)
>         -   value: everything

### **_Resource Urls_**

-   _Controller_: ResourceUrlsController
-   _Model_: ResourceUrls
-   _Database_: resource_urls
-   _Collection_: ResourceUrlsCollection
-   _Resource_: ResourceUrlsResource
-   _Main Route_: /api/resource-urls

> **Routes**
>
> /api/resource-urls
>
> -   Parameters:
>     -   hasNews (optional)
>         -   value: everything
>     -   sorting (optional)
>         -   value: only available values [no09, no90, urlAZ, urlZA, platformAZ, platformZA]
>     -   page (optional)
>         -   value: numeric values
>
> /api/resource-urls/:userTypeNo
>
> -   Parameters:
>     -   hasNews (optional)
>         -   value: everything

### **_News_**

-   _Controller_: NewsController
-   _Model_: News
-   _Database_: news
-   _Collection_: NewsCollection
-   _Resource_: NewsResource
-   _Main Route_: /api/news

> **Routes**
>
> /api/news
>
> -   Parameters:
>     -   sorting (optional)
>         -   value: only available values [no09, no90, titleAZ, titleZA, contentAZ, contentZA, authorAZ, authorZA, categoryAZ, categoryZA, resourcePlatformAZ, resourcePlatformZA, resourceUrlAZ, resourceUrlZA, addedTime09, addedTime90, publishStatusAZ, publishStatusZA, publishDate09, publishDate90, statusAZ, statusZA, slugAZ, slugZA, isApproved09, isApproved90, approvedAt09, approvedAt90, approvedByAZ, approvedByZA, isRejected09, isRejected90, rejectedAt09, rejectedAt90, rejectedByAZ, rejectedByZA, rejectedReasonAZ, rejectedReasonZA]
>     -   page (optional)
>         -   value: numeric values
>
> /api/news/:userTypeNo

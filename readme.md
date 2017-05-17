# Hydromet Station Maintenance System

The Hydromet Station Maintenance System aims to automate the process of keeping track of and creating maintenance records for each hydromet station. This project will be used by the Department of Science and Technology (DOST) in Region IV-A (CALABARZON).

## Getting Started
### Prerequisites
* Laravel Framework v5.4 (https://laravel.com/docs/5.4)
* php v>=5.6
### Installing
1. Create own env file. Modify the following from .env.example:
```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
with proper values then save as .env

2. In the command line, run:
```
php artisan key:generate
```

3. Serve the project
```
php artisan serve
```
### Creating a User
#### Only the Admin could create a user
1. Get: First && Last Name (permanent), Employee ID (permanent), E-mail, Position/designation
2. Register: First && Last Name (permanent), Employee ID (permanent), E-mail, Position/designation
3. Go to User List and set the user's permission/rule (admin || user)

## Authors
* **Levie Abigail Lutero** - (https://github.com/ayellutero)
* **Abbygail Mendoza** - (https://github.com/absmendoza)
# Books

## About the app
Tiny demo app.  
API, RESTful, endpoints, csv -> DB, csv download <-DB.  
- Suppliers (index, update, delete).  
- Products (index, update, delete, filter by supplier, load CSV, download CSV w/ suppliers).  


## Version requirements
- PHP – 8.0.13
- DB - 10.4.24-MariaDB
- Laravel – 9.9.0

## Installation

1. Pull in the project using the following link:
```
https://github.com/drago1979/books.git

```
2. Create .env file with valid data (DB credentials etc.).  
3. In your terminal (working folder) run
```
composer install
```  

```
npm install
```


```
npm run prod
```


```
php artisan key:generate
```


```
php artisan migrate
```

```
php artisan db:seed --class=UserSeeder
```

## Using the app
### Login credentials:  
* admin:  
  - email: admin@gmail.com
  - pass: admin1234
* member:
  - email: member@gmail.com
  - pass: admin1234

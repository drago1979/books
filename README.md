# Books

## About the app
Tiny demo app.  
Web interface: 
* login; 
* create regular "member"; 
* all users can access dashboard; 
* "admin" can upload file containing books (CSV, XML, XLS, XLSX).

API interface: all users can
* login and retrieve API token (Sanctum); 
* retrieve single resource or all resources with (or without) filtering.    



## Version requirements
- PHP – 8.0.13
- DB - 10.4.24-MariaDB
- Laravel – 9.9.0

## Tested for:
  - Chrome version: 100.0.4896.127
  - Mozilla Firefox version: 99.0.1
  - Microsoft Edge version: 101.0.1210.32

## Installation

1. Pull in the project using the following link:
```
https://github.com/drago1979/books.git

```
2. Create .env file in project directory and copy content from .env.example file.  Add valid data (DB credentials etc.) to .env.  
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
### Browser acces:
* admin:
  - Can access dashboard
  - Can upload files (csv, xml, xls, xlsx)
* member:
  - can access dashboard
* NOTE:
  Testing can be performed using these files:  
  
```
https://drive.google.com/file/d/1PKvb4Hg9il8bRsfNarjAreTseBzvpp5M/view?usp=sharing

```
### API access
* Tests were performed using Postman application. Recommended settings:
  - Untick the existing "ACCESS" key (in "HEADERS")
  - Add new "ACCESS" key with VALUE = application/json or VALUE = application/vnd.api+json
  - 
* Both admin and member have can perform same actions.
* Login (using existing credentials) in order to be issued with API token.
  - POST to URI: http://(app URI)/api/auth/login
  - In Postman set the BODY/RAW/JSON
  - In body use the following format for JSON string: {"email": "admin@gmail.com","password": "admin1234"}
  - In RESPONSE BODY you will recieve API token. Copy the token.
* Access the existing endpoints.
  - Paste the token from previous step to Authorization/Type/BearerToken/Token field.
  - Endpoint 1: GET to URI: http://(app URI)/api/login/books/{book_id}
  - Endpoint 2: GET to URI: http://(app URI)/api/login/books. Here you can filter results:  
  a) By book title: http://(app URI)/api/books?name_like=some_strig, or by  
  b) publishing year range: http://(app URI)/api/books?date_published_range=integer_value  (Integer values are: 
     
     I. 0 = less than 5 years;  
    II. 1 = between 5 and 10 years;  
    III. 2 = older than 10 years, or by  
  c) both criteria.

## Quadcode site

### Requirements

1. PHP 7.3+
2. Composer
3. PostreSQL 10+

PHP Extensions

* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Installation

1. `composer install --prefer-dist --no-dev`
2. Set DB and other params in `.env` file
3. `php artisan migrate`
4. `php artisan storage:link`
6. `chmod +x artisan`

## Frontend

### Console commands

* `npm dev` Generate dev version of static files
* `npm prod` Generate prod version of static files
* `npm watch` Watch for static files changes

### Contact form

backend endpoint `/contact`

POST params:

* `csrf=<string>` Get it from form hidden input or page head meta tag
* `first_name=<string>` Required
* `last_name=<string>` Required
* `email=<string>` Required
* `phone=<string>` Required
* `message=<string>`

Returns `{"success": bool}` from validated backend
or validation errors array by Laravel 

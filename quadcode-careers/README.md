## Quadcode Careers site

### Requirements

1. PHP 7.3+
2. Composer
3. PostreSQL 10+
4. OpenSSL 
5. cURL 7.19+
6. Cron 

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
2. Set DB params, huntflow API in `.env` file
3. `php artisan twill:install`
4. `php artisan storage:link`
5. Setup crontab
6. `chmod +x artisan`

You may set applicant source in `HUNTFLOW_APP_SOURCE` variable
You should set id of default(first) vacancy status in `HUNTFLOW_VACANCY_STATUS` variable 

### Crontab
Update vacancies from huntflow every hour
```crontab
*/5 * * * * .../artisan huntflow:vacancies:update >/dev/null 2>&1
0 0 1 * * .../artisan huntflow:locations:update >/dev/null 2>&1
5 0 1 * * .../artisan huntflow:categories:update >/dev/null 2>&1
```
replace `...` for full path to site

### Console commands

* `php artisan huntflow:me` Get user info
* `php artisan huntflow:accounts` Get user accounts
* `php artisan huntflow:applicant:sources` Get applicant sources 
* `php artisan huntflow:vacancies:get` Get vacancy by id
* `php artisan huntflow:vacancies:list` Get vacancy list
* `php artisan huntflow:vacancies:update` Update vacancies in site cache
* `php artisan huntflow:vacancies:statuses` Get vacancy statuses
* `php artisan huntflow:vacancies:statuses` Get vacancy statuses
* `php artisan huntflow:locations:update` Update locations on site from huntflow. It's only create new, not delete or update anything that exist
* `php artisan huntflow:categories:update` Update locations on site from huntflow. It's only create new, not delete or update anything that exist



## Frontend

### Console commands

* `npm dev` Generate dev version of static files
* `npm prod` Generate prod version of static files
* `npm watch` Watch for static files changes

### Search

backend endpoint `/en/search`

GET params:
* `location[]=<int>`
* `category[]=<int>`
* `keywords=<string>`

### Application form 

backend endpoint `/application`

POST params:

* `csrf=<string>` Get it from form hidden input or page head meta tag 
* `vacancy_id=<id|empty>` Set from backend if user applied from vacancy page
* `first_name=<string>` Required
* `last_name=<string>` Required
* `email=<string>` Required
* `phone=<string>` Required
* `message=<string>`
* `cv=<string>` File

Returns `{"success": bool}` from validated backend
or validation errors array by Laravel 

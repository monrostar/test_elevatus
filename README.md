# Regular Laravel setup

PHP version 8.*

## Start server

```bash
composer intsall
npm install
php artisan server
```

## Use commands

```bash
# example
php artisan distance:hamming "this is a test" "this is test"

# example
php artisan distance:levenshtein "this is a test" "this is test"
```

## Run Test

```angular
php artisan test --testsuite=Unit
```

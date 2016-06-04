# Kaemo-test

To get started:
```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php vendor/bin/homestead make
$ vagrant up
```

Edit your hosts file:
```
192.168.10.10 homestead.app
```

Run the tests:
```
$ ./vendor/bin/phpunit
```

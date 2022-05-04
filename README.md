# LinePayamak Laravel Support

A Laravel package to interact with [LinePayamak](http://linepayamak.ir) service.

# PHP Requirements

    - SOAP Extension (source php.ini)

# How to provide in laravel project?

First of all you need to add a new requirement to laravel project with below command.

    composer require linepayamak/laravel

After that, Update autoloader comopser file with this command.

    composer update && composer dump-autoload

Now, Update service provider list at `config/app.php` like this.

```php
    /*
    * Package Service Providers...
    */
    LinePayamak\Support\Laravel\ServiceProvider::class,
```

Add config file to your project with this command.

    php artisan vendor:publish --provider="LinePayamak\Support\Laravel\ServiceProvider"

Finally, check out the `config/linepayamak.php` file.

# How to use in laravel project?

In controllers or any where.

    $SMS = resolve('LinePayamak');
    echo $SMS->GetCredit();

OR use facade.

    use LinePayamak\Support\Laravel\Facade as SMS;
    echo SMS::GetCredit();

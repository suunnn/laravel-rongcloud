<h1 align="center">Laravel-RongCloud</h1>

## Requirements

- php >= 7.0
- composer
- laravel >= 5.1

## Installation

```shell
$ composer require suunnn/laravel-rongcloud
```

The `Suunnn\LaravelRongcloud\ServiceProvider` is auto-discovered and registered by default.

If you want to register it yourself or `laravel` < 5.5, add the ServiceProvider in `config/app.php`:

```php
'providers' => [
    /*
     * Package Service Providers...
     */
     Suunnn\LaravelRongcloud\ServiceProvider::class,
],
```

The `RongCloud` facade is also auto-discovered.

If you want to add it manually or `laravel` < 5.5, add the Facade in `config/app.php`:

```php
'aliases' => [
    ...
    'RongCloud' => Suunnn\LaravelRongcloud\Facades\RongCloud::class,
],
```

## Configuration

To publish the config, run the vendor publish command:

```shell
$ php artisan vendor:publish --provider="Suunnn\LaravelRongcloud\ServiceProvider" --tag=laravel-rongcloud
```

`config/rongcloud.php`:

```php
return [
    'app_key' => 'your app key',
    'app_secret' => 'your app secret'
];
```

## Usage

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RongCloud;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = [
            'id' => 'USER01',
            'name' => 'PHPSDK', //用户名称
            'portrait' => '' //用户头像
        ];

        $token = RongCloud::getUser()->register($user);
    }
}
```

## Documentation

- RongCloud official document [server_sdk_api](https://www.rongcloud.cn/docs/server_sdk_api/)
- RongCloud [server-sdk-php](https://github.com/rongcloud/server-sdk-php)

## License

MIT

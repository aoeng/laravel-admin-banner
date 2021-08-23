<?php
use Aoeng\Laravel\Admin\Banner\Admin\Controllers\BannerController;

use Illuminate\Routing\Router;

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->resource('banners', BannerController::class);
});


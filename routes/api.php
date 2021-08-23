<?php

use Aoeng\Laravel\Admin\Banner\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;


Route::get('api/banners', [BannerController::class, 'index']);

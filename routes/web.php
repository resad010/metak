<?php
use App\Router;
use App\Controllers\HomeController;

Router::get('',[HomeController::class, 'index']);
Router::get('posts/create',[HomeController::class, 'create']);
Router::post('posts',[HomeController::class, 'store']);
Router::get('posts/{id}',[HomeController::class, 'showPassword']);
Router::post('posts/{id}/ajax',[HomeController::class, 'password']);
Router::post('posts/{id}',[HomeController::class, 'show']);
Router::post('api/v1/posts',[HomeController::class, 'storeApi']);

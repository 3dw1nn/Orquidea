<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BackupController;


Route::get('', [HomeController::class, 'Index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'create', 'store'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('respaldos', BackupController::class)->names('admin.respaldos');

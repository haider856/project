<?php

use App\Models\Emp;
use App\Models\payrolls;
use App\Http\Controllers\Detail;
use App\Models\DepartmentManagement;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DetailController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayrollsController;
use App\Http\Middleware\EmployeAuthenticate;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        Route::get('register', 'register_view')->name('register');
        Route::post('register', 'register');
    });
        Route::get('logout', 'logout')->name('logout');
});

Route::middleware(Authenticate::class)->group(function () {

    Route::middleware(AdminAuthenticate::class)->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
        });


        Route::controller(DepartmentController::class)->group(function () {
            Route::get('departments/index', 'index')->name('departments');
            Route::get('department/create', 'create')->name('department.create');
            Route::post('department/create', 'store');
            Route::get('departments/{department}edit', 'edit')->name('department.edit');
            Route::patch('department/{department}edit', 'update');
            Route::delete('department/{department}/destroy', 'destroy')->name('department.destroy');
        });

        Route::controller(EmployeController::class)->group(function () {
            Route::get('employe', 'index')->name('employe');
            Route::get('employe/create', 'create')->name('employe.create');
            Route::post('employe/create', 'store');
            Route::get('employe/{employe}/show', 'show')->name('employe.show');
            Route::get('employe/{employe}/edit', 'edit')->name('employe.edit');
            Route::patch('employe/{employe}/details', 'update_details')->name('employe.details');
            Route::patch('employe/{employe}/picture', 'update_picture')->name('employe.picture');
            Route::patch('employe/{employe}/password', 'update_password')->name('employe.password');
            Route::delete('employe/{employe}/destroy', 'destroy')->name('employe.destroy');
        });

        Route::controller(PayrollController::class)->group(function () {
            Route::get('payroll/index', 'index')->name('payroll.index');
            Route::post('payroll/index', 'filter');
            Route::get('payroll/create', 'create')->name('payroll.create');
            Route::get('payroll/{payroll}/show', 'show')->name('payroll.show');
            Route::get('payroll/{payroll}/generate', 'generatePDF')->name('payroll.slip');
            Route::post('payroll/create', 'store');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile/edit', 'edit')->name('profile.index');
            Route::post('details/edit', 'update_details')->name('profile.details');
            Route::post('password/edit', 'update_password')->name('profile.password');
        });

    });


    Route::middleware(EmployeAuthenticate::class)->group(function () {
        Route::controller(EmpController::class)->group(function () {
            Route::get('user/dashboard', 'index')->name('user.dashboard');
        });

        Route::controller(DataController::class)->group(function () {
            Route::get('data/index', 'index')->name('data.index');
        });

        Route::controller(PayrollsController::class)->group(function () {
            Route::get('payrolls/index', 'index')->name('payrolls.index');
            Route::post('payrolls/index', 'filter');
            Route::get('payrolls/show', 'show')->name('payrolls.show');
            Route::get('payrolls/{payrolls}/generate', 'generatPDF')->name('payrolls.slip');
        });
        Route::controller(UserProfileController::class)->group(function () {
            Route::get('user/profile/edit', 'edit')->name('profile.edit');
            Route::post('user/details/edit', 'update_details')->name('profile.details');
            Route::post('user/password/edit', 'update_password')->name('profile.password');
        });
    });
});

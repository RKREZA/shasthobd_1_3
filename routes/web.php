<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('setlocale/{locale}',function($lang){
       \Session::put('locale',$lang);
       return redirect()->back();   
})->name('setlocale');


Route::group(['middleware'=>'language'],function ()
{


	Route::prefix('admin')->group(function () {

		Route::get('/login', 		[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
		Route::post('/login', 		[App\Http\Controllers\Auth\LoginController::class, 'login_go'])->name('login_go');
		Route::get('/logout', 		[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

		Route::group(['middleware' => ['auth']], function() {
			Route::get('/dashboard', 				[App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

			// Profile
			Route::get('/profile', 					[App\Http\Controllers\UserController::class, 'profile'])->name('profile');
			Route::post('/profile/update', 			[App\Http\Controllers\UserController::class, 'profile_update'])->name('profile.update');

			Route::prefix('setting')->group(function () {

				//department
				Route::get('/departments/index', 			[App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
				Route::get('/departments/create', 			[App\Http\Controllers\DepartmentController::class, 'create'])->name('departments.create');				
				Route::post('/departments/store', 			[App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');				
				Route::get('/departments/edit/{id}', 		[App\Http\Controllers\DepartmentController::class, 'edit'])->name('departments.edit');
				Route::post('/departments/update/{id}', 	[App\Http\Controllers\DepartmentController::class, 'update'])->name('departments.update');
				Route::post('/departments/destroy', 		[App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments.destroy');


				//doctor
				Route::get('/doctors/index', 			[App\Http\Controllers\DoctorController::class, 'index'])->name('doctors.index');
				Route::get('/doctors/create', 			[App\Http\Controllers\DoctorController::class, 'create'])->name('doctors.create');
				Route::post('/doctors/store', 			[App\Http\Controllers\DoctorController::class, 'store'])->name('doctors.store');
				Route::get('/doctors/edit/{id}', 		[App\Http\Controllers\DoctorController::class, 'edit'])->name('doctors.edit');
				Route::post('/doctors/update/{id}', 	[App\Http\Controllers\DoctorController::class, 'update'])->name('doctors.update');
				Route::post('/doctors/destroy', 		[App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctors.destroy');


			    // User
				Route::get('/users/index', 				[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
				Route::get('/users/create', 			[App\Http\Controllers\UserController::class, 'create'])->name('users.create');
				Route::post('/users/store', 			[App\Http\Controllers\UserController::class, 'store'])->name('users.store');
				Route::get('/users/edit/{id}', 			[App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
				Route::post('/users/update/{id}', 		[App\Http\Controllers\UserController::class, 'update'])->name('users.update');
				Route::post('/users/destroy', 			[App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

				// Role
				Route::get('/roles/index', 				[App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
				Route::get('/roles/create', 			[App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
				Route::post('/roles/store', 			[App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
				Route::get('/roles/edit/{id}', 			[App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
				Route::post('/roles/update/{id}', 		[App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
				Route::post('/roles/destroy', 			[App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

				// Permission
				Route::get('/permissions/index', 		[App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
				Route::get('/permissions/create', 		[App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
				Route::post('/permissions/store', 		[App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
				Route::get('/permissions/edit/{id}', 	[App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
				Route::post('/permissions/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
				Route::post('/permissions/destroy', 	[App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');

				// File Manager
				Route::get('/file-manager/index', 		[App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');
			});


		});
	});
});








	

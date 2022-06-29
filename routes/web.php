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

Route::get('/', [App\Http\Controllers\CemeteryController::class, 'index'])->name('cemetery.index');

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function() {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
  Route::middleware(['role:Web Administrator'])->group(function() {
    // Administrator homepage
    Route::get('/administrator', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/deceased/{id}/show',[App\Http\Controllers\AdminController::class, 'show_deceased']);
    Route::middleware(['permission:Create Deceased'])->group(function() {
      // Provide form to add new deceased to cemetery
      Route::get('/create-deceased',[App\Http\Controllers\AdminController::class,'create_deceased'])->name('cemetery.create-deceased');
      // Add a deceased member to the cemetery
      Route::post('/create-deceased-added',[App\Http\Controllers\AdminController::class,'store_deceased'])->name('cemetery.create');
      // Add empty plot to cemetery
      Route::post('/create-deceased-empty',[App\Http\Controllers\AdminController::class,'store_empty_deceased'])->name('cemetery.empty');
    });
    Route::middleware(['permission:Edit Deceased'])->group(function() {
      // Provide form to update an existing deceased
      Route::get('/deceased/{id}/update',[App\Http\Controllers\AdminController::class,'update_deceased_form']);
      // Update the existing deceased member
      Route::put('/deceased/{id}/update',[App\Http\Controllers\AdminController::class,'update_deceased_action'])->name('cemetery.update');
    });
    Route::middleware(['permission:Delete Deceased'])->group(function() {
      // Delete the existing deceased member
      Route::delete('/deceased/{id}/update',[App\Http\Controllers\AdminController::class,'delete_deceased'])->name('cemetery.delete');
    });
    // Show which roles that a certain member is assigned with
    Route::get('administrator/{member_id}/roles', [App\Http\Controllers\AdminController::class,'member_roles'])->name('admin.permissions');
  });
});

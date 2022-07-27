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
Route::get('/cemetery/{id}', [App\Http\Controllers\CemeteryController::class, 'individual'])->name('cemetery.person');

Auth::routes();

Route::middleware('auth')->group(function() {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
  Route::get('/list-in-cemetery', [App\Http\Controllers\AdminController::class, 'show_deceased_all'])->name('cemetery.allShown');
  Route::middleware(['permission:Administer The Website'])->group(function() {
    // Administrator homepage
    Route::get('/administrator', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/all-members',[App\Http\Controllers\AdminController::class, 'all_members'])->name('admin.members');
    Route::middleware(['permission:Create Deceased'])->group(function() {
      // Provide form to add new deceased to cemetery
      Route::get('/create-deceased',[App\Http\Controllers\AdminController::class,'create_deceased'])->name('cemetery.create-deceased');
      // Add a deceased member to the cemetery
      Route::post('/create-deceased-added',[App\Http\Controllers\AdminController::class,'store_deceased'])->name('cemetery.create');
      // Add empty plot to cemetery
      Route::post('/create-deceased-empty',[App\Http\Controllers\AdminController::class,'store_empty_deceased'])->name('cemetery.empty');
    });
    Route::middleware(['permission:Edit Deceased'])->group(function() {
      // Go to overall list of deceased for editing data
      Route::get('/edit-deceased', [App\Http\Controllers\AdminController::class,'update_deceased_all'])->name('cemetery.allupdates');
      // Provide form to update an existing deceased
      Route::get('/deceased/{id}/update', [App\Http\Controllers\AdminController::class,'update_deceased_form']);
      // Update the existing deceased member
      Route::put('/deceased/{id}/update', [App\Http\Controllers\AdminController::class,'update_deceased_action'])->name('cemetery.update');
      Route::put('/deceased/{id}/delete-profile-photo',[App\Http\Controllers\AdminController::class,'delete_deceased_profile'])->name('cemetery.deleteProfile');
    });
    Route::middleware(['permission:Delete Deceased'])->group(function() {
      // Go to overall list of deceased for deleting data
      Route::get('/delete-deceased', [App\Http\Controllers\AdminController::class,'delete_deceased_all'])->name('cemetery.alldeletes');
      // Provide form to confirm that this deceased record should be deleted
      Route::get('/deceased/{id}/delete', [App\Http\Controllers\AdminController::class,'delete_deceased_form']);
      // Delete the existing deceased member
      Route::delete('/deceased/{id}/delete',[App\Http\Controllers\AdminController::class,'delete_deceased'])->name('cemetery.delete');
    });
    Route::middleware(['permission:Assign Roles'])->group(function() {
      // Lists all members IOT select a member and change their roles
      Route::get('assign-roles', [App\Http\Controllers\AdminController::class,'all_members'])->name('admin.roles');
      // Show which roles that a certain member is assigned with
      Route::get('assign-roles/{id}', [App\Http\Controllers\AdminController::class,'member_roles'])->name('admin.assign');
      // Show which roles that a certain member is assigned with
      Route::post('assign-roles/{id}', [App\Http\Controllers\AdminController::class,'assign_roles'])->name('admin.assign');
    });
  });
});

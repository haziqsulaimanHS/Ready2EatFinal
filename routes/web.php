<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('developer', \App\Http\Controllers\DeveloperController::class);
    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::get('assign', [\App\Http\Controllers\ProjectController::class, 'assign'])->name('assign');
    Route::get('projects/{project}/assign', [\App\Http\Controllers\ProjectController::class, 'assign'])->name('project.assign');
    Route::post('addToDeveloper/{project}/assign', [\App\Http\Controllers\ProjectController::class, 'addToDeveloper'])->name('addToDeveloper');
    Route::get('dropDeveloper/{project}/{developer}/assign', [\App\Http\Controllers\ProjectController::class, 'dropDeveloper'])->name('dropDeveloper');
    Route::get('dropAllDevelopers/{project}/assign', [\App\Http\Controllers\ProjectController::class, 'dropAllDevelopers'])->name('dropAllDevelopers');
    Route::get('dropDeveloper/{project_id}/{developer_id}/assign', [\App\Http\Controllers\ProjectController::class, 'dropDeveloper'])
        ->name('dropDeveloper');
    Route::post('addToLeadDeveloper/{project}/assign', [\App\Http\Controllers\ProjectController::class, 'addToLeadDeveloper'])->name('addToLeadDeveloper');
    Route::get('dropLeadDeveloper/{project_id}/{developer_id}/assign', [\App\Http\Controllers\ProjectController::class, 'dropLeadDeveloper'])
        ->name('dropLeadDeveloper');

    Route::get('/projects/{project}/progress', [\App\Http\Controllers\ProjectController::class, 'progress'])->name('project.progress');
    Route::post('/projects/{project}/progress', [\App\Http\Controllers\ProjectController::class, 'storeProgress'])->name('project.storeProgress');
    Route::get('project/{project}/progress/{progress}', [\App\Http\Controllers\ProjectController::class, 'editProgress'])->name('project.editProgress');
    Route::delete('/project/{project}/progress/{progress}', [\App\Http\Controllers\ProjectController::class, 'deleteProgress'])->name('project.deleteProgress');
    Route::patch('/project/{project}/progress/{progress}', [\App\Http\Controllers\ProjectController::class, 'updateProgress'])->name('project.updateProgress');


    Route::resource('bu', \App\Http\Controllers\BUController::class);

    Route::group(['middleware' => 'can:isManagerOrBuUnit'], function () {
        Route::resource('bu', \App\Http\Controllers\BUController::class);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

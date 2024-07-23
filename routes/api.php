<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\managerController;
use App\Http\Controllers\Api\therapistController;

// Manager

Route::get('/manager', [managerController::class, 'index']);
Route::get('/manager/getId/{id}', [managerController::class, 'getById']);
Route::get('/manager/idAdmin/{id}', [managerController::class, 'getIdAndRol']);
Route::get('/manager/email/{email}', [managerController::class, 'getByEmail']);
Route::get('/manager/name/{name}', [managerController::class, 'getByName']);
Route::get('/manager/getEmailWithPassword/{email}/{password}', [managerController::class, 'getEmailAndPassword']);
Route::get('/manager/company/{company}', [managerController::class, 'getByCompany']);
Route::get('/manager/getIdCompany/{id}/{company}', [managerController::class, 'getIdAndCompany']);
Route::get('/manager/getAdmin', [managerController::class, 'getAdmin']);
Route::get('/manager/companyAndActive/{company}', [managerController::class, 'getByCompanyAndActive']);
Route::get('/manager/companyDistinct/{company}', [managerController::class, 'companyByDistinct']);

// Register
Route::post('/manager', [managerController::class, 'saveManager']);

// Update
Route::put('/manager/{id}', [managerController::class, 'update']);
Route::put('/manager/updateActive/{id}', [managerController::class, 'updateActive']);

// Delete
Route::delete('/manager/{id}', [managerController::class, 'destroy']);


// Therapist

Route::get('/therapist', [therapistController::class, 'index']);
Route::get('/therapist/getId/{id}', [therapistController::class, 'getById']);
Route::get('/therapist/name/{name}', [therapistController::class, 'getByName']);
Route::get('/therapist/dateEnd', [therapistController::class, 'orderDateEndDesc']);
Route::get('/therapist/minutes', [therapistController::class, 'orderMinutes']);
Route::get('/therapist/company/{company}', [therapistController::class, 'getByCompany']);
Route::get('/therapist/companyMinutes/{company}', [therapistController::class, 'getByCompanyOrderByMinutes']);
Route::get('/therapist/companyAndActive/{company}', [therapistController::class, 'getByCompanyAndActive']);


// Register
Route::post('/therapist', [therapistController::class, 'saveTherapist']);

// Update
Route::put('/therapist/{id}', [therapistController::class, 'update']);
Route::put('/therapist/updateItem/{name}', [therapistController::class, 'update3Item']);
Route::put('/therapist/updateItems/{name}', [therapistController::class, 'updateItems']);
Route::put('/therapist/minutes/{id}', [therapistController::class, 'updateMinutes']);

// Delete

Route::delete('/therapist/{id}', [therapistController::class, 'destroy']);

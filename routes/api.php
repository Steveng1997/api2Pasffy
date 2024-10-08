<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\managerController;
use App\Http\Controllers\Api\serviceController;
use App\Http\Controllers\Api\therapistController;
use App\Http\Controllers\Api\liquidatedManagerController;
use App\Http\Controllers\Api\liquidatedTherapistController;
use App\Http\Controllers\Api\authController;

// Manager

Route::get('/manager/{id_admin}', [managerController::class, 'getAll']);
Route::get('/manager/getId/{id}', [managerController::class, 'getById']);

// Register
Route::post('/manager', [managerController::class, 'save']);

// Update
Route::put('/manager/{id}', [managerController::class, 'update']);
Route::put('/manager/updateActive/{id}', [managerController::class, 'updateActive']);

// Delete
Route::delete('/manager/{id}', [managerController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
// Therapist

Route::get('/therapist/{id_admin}', [therapistController::class, 'index']);
Route::get('/therapist/getId/{id}', [therapistController::class, 'getById']);
Route::get('/therapist/name/{therapist}/{id_admin}', [therapistController::class, 'getByName']);
Route::get('/therapist/dateEnd', [therapistController::class, 'orderDateEndDesc']);
Route::get('/therapist/minutes/{id_admin}', [therapistController::class, 'orderMinutes']);
Route::get('/therapist/activeTrue', [therapistController::class, 'activeTrue']);

// Register
Route::post('/therapist', [therapistController::class, 'save']);

// Update
Route::put('/therapist/{id}', [therapistController::class, 'update']);
Route::put('/therapist/updateItem/{idTherapist}', [therapistController::class, 'update3Item']);
Route::put('/therapist/updateItems/{idTherapist}', [therapistController::class, 'updateItems']);
Route::put('/therapist/minutes/{id}', [therapistController::class, 'updateMinutes']);

// Delete
Route::delete('/therapist/{id}', [therapistController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
// Liquidation manager

Route::get('/liquidationManager', [liquidatedManagerController::class, 'index']);
Route::get('/liquidationManager/getIdManag/{idManag}', [liquidatedManagerController::class, 'getByIdManager']);
Route::get('/liquidationManager/manager/{manager}', [liquidatedManagerController::class, 'getByManager']);
Route::get('/liquidationManager/getDateCurrentDay/{created_at}', [liquidatedManagerController::class, 'getDateCurrentDay']);
Route::get('/liquidationManager/getDateTodayByManager/{created_at}/{manager}', [liquidatedManagerController::class, 'getDateTodayByManager']);

// Register
Route::post('/liquidationManager', [liquidatedManagerController::class, 'save']);

// Update
Route::put('/liquidationManager/updateByManager/{manager}', [liquidatedManagerController::class, 'updateByManager']);
Route::put('/liquidationManager/updateAmount/{idManag}', [liquidatedManagerController::class, 'updateAmount']);
Route::put('/liquidationManager/updateAmountById/{id}', [liquidatedManagerController::class, 'updateAmountById']);

// Delete
Route::delete('/liquidationManager/{id}', [liquidatedManagerController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
// Liquidation therapist

Route::get('/liquidationTherapist', [liquidatedTherapistController::class, 'index']);
Route::get('/liquidationTherapist/getIdTherap/{idTherap}', [liquidatedTherapistController::class, 'getByIdTherapist']);
Route::get('/liquidationTherapist/managerAndTherap/{therapist}/{manager}', [liquidatedTherapistController::class, 'getByManagerAndTherapist']);
Route::get('/liquidationTherapist/manager/{manager}', [liquidatedTherapistController::class, 'getByManager']);
Route::get('/liquidationTherapist/therap/{therapist}', [liquidatedTherapistController::class, 'getByTherap']);
Route::get('/liquidationTherapist/dateCurrentDay/{created_at}', [liquidatedTherapistController::class, 'getDateCurrentDay']);
Route::get('/liquidationTherapist/todayDateManager/{created_at}/{manager}', [liquidatedTherapistController::class, 'getTodayDateAndManager']);

// Register
Route::post('/liquidationTherapist', [liquidatedTherapistController::class, 'save']);

// Update
Route::put('/liquidationTherapist/updateByTherapist/{therapist}', [liquidatedTherapistController::class, 'updateByTherapist']);
Route::put('/liquidationTherapist/updateAmount/{idTherap}', [liquidatedTherapistController::class, 'updateAmount']);
Route::put('/liquidationTherapist/updateAmountById/{id}', [liquidatedTherapistController::class, 'updateAmountById']);

// Delete
Route::delete('/liquidationTherapist/{id}', [liquidatedTherapistController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
// Services

Route::get('/service', [serviceController::class, 'index']);
Route::get('/service/therapistAndManagerNotLiquidatedTherapist/{idTherapist}/{idManager}', [serviceController::class, 'getByTherapistAndManagerNotLiquidatedTherapist']);
Route::get('/service/therapistNotLiquidatedTherapist/{idTherapist}', [serviceController::class, 'getByTherapistNotLiquidatedTherapist']);
Route::get('/service/managerNotLiquidatedManager/{idManager}', [serviceController::class, 'getByManagerNotLiquidatedManager']);
Route::get('/service/liquidateTherapistFalse', [serviceController::class, 'getByLiquidateTherapistFalse']);
Route::get('/service/liquidateManagerFalse', [serviceController::class, 'getByLiquidateManagerFalse']);
Route::get('/service/idTherapist/{idLiquidatedTherapist}', [serviceController::class, 'getByIdTherapist']);
Route::get('/service/idManager/{idManag}', [serviceController::class, 'getByIdManager']);
Route::get('/service/getId/{idService}', [serviceController::class, 'getById']);
Route::get('/service/therapistIdDesc/{idTherapist}', [serviceController::class, 'getByTherapistIdDesc']);
Route::get('/service/therapistAndManagerAndNotLiquidatedTherapistDateStart/{idTherapist}/{idManager}', [serviceController::class, 'getByTherapistAndManagerAndNotLiquidatedTherapistDateStart']);
Route::get('/service/therapistAndManagerAndLiquidatedTherapistDateStart/{idTherapist}/{idManager}', [serviceController::class, 'getByTherapistAndManagerAndLiquidatedTherapistDateStart']);
Route::get('/service/managerAndNotLiquidatedManagerDateStart/{idManager}', [serviceController::class, 'getByManagerAndNotLiquidatedManagerDateStart']);
Route::get('/service/managerAndLiquidatedManager/{idManager}', [serviceController::class, 'getByManagerAndLiquidatedManager']);
Route::get('/service/getByTherapist/{idTherapist}', [serviceController::class, 'getByTherapist']);
Route::get('/service/managerAndNotLiquidatedManager/{idManager}', [serviceController::class, 'getByManagerAndNotLiquidatedManager']);
Route::get('/service/dateDay/{created_at}/{id}/{id_admin}', [serviceController::class, 'getByDateDay']);
Route::get('/service/uniqueIdDesc/{uniqueId}', [serviceController::class, 'getByUniqueIdDesc']);
Route::get('/service/therapistAndManager/{idTherapist}/{idManager}/{dateStart}/{dateEnd}', [serviceController::class, 'getByTherapistAndManager']);
Route::get('/service/managerAndDateStartAndDateEnd/{idManager}/{dateStart}/{dateEnd}', [serviceController::class, 'getByManagerAndDateStartAndDateEnd']);
Route::get('/service/todayDateAndManagerDateStartDesc/{created_at}/{idManager}', [serviceController::class, 'getByTodayDateAndManagerDateStartDesc']);
Route::get('/service/getLikePayment/{payment}', [serviceController::class, 'getLikePayment']);
Route::get('/service/todayDateAndTherapist/{created_at}/{idTherapist}', [serviceController::class, 'getByTodayDateAndTherapist']);
Route::get('/service/todayDateAndManager/{created_at}/{idManager}', [serviceController::class, 'getByTodayDateAndManager']);
Route::get('/service/todayDateAndManagerDistinctTherapist/{created_at}/{idTherapist}', [serviceController::class, 'getByTodayDateAndManagerDistinctTherapist']);
Route::get('/service/todayDateAndTherapistAndManager/{created_at}/{idTherapist}/{idManager}', [serviceController::class, 'getByTodayDateAndTherapistAndManager']);

// Register
Route::post('/service', [serviceController::class, 'save']);

// Update
Route::put('/service/{idService}', [serviceController::class, 'update']);
Route::put('/service/liquidatedTherapist/{idService}', [serviceController::class, 'updateLiquidatedTherapist']);
Route::put('/service/liquidatedManager/{idService}', [serviceController::class, 'updateLiquidatedManager']);
Route::put('/service/liquidatedTherapistByIdTherap/{idLiquidatedTherapist}', [serviceController::class, 'updateLiquidatedTherapistByIdTherap']);
Route::put('/service/liquidatedManagerByIdManager/{idLiquidatedManager}', [serviceController::class, 'updateLiquidatedManagerByIdManager']);
Route::put('/service/screen/{idService}', [serviceController::class, 'updateScreen']);
Route::put('/service/note/{idService}', [serviceController::class, 'updateNotes']);

// Delete
Route::delete('/service/{idService}', [serviceController::class, 'destroy']);

//AuthEndPoints

Route::get('/users/email/{email}', [authController::class, 'getByEmail']);
Route::get('/users/id/{id_admin}', [authController::class, 'getById']);

// Register
Route::post('/users/register', [authController::class, 'register']);
Route::post('/users/login', [authController::class, 'login']);
Route::post('/users/logout', [authController::class, 'logout']);

// Update
Route::put('/users/{id}', [authController::class, 'update']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\managerController;
use App\Http\Controllers\Api\serviceController;
use App\Http\Controllers\Api\therapistController;
use App\Http\Controllers\Api\liquidatedManagerController;
use App\Http\Controllers\Api\liquidatedTherapistController;

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

// Register
Route::post('/manager', [managerController::class, 'save']);

// Update
Route::put('/manager/{id}', [managerController::class, 'update']);
Route::put('/manager/updateActive/{id}', [managerController::class, 'updateActive']);

// Delete
Route::delete('/manager/{id}', [managerController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
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
Route::post('/therapist', [therapistController::class, 'save']);

// Update
Route::put('/therapist/{id}', [therapistController::class, 'update']);
Route::put('/therapist/updateItem/{name}', [therapistController::class, 'update3Item']);
Route::put('/therapist/updateItems/{name}', [therapistController::class, 'updateItems']);
Route::put('/therapist/minutes/{id}', [therapistController::class, 'updateMinutes']);

// Delete
Route::delete('/therapist/{id}', [therapistController::class, 'destroy']);

// ----------------------------------------------------------------------------------------------------------------------------------------------------
// Liquidation manager

Route::get('/liquidationManager/company/{company}', [liquidatedManagerController::class, 'getByCompany']);
Route::get('/liquidationManager/getIdManag/{idManag}', [liquidatedManagerController::class, 'getByIdManager']);
Route::get('/liquidationManager/manager/{manager}', [liquidatedManagerController::class, 'getByManager']);
Route::get('/liquidationManager/getDateCurrentDay/{created_at}/{company}', [liquidatedManagerController::class, 'getDateCurrentDay']);
Route::get('/liquidationManager/getDateTodayByManager/{created_at}/{manager}/{company}', [liquidatedManagerController::class, 'getDateTodayByManager']);

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

Route::get('/liquidationTherapist/company/{company}', [liquidatedTherapistController::class, 'getByCompany']);
Route::get('/liquidationTherapist/getIdTherap/{idTherap}', [liquidatedTherapistController::class, 'getByIdTherapist']);
Route::get('/liquidationTherapist/managerAndTherap/{therapist}/{manager}', [liquidatedTherapistController::class, 'getByManagerAndTherapist']);
Route::get('/liquidationTherapist/managerAndCompany/{manager}/{company}', [liquidatedTherapistController::class, 'getByManagerAndCompany']);
Route::get('/liquidationTherapist/therapAndCompany/{therapist}/{company}', [liquidatedTherapistController::class, 'getByTherapAndCompany']);
Route::get('/liquidationTherapist/dateCurrentDay/{created_at}/{company}', [liquidatedTherapistController::class, 'getDateCurrentDay']);
Route::get('/liquidationTherapist/todayDateManager/{created_at}/{manager}/{company}', [liquidatedTherapistController::class, 'getTodayDateAndManager']);

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
Route::get('/service/therapistAndManagerNotLiquidatedTherapist/{therapist}/{manager}', [serviceController::class, 'getByTherapistAndManagerNotLiquidatedTherapist']);
Route::get('/service/therapistNotLiquidatedTherapist/{therapist}', [serviceController::class, 'getByTherapistNotLiquidatedTherapist']);
Route::get('/service/managerNotLiquidatedManager/{manager}', [serviceController::class, 'getByManagerNotLiquidatedManager']);
Route::get('/service/liquidateTherapistFalse', [serviceController::class, 'getByLiquidateTherapistFalse']);
Route::get('/service/liquidateManagerFalse', [serviceController::class, 'getByLiquidateManagerFalse']);
Route::get('/service/idTherapist/{idTherap}', [serviceController::class, 'getByIdTherapist']);
Route::get('/service/idManager/{idManag}', [serviceController::class, 'getByIdManager']);
Route::get('/service/getId/{id}', [serviceController::class, 'getById']);
Route::get('/service/idEditTrue/{id}', [serviceController::class, 'getByIdEditTrue']);
Route::get('/service/therapistIdDesc/{therapist}', [serviceController::class, 'getByTherapistIdDesc']);
Route::get('/service/therapistAndManagerAndNotLiquidatedTherapistCurrentDateAsc/{therapist}/{manager}', [serviceController::class, 'getByTherapistAndManagerAndNotLiquidatedTherapistCurrentDateAsc']);
Route::get('/service/therapistAndManagerAndLiquidatedTherapistCurrentDateAsc/{therapist}/{manager}', [serviceController::class, 'getByTherapistAndManagerAndLiquidatedTherapistCurrentDateAsc']);
Route::get('/service/managerAndNotLiquidatedManagerCurrentDateAsc/{manager}', [serviceController::class, 'getByManagerAndNotLiquidatedManagerCurrentDateAsc']);
Route::get('/service/managerAndLiquidatedManagerCurrentDateDesc/{manager}', [serviceController::class, 'getByManagerAndLiquidatedManagerCurrentDateDesc']);
Route::get('/service/therapistCurrentDateDesc/{therapist}', [serviceController::class, 'getByTherapistCurrentDateDesc']);
Route::get('/service/managerAndNotLiquidatedManager/{manager}', [serviceController::class, 'getByManagerAndNotLiquidatedManager']);
Route::get('/service/dateDayAndCompantCurrentDateDesc/{dateToday}/{company}', [serviceController::class, 'getByDateDayAndCompantCurrentDateDesc']);
Route::get('/service/uniqueIdDesc/{uniqueId}', [serviceController::class, 'getByUniqueIdDesc']);
Route::get('/service/therapistAndManagerAndCompany/{therapist}/{manager}/{dateStart}/{dateEnd}/{company}', [serviceController::class, 'getByTherapistAndManagerAndCompany']);
Route::get('/service/managerAndDateStartAndDateEndAndCompany/{manager}/{dateStart}/{dateEnd}/{company}', [serviceController::class, 'getByManagerAndDateStartAndDateEndAndCompany']);
Route::get('/service/todayDateAndManagerAndCompanyCurrentDateDesc/{dateToday}/{manager}/{company}', [serviceController::class, 'getByTodayDateAndManagerAndCompanyCurrentDateDesc']);
Route::get('/service/getLikePayment/{payment}', [serviceController::class, 'getLikePayment']);
Route::get('/service/todayDateAndTherapistAndCompany/{dateToday}/{therapist}/{company}', [serviceController::class, 'getByTodayDateAndTherapistAndCompany']);
Route::get('/service/todayDateAndManagerAndCompany/{dateToday}/{manager}/{company}', [serviceController::class, 'getByTodayDateAndManagerAndCompany']);
Route::get('/service/todayDateAndManagerAndCompanyDistinctTherapist/{dateToday}/{manager}/{company}', [serviceController::class, 'getByTodayDateAndManagerAndCompanyDistinctTherapist']);
Route::get('/service/todayDateAndTherapistAndManagerAndCompany/{dateToday}/{therapist}/{manager}/{company}', [serviceController::class, 'getByTodayDateAndTherapistAndManagerAndCompany']);
Route::get('/service/company/{company}', [serviceController::class, 'getCompany']);

// Register
Route::post('/service', [serviceController::class, 'save']);

// Update
Route::put('/service/{id}', [serviceController::class, 'update']);
Route::put('/service/amountsById/{id}', [serviceController::class, 'updateAmountsById']);
Route::put('/service/numberFloor1/{uniqueId}', [serviceController::class, 'updateNumberFloor1']);
Route::put('/service/updateValues/{id}', [serviceController::class, 'updateValues']);
Route::put('/service/numberFloor1ById/{id}', [serviceController::class, 'updateNumberFloor1ById']);
Route::put('/service/numberFloor2ZeroById/{id}', [serviceController::class, 'updateNumberFloor2ZeroById']);
Route::put('/service/numberFloor2ByUniqueId/{uniqueId}', [serviceController::class, 'updateNumberFloor2ByUniqueId']);
Route::put('/service/liquidatedTherapist/{id}', [serviceController::class, 'updateLiquidatedTherapist']);
Route::put('/service/liquidatedManager/{id}', [serviceController::class, 'updateLiquidatedManager']);
Route::put('/service/liquidatedTherapistByIdTherap/{idTherap}', [serviceController::class, 'updateLiquidatedTherapistByIdTherap']);
Route::put('/service/liquidatedManagerByIdManager/{idManag}', [serviceController::class, 'updateLiquidatedManagerByIdManager']);
Route::put('/service/screen/{id}', [serviceController::class, 'updateScreen']);
Route::put('/service/note/{id}', [serviceController::class, 'updateNotes']);

// Delete
Route::delete('/service/{id}', [serviceController::class, 'destroy']);

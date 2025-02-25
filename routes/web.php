<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MsaController;
use App\Http\Controllers\TsaController;
use App\Http\Controllers\SaController;
use App\Http\Controllers\RfpaController;
use App\Http\Controllers\FpaController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\AccountsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UserController:: class, 'login'])->name('login');
Route::post('/login-user', [UserController:: class, 'loginUser'])->name('authenticate');
Route::get('/account', [AccountsController:: class, 'manageAccount'])->name('account');
Route::post('/createAccount', [AccountsController::class, 'createAccount'])->name('createAccount');

//MSA
Route::get('/msa', [MsaController:: class, 'msa'])->name('msa');
Route::post('/addmsa', [MsaController::class, 'addmsa'])->name('addmsa');
Route::delete('/delete/{id_msa}', [MsaController::class, 'delete'])->name('deletemsa');
Route::put('/update/{id_msa}', [MsaController::class, 'update'])->name('updatemsa');

//SA
Route::get('/sa', [SaController:: class, 'sa'])->name('sa');
Route::post('/addsa', [SaController::class, 'addsa'])->name('addsa');
Route::delete('/deletesa/{id_sa}', [SaController::class, 'deletesa'])->name('deletesa');
Route::put('/updatesa/{id_sa}', [SaController::class, 'updatesa'])->name('updatesa');

//RFPA
Route::get('/rfpa', [RfpaController:: class, 'rfpa'])->name('rfpa');
Route::post('/addrfpa', [RfpaController::class, 'addrfpa'])->name('addrfpa');
Route::put('/updaterfpa/{id_rfpa}', [RfpaController::class, 'updaterfpa'])->name('updaterfpa');
Route::delete('/deleterfpa/{id_rfpa}', [RfpaController::class, 'deleterfpa'])->name('deleterfpa');

//FPA
Route::get('/fpa', [FpaController:: class, 'fpa'])->name('fpa');
Route::post('/addfpa', [FpaController::class, 'addfpa'])->name('addfpa');
Route::put('/updatefpa/{id_fpa}', [FpaController::class, 'updatefpa'])->name('updatefpa');
Route::delete('/deletefpa/{id_fpa}', [FpaController::class, 'deletefpa'])->name('deletefpa');

//TSA
Route::get('/tsa', [TsaController:: class, 'tsa'])->name('tsa');
Route::post('/addtsa', [TsaController::class, 'addtsa'])->name('addtsa');
Route::put('/updatetsa/{id_tsa}', [TsaController::class, 'updatetsa'])->name('updatetsa');
Route::delete('/deletetsa/{id_tsa}', [TsaController::class, 'deletetsa'])->name('deletetsa');

//SP Government
Route::get('/spgovernment', [SpController:: class, 'sp_government'])->name('sp-gov');
Route::post('/addsp_gov', [SpController::class, 'addspgov'])->name('addsp_gov');
Route::put('/updatesp_gov/{id_spgov}', [SpController::class, 'updatesp_gov'])->name('updatesp_gov');
Route::delete('/deletesp_gov/{id_spgov}', [SpController::class, 'deletesp_gov'])->name('deletesp_gov');

//SP School
Route::get('/spschool', [SpController:: class, 'sp_school'])->name('sp-school');
Route::post('/addsp_school', [SpController::class, 'addspschool'])->name('addsp_school');
Route::put('/updatesp_school/{id_spschool}', [SpController::class, 'updatesp_school'])->name('updatesp_school');
Route::delete('/deletesp_school/{id_spschool}', [SpController::class, 'deletesp_school'])->name('deletesp_school');







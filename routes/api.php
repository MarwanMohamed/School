<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\StudentGroupController;
use App\Http\Controllers\StudyCategoryController;

Route::post('create-testing-token', 'LoginController@createTestingToken');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('students', StudentsController::class);

    Route::get('/departments', [DepartmentsController::class, 'index']);
    Route::post('/department/create', [DepartmentsController::class, 'save']);
    Route::put('/department/{id}/edit', [DepartmentsController::class, 'update']);
    Route::delete('/department/{id}/delete', [DepartmentsController::class, 'destroy']);


    Route::get('/studyGroups', [StudyCategoryController::class, 'index']);
    Route::post('/studyGroup/create', [StudyCategoryController::class, 'save']);
    Route::put('/studyGroup/{id}/edit', [StudyCategoryController::class, 'update']);
    Route::delete('/studyGroup/{id}/delete', [StudyCategoryController::class, 'destroy']);

    Route::get('/studentGroups', [StudentGroupController::class, 'index']);
    Route::post('/studentGroup/create', [StudentGroupController::class, 'save']);
    Route::put('/studentGroup/{id}/edit', [StudentGroupController::class, 'update']);
    Route::get('/studentGroup/{id}', [StudentGroupController::class, 'show']);
    Route::delete('/studentGroup/{id}/delete', [StudentGroupController::class, 'destroy']);


    Route::get('/branches', [BranchesController::class, 'index']);
    Route::post('/branch/create', [BranchesController::class, 'save']);
    Route::put('/branch/{id}/edit', [BranchesController::class, 'update']);
    Route::get('/branch/{id}', [BranchesController::class, 'show']);
    Route::delete('/branch/{id}/delete', [BranchesController::class, 'destroy']);


    Route::resource('studySubject', StudySubjectController::class);

    Route::post('/installments', 'InstallmentsController@index');
    Route::post('/installment/{id}/pay', 'InstallmentsController@pay');


});


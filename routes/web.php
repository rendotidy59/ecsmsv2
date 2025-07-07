<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [
    TestController::class,
    'index'
])->name('test.index');

Route::get('/db-test', function () {
    return [
        'host' => config('database.connections.mysql.host'),
        'port' => config('database.connections.mysql.port'),
        'database' => config('database.connections.mysql.database'),
        'username' => config('database.connections.mysql.username'),
    ];
});

Route::get('/questionaire/create', [QuestionaireController::class, 'create'])->name('questionaire.create');
Route::post('/questionaire', [QuestionaireController::class, 'store'])->name('questionaire.store');

<?php

use App\Http\Controllers\PetController;
use App\Services\Examen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    $examen = new Examen();

    $repsonse = $examen->execute(
        //0,0,0,0
        6, 3, 1, 10 
        //3, 3, 0, 10 
    );

    return $repsonse;
});

Route::resource('pets', PetController::class)->names('pets');

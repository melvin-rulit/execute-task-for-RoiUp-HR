<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/{link}', App\Actions\ShowUserAction::class);




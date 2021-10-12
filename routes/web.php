<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return ['success'];
});
Route::get('/register', \App\Http\Livewire\Auth\Register::class);

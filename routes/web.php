<?php

use Illuminate\Support\Facades\Route;

// Make github-clone index the landing page
Route::get('/', function () {
    return view('github-clone.index');
});

// Remove any other routes that might conflict with the landing page
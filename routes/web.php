<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('members.index');
});


Route::get('/', function () {
    return view('welcome');
});


Route::resource('members', MemberController::class);

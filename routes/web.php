<?php

use App\Http\Controllers\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfesseurController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/professeur',[ProfesseurController::class,'index'])->name('professeur.index');
Route::get('/professeur/create',[ProfesseurController::class,'create'])->name('professeur.create');
Route::post('/professeur/store',[ProfesseurController::class,'store'])->name('professeur.store');
Route::delete('/professeur/delete/{professeur}',[ProfesseurController::class,'delete'])->name('professeur.delete');
Route::get('/professeur/edit/{professeur}',[ProfesseurController::class,'edit'])->name('professeur.edit');
Route::post('/professeur/update/{professeur}',[ProfesseurController::class,'update'])->name('professeur.update');
<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\organization\OpporunityController;
use App\Http\Controllers\organization\OrganizationProfileController;
use App\Http\Controllers\volunteer\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [OpporunityController::class, 'list'])->name('home');



Route::get('/register/{role}', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register/volunteer', [AuthController::class, 'registerVolunteer'])->name('register.volunteer');
Route::post('/register/organization', [AuthController::class, 'registerOrganization'])->name('register.organization');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// google authentification
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// profile volunteer
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

// profile organization
Route::get('/organization', [OrganizationProfileController::class, 'index'])->name('organization.index');
Route::post('/organization', [OrganizationProfileController::class, 'store'])->name('organization.store');

// opportunity

Route::get('/opportunity', [OpporunityController::class, 'index'])->name('opportunity.index');
Route::get('/opportunity/add', [OpporunityController::class, 'create'])->name('opportunity.create');

Route::post('/opportunity', [OpporunityController::class, 'store'])->name('opportunity.store');
Route::get('/opportunities',[OpporunityController::class, 'list'])->name('opportunities.list');
Route::get('/opportunities/{id}',[OpporunityController::class, 'show'])->name('opportunities.show');
Route::delete('/opportunities/{id}',[OpporunityController::class, 'destroy'])->name('opportunities.destroy');
Route::get('/opportunity/edit/{id}', [OpporunityController::class, 'edit'])->name('opportunity.edit');
Route::put('/opportunity/update/{id}',[OpporunityController::class, 'update'])->name('opportunity.update');
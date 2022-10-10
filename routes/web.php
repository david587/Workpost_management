<?php

use App\Models\Listing;
use App\Models\Listing2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// Index-show all listings
// Show-show single listings
// Create-show form to create new listing
// Store- Store new listing
// Edit- Show form to edit listing
// Update- update listing
// Destroy -Delete listing

//All Listings
Route::get("/", [ListingController::class,"index"]);

//show create Form
Route::get("/listings/create", [ListingController::class,"create"]);

//Store Listing Data
Route::post("/listings",[ListingController::class,"store"]);

//Show edit form
Route::get("/listings/{listing}/edit",[ListingController::class,"edit"]);

//Update Listing
Route::put("/listings/{listing}",[ListingController::class, "update"]);

//Delete Listing
Route::delete("/listings/{listing}",[ListingController::class, "destroy"]);

//Single Listing
Route::get("/listings/{listing}",[ListingController::class,"show"]);

//Show register create form
Route::get("/register",[UserController::class,"create"]);

//Create new User
Route::post("/users", [UserController::class, "store"]);

//Logout
Route::post("/logout",[UserController::class, "logout"]);

//Show login Form
Route::get("/login",[UserController::class, "login"]);

//Log in user
Route::post("/users/authenticate",[UserController::class,"authenticate"]);
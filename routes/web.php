<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing2;

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


//Single Listing
Route::get("/listings/{listing}",[ListingController::class,"show"]);


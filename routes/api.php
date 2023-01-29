<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get("/single-banner/{id?}", [FrontendController::class, "singleBanner"]);
Route::get("/banners", [FrontendController::class, "allBanners"]);
Route::get("/services", [FrontendController::class, "allservices"]);
Route::get("/projects", [FrontendController::class, "projects"]);
Route::get("/testimonials", [FrontendController::class, "testimonials"]);
Route::get("/team", [FrontendController::class, "teams"]);
Route::post("/contact-form", [FrontendController::class, "contactForm"]);
Route::post("/quote", [FrontendController::class, "quote"]);
Route::get("/partners", [FrontendController::class, "partners"]);

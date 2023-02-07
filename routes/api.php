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

Route::post("/store-newsletter", [FrontendController::class, "storeNewsletter"]);
Route::get("/page/{slug}", [FrontendController::class, "page"]);
Route::get("/blogs/limit={limit?}", [FrontendController::class, "blogs"]);
Route::get("/blogs/{slug}", [FrontendController::class, "blogDetail"]);
Route::get("/testimonials", [FrontendController::class, "testimonials"]);
Route::get("/single-banner/{id?}", [FrontendController::class, "singleBanner"]);
Route::get("/banners", [FrontendController::class, "allBanners"]);
Route::get("/services/limit={limit?}", [FrontendController::class, "allservices"]);
Route::get("/projects/limit={limit?}", [FrontendController::class, "projects"]);
Route::get("/all-projects", [FrontendController::class, "allprojects"]);
Route::get("/team", [FrontendController::class, "teams"]);
Route::post("/contact-form", [FrontendController::class, "contactForm"]);
Route::post("/quote", [FrontendController::class, "quote"]);
Route::get("/partners", [FrontendController::class, "partners"]);
Route::get("/stacks", [FrontendController::class, "stacks"]);
Route::get("/about-us", [FrontendController::class, "about"]);

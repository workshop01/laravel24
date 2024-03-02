<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;

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



Route::get('/' , [MainController::class , 'home'])->name('index');

Route::get('/contact' , [MainController::class , 'contact'])->name('contact');
Route::get('/product/{id}' , [MainController::class , 'product'])->name('product');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/list_produits' , [HomeController::class , 'list_produits'])->name('list_produits');
Route::get('/ajouter_produit' , [HomeController::class , 'ajouter_produit'])->name('ajouter_produit');


Route::post('save_produit' , [HomeController::class , 'save_produit'])->name('save_produit');
Route::post('edit_produit/{id}' , [HomeController::class , 'edit_produit'])->name('edit_produit');

Route::delete('delete_produit/{id}' , [HomeController::class , 'delete_produit'] )->name('delete_produit');

Route::get('/list_categories' , [CategoryController::class , 'list_categories'])->name('list_categories');
Route::get('/ajouter_categorie' , [CategoryController::class , 'ajouter_categorie'])->name('ajouter_categorie');


Route::post('save_categorie' , [CategoryController::class , 'save_categorie'])->name('save_categorie');
Route::post('edit_categorie/{id}' , [CategoryController::class , 'edit_categorie'])->name('edit_categorie');

Route::delete('delete_categorie/{id}' , [CategoryController::class , 'delete_categorie'] )->name('delete_categorie');


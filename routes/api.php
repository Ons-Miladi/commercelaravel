<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//gérer products
Route::get('getProducts/{id}','ProductController@getProducts');
Route::get('getProductById/{id}','ProductController@getProductById');
Route::post('addProduct','ProductController@addProduct');
Route::put('updateProduct/{id}','ProductController@updateProduct');
Route::delete('deleteProduct/{id}','ProductController@deleteProduct');
//gérer categoris
Route::post("AddCategorie","CategorieController@AddCategorie");
Route::get("getCategories","CategorieController@getCategories");
Route::get("getCategorieById/{id}","CategorieController@getCategorieById");
Route::put("updateCategorie/{id}","CategorieController@updateCategorie");
Route::delete("deleteCategorie/{id}","CategorieController@deleteCategorie");
//gérer sous categories
Route::get('getSousCategories/{id}','SousCategorieController@getSousCategories');
Route::post('AddSouscategorie','SousCategorieController@AddSouscategorie');
Route::delete('deletSouscat/{id}','SousCategorieController@deletSouscat');
Route::get('getSouscategorieById/{id}','SousCategorieController@getSouscategorieById');
Route::put('updateSousCategorie/{id}','SousCategorieController@updateSousCategorie');


Route::put('UserConnexion','ClientController@UserConnexion');
Route::post('Clientinscription','ClientController@Clientinscription');


Route::post('AddcaractProduit','CaractController@AddcaractProduit');
Route::delete('deletecaract/{id}','CaractController@deletecaract');
Route::put('updateCaract/{id}','CaractController@updateCaract');
Route::get('getCaract/{id}','CaractController@getCaractById');
Route::get('getcarectristiques/{id}','CaractController@getCaract');


Route::get('joincategsouscateg','ClientController@joincategsouscateg');
Route::get('getCaracteristiquesByJointure/{id}','CaractController@getCaracteristiquesByJointure');



Route::post('AddProductToPanier','ClientController@AddProductToPanier');
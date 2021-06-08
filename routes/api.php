<?php

use App\Models\produtos;
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
Route::get('/teste', function(Request $request){
    //dd($request->headers->all());
    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha primeira api']));
    $response->header('Content-Type', 'application/json');
    return $response;
});
Route::get('produtos', 'api\\produtosController@index');
Route::post('produtos', 'api\\produtosController@save');
Route::get('produtos/{id}', 'api\\produtosController@show');
Route::PUT('produtos', 'api\\produtosController@update');
Route::delete('produtos/{id}', 'api\\produtosController@destroy');

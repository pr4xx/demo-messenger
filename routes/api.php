<?php

use App\Http\Controllers\ConversationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('conversations', [ConversationController::class, 'index']);
/*
    Route::delete('conversations/{conv}', [ConversationController::class, 'destroy']);
    Either, change conv --> conversation 
    or make a change in ConversationController@destroy input by changing conversation --> conv
*/
Route::delete('conversations/{conversation}', [ConversationController::class, 'destroy']);


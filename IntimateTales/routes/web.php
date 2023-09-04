```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\InteractionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('characters', CharacterController::class);
Route::resource('stories', StoryController::class);
Route::resource('progress', ProgressController::class);
Route::resource('interactions', InteractionController::class);
```
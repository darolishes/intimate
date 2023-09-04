```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\ApiController;

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

Route::apiResource('characters', CharacterController::class);
Route::apiResource('stories', StoryController::class);
Route::apiResource('progress', ProgressController::class);
Route::apiResource('interactions', InteractionController::class);

Route::get('sync', [ApiController::class, 'sync']);
```

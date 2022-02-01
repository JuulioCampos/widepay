<?php

use Illuminate\Support\Facades\Route;
use App\Models\VerifyUrl;
use App\Models\Url;
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
    return redirect('/dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data = VerifyUrl::get()->all();
    $urls = collect(Url::get()->all());
    dd($urls->toArray());
    collect($data)->toArray();
    return view('dashboard', $data)->with(['data' => $data]);
})->name('dashboard');

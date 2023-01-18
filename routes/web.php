<?php

use App\Models\Category;
use App\Models\History;
use Illuminate\Support\Facades\Route;

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

    $incoming = History::where('type','Incoming')->where('user_id',auth()->id())->sum('amount');
    $outgoing = History::where('type','Outgoing')->where('user_id',auth()->id())->sum('amount');
    $categories = Category::all();
    return view('welcome',compact(['incoming','outgoing','categories']));
});
Route::get('command', function () {

	

	/* php artisan migrate */

    \Artisan::call('shield:super-admin --user=1');

    dd("Done");

});

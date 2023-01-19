<?php

use App\Models\Category;
use App\Models\History;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
})->name('dashboard')->middleware('auth');
Route::get('/add', function () {
    $categories = Category::all();
    return view('add',compact(['categories']));
})->name('add')->middleware('auth');
Route::post('/store', function (Request $request) {
    $history = new History();
    $history->title = $request->input('title');
    $history->category_id = $request->input('category_id');
    $history->user_id = $request->input('user_id');
    $history->type = $request->input('type');
    $history->amount = $request->input('amount');
    $history->date = $request->input('date');
    $history->note = $request->input('note');
    $history->save();
    return redirect()->route('dashboard');
})->name('store.h')->middleware('auth');
Route::get('/incoming/{slug}', function ($slug) {
    $category = Category::where('slug',$slug)->first();
    $type = "Incoming";
    return view('table',compact(['category','type']));
})->name('incoming.category')->middleware('auth');
Route::get('/Outgoing/{slug}', function ($slug) {
    $category = Category::where('slug',$slug)->first();
    $type = "Outgoing";
    return view('table',compact(['category','type']));
})->name('outgoing.category')->middleware('auth');
Route::get('/due/{slug}', function ($slug) {
    $category = Category::where('slug',$slug)->first();
    $type = "Due";
    return view('table',compact(['category','type']));
})->name('due.category')->middleware('auth');
Route::get('/upcoming/{slug}', function ($slug) {
    $category = Category::where('slug',$slug)->first();
    $type = "Upcoming";
    return view('table',compact(['category','type']));
})->name('upcoming.category')->middleware('auth');
Route::get('/login', function () {
    return redirect('/admin');
})->name('login');




<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\HTTP\Response;

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

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', ['tasks'=> \App\Models\Task::latest()->get()]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id){
    return view('show', [
        'task'=> \App\Models\Task::findOrFail($id)
     ]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request){
    dd($request->all());
})->name('tasks.store');


Route::fallback(function(){
    return 'Page not found';
});


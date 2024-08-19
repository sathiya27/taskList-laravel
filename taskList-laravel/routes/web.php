<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\HTTP\Response;
use App\Models\Task;

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
    return view('index', ['tasks'=> Task::latest()->get()]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id){
    return view('show', [
        'task'=> Task::findOrFail($id)
     ]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request){

    $data = $request->validate([
        'title'=> 'required|max:255',
        'description'=> 'required',
        'long_description'=> 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id'=> $task->id])->with('success','Task has been created');
    
})->name('tasks.store');


Route::fallback(function(){
    return 'Page not found';
});


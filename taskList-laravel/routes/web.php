<?php

use App\Http\Requests\TaskRequest;
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

Route::get('/tasks/{task}', function(Task $task){
    return view('show', [
        'task'=> $task
     ]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){

    /* $data = $request->validated();
     $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();  */
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task'=> $task->id])->with('success','Task has been created');
    
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function(Task $task){
    return view('edit', ['task'=>$task]);
})->name('tasks.edit');

Route::put('tasks/{task}/edit', function(Task $task, TaskRequest $request){

    /* $data = $request->validated();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save(); */
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task'=> $task->id])->with('success', 'Task has been updated successfully.');
})->name('tasks.update');


route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task has been deleted successfully.');
})->name('tasks.destroy');


Route::fallback(function(){
    return 'Page not found';
});


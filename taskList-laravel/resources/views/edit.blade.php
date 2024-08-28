@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    
@endsection

@section('content')

    <form action="{{ route('tasks.update', ['task'=> $task->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text", name="title" id="title" value="{{$task->title}}" @class(['border-red-500'=> $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500'=>$errors->has('description')])>{{$task->description}}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500'=>$errors->has('long_description')])>{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <button class="btn" type="submit">Edit Task</button>
    </form>

@endsection
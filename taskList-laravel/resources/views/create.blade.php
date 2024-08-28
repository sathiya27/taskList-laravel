@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    
@endsection

@section('content')

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text", name="title" id="title" value="{{ old('title') }}" @class(['border-red-500'=> $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500'=> $errors->has('description')])>{{old('description')}}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div >

        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500'=>$errors->has('long_description')])>{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button class="btn" type="submit">Add Task</button>
            <a class="btn" href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>

@endsection
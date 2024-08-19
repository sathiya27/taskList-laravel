@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text", name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description"></textarea>
        </div>

        <button type="submit">Add Task</button>
    </form>

@endsection
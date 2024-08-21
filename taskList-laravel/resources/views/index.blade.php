@extends('layouts.app')

@section('title', 'List of Tasks')

@section('content')
    <div>
            @forelse($tasks as $task)
                <div>
                    <a href="{{route('tasks.show',['task'=> $task->id])}}">{{$task->title}}</a>
                </div>
            @empty
                <div>There is no task</div>
            @endforelse
    </div>
@endsection
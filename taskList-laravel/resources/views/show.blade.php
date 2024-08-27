@extends('layouts.app')

@section('title', $task->title)

 <div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go Back</a>
 </div>


@section('content')
    <p class="mb-4 text-slate-700">{{$task->description}}</p>
    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif

    <p class="mb-4 text-sm text-slate-700"> Created: {{$task->created_at->diffForHumans()}} - updated: {{$task->updated_at->diffForHumans()}}</p>

    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex items-start gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task'=> $task]) }}">Edit Task</a>
        <form action="{{ route('tasks.toggle-completed', ['task'=> $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
       <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete Task</button>
       </form>
    </div>
@endsection
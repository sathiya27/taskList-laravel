@extends('layouts.app')

@section('title', $task->title)


@section('content')
    <p>{{$task->description}}</p>
    @if($task->long_description)
        {{$task->long_description}}
    @endif
    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <p>
        {{$task->completed ? 'Task is completed' : 'Task is not completed'}}
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task'=> $task]) }}">Edit Task</a>
    </div>
    <br>

    <form action="{{ route('tasks.toggle-completed', ['task'=> $task]) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'completed'}}
        </button>
    </form>
    <div>
       <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
       </form>
    </div>
@endsection
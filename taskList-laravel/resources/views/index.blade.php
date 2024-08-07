hello im a blade template. 


<div>
        @forelse($tasks as $task)
            <div>
                <a href="{{route('tasks.show',['id'=> $task->id])}}">{{$task->title}}</a>
            </div>
        @empty
            <div>There is no task</div>
        @endforelse
</div>

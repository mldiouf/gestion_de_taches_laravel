@extends('layouts.app')

@section('content')
    <h1>Tasks List</h1>

    @foreach ($tasks as $task)
    <div class="card @if($task->isCompleted()) border-success @endif">
        <div class="card-body">
            <p>
                {{$task->description}}
            </p>
            <form action="/tasks/{{$task->id}}" method="POST">
                @method('PATCH')
                @csrf
            @if(!$task->isCompleted())
                <button class="btn btn-light w-100" input="submit">complete</button>
            </form>
            @else
            <form action="/tasks/{{$task->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger w-100" input="submit">Delete</button>
            </form>           

            @endif
        </div>
    </div>
    @endforeach
    <a href="/tasks/create" class="btn btn-primary btn-lg btn-block mt-2">new task</a>
@endsection

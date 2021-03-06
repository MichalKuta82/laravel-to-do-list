@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks
                	<a href="{{route('tasks.create')}}" class="btn btn-secondary btn-sm float-right">Add Task</a>
                </div>

                <div class="card-body">
                    <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Content</th>
					      <th scope="col">Status</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($tasks as $task)
					    <tr>
					      <th scope="row">{{$task->id}}</th>
					      <td><a href="{{route('tasks.show', $task->id)}}">{{$task->title}}</a></td>
					      <td>{{$task->content}}</td>
					      <td>{{$task->status}}</td>
					      <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
					      <td>
					      	<form method="POST" action="{{route('tasks.destroy', $task->id)}}">
					      		@csrf
					      		@method('DELETE')
					      		<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					      	</form> 	  
					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
					{{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
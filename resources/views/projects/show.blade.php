@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Project Title:</h5><p>{{$project->title}}</p></div>

                <div class="card-body">
                	<h5>Project Description:</h5>
                	<p>{{$project->content}}</p>
                </div>

                <div class="card-header">Project Tasks:
	                	<a href="{{route('tasks.create', $project->id)}}" class="btn btn-secondary btn-sm float-right">Add Task</a>
                </div>
                <div class="card-body">
                	<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Content</th>
					      <th scope="col">Project</th>
					      <th scope="col">Status</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($tasks as $task)
					    <tr>
					      <th scope="row">{{$task->id}}</th>
					      <td><a href="{{route('tasks.show', $task->id)}}">{{str_limit($task->title, 15)}}</a></td>
					      <td>{{str_limit($task->content, 55)}}</td>
					      <td>
					      	@if($task->project)
					      	 <a href="{{route('projects.show', $project->id)}}">{{str_limit($task->project->title, 15)}}</a>
					      	@else
					      	 'No project'
					      	@endif
					      </td>
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
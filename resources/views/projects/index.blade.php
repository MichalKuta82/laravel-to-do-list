@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Projects
                	<a href="{{route('projects.create')}}" class="btn btn-secondary btn-sm float-right">Add Project</a>
                </div>

                <div class="card-body">
                    <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Content</th>
					      <th scope="col">Author</th>
					      <th scope="col">Tasks</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($projects as $project)
					    <tr>
					      <th scope="row">{{$project->id}}</th>
					      <td><a href="{{route('projects.show', $project->id)}}">{{$project->title}}</a></td>
					      <td>{{$project->content}}</td>
					      <td>{{$project->user ? $project->user->name : 'No user'}}</td>
					      <td>{{count($project->tasks)}}</td>
					      <td><a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
					      <td>
					      	<form method="POST" action="{{route('projects.destroy', $project->id)}}">
					      		@csrf
					      		@method('DELETE')
					      		<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					      	</form> 	  
					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
					{{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
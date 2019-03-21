@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>

				<div class="card-body">
				    @if ($errors->any())
				      <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				              <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				      </div><br />
				    @endif
				      <form method="POST" action="{{ route('tasks.update', $task->id) }}">
				      	@method('PATCH')
				          <div class="form-group">
				              @csrf
				              <label for="title">Task Name:</label>
				              <input type="text" class="form-control" name="task-title" value="{{$task->title}}"/>
				          </div>
				          <div class="form-group">
				              <label for="content">Project Content:</label>
				              <textarea rows="4" class="form-control" name="task-content"/>{{$task->content}}</textarea>
				          </div>
				          <button type="submit" class="btn btn-primary">Update</button>
				      </form>
				 </div>

            </div>
        </div>
    </div>
</div>
@endsection
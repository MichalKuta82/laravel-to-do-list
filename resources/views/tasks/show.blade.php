@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Task Title:</h5><p>{{$task->title}}</p></div>

                <div class="card-body">
                	<h5>Task Description:</h5>
                	<p>{{$task->content}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
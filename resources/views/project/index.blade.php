@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('project.create')}}" class="btn btn-primary float-right">New project</a>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of projects</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('project.edit', ['project' => $project->id])}}">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection

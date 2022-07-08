@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Task</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{url()->previous()}}" class="btn btn-default float-right">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a new task</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('task.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group col-lg-4">
                        <label for="project_id">Project*</label>
                        <select id="project_id" name="project_id" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" @if(old('project_id') == $project->id) selected @endif>{{$project->name}}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="team_id">Team</label>
                        <select id="team_id" name="team_id" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($teams as $team)
                                <option value="{{$team->id}}" @if(old('team_id') == $team->id) selected @endif>{{$team->name}}</option>
                            @endforeach
                        </select>
                        @error('team_id')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @error('title')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="description">Description*</label>
                        <textarea rows="4" type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="deadline">Deadline*</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{old('deadline')}}">
                        @error('deadline')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="type">Type*</label>
                        <select id="type" name="type" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($types as $type)
                                <option value="{{$type->value}}" @if(old('type') == $type->value) selected @endif>{{$type->name}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="priority">Priority*</label>
                        <select id="priority" name="priority" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($priorities as $priority)
                                <option value="{{$priority->value}}" @if(old('priority') == $priority->value) selected @endif>{{$priority->name}}</option>
                            @endforeach
                        </select>
                        @error('priority')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="status">Status*</label>
                        <select id="status" name="status" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($statuses as $status)
                                <option value="{{$status->value}}" @if(old('priority') == $status->value) selected @endif>{{$status->name}}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer col-lg-4" style="background-color: #fff">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection

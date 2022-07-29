@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teams</h1>
                </div>
                <div class="col-sm-6">
                    <button form="deleteForm" onclick="deleteTask()" type="submit" class="btn btn-danger float-right">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>

                    <a href="{{url()->previous()}}" class="btn btn-default float-right mr-2">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                    <form id="deleteForm" class="hidden" action="{{route('task.destroy', ['task' => $task->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update task | {{$task->title}}</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('task.update', ['task' => $task->id])}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group col-lg-4">
                        <label for="project_id">Project*</label>
                        <select id="project_id" name="project_id" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" @if($task->project->id == $project->id) selected @endif>{{$project->name}}</option>
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
                                <option value="{{$team->id}}" @if($task->team?->id == $team->id) selected @endif>{{$team->name}}</option>
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
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $task->title}}">
                        @error('title')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="description">Description*</label>
                        <textarea rows="4" type="password" class="form-control" id="description" name="description">{{old('description') ?? $task->description}}</textarea>
                        @error('description')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="deadline">Deadline*</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{old('deadline') ?? $task->deadline}}">
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
                                <option value="{{$type->value}}" @if($task->type->value == $type->value) selected @endif>{{$type->name}}</option>
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
                                <option value="{{$priority->value}}" @if($task->priority->value == $priority->value) selected @endif>{{$priority->name}}</option>
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
                                <option value="{{$status->value}}" @if($task->status->value == $status->value) selected @endif>{{$status->name}}</option>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('third_party_scripts')
    <script>
        function deleteTask() {
            event.preventDefault();
            Swal.fire({
                showCloseButton: true,
                showCancelButton: true,
                title: 'Warning!',
                text: 'Do you want to delete this task?',
                icon: 'warning',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if(result.isConfirmed) {
                    $( "#deleteForm" ).submit();
                }
            })
        }
    </script>
@endsection

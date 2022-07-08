@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teams</h1>
                </div>
                <div class="col-sm-6">
                    <button form="deleteForm" onclick="deleteTeam()" type="submit" class="btn btn-danger float-right">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>

                    <a href="{{url()->previous()}}" class="btn btn-default float-right mr-2">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                    <form id="deleteForm" class="hidden" action="{{route('team.destroy', ['team' => $team->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update project {{$team->name}}</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('team.update', ['team' => $team->id])}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group col-lg-4">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$team->name ?? old('name')}}">
                        @error('name')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="description">Description*</label>
                        <textarea rows="4" type="password" class="form-control" id="description" name="description">
                            {{$team->description ?? old('description')}}
                        </textarea>
                        @error('description')
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

@section('third_party_scripts')
    <script>
        function deleteTeam() {
            event.preventDefault();
            Swal.fire({
                showCloseButton: true,
                showCancelButton: true,
                title: 'Warning!',
                text: 'Do you want to delete this team?',
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

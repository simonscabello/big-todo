@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
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
            <h3 class="card-title">Create a new project</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('project.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group col-lg-4">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        @error('name')
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
                        <label for="repository_link">Repository Link</label>
                        <input type="text" class="form-control" id="repository_link" name="repository_link" value="{{old('repository_link')}}">
                        @error('repository_link')
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="color">Color*</label>
                        <input name="color" id="color" type="color" value="{{old('color')}}" class="form-control">
                        @error('color')
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

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">s
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
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="description">Description*</label>
                        <textarea rows="4" type="password" class="form-control" id="description" name="description" value="{{old('name')}}">

                        </textarea>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="color">Color*</label>
                        <input name="color" id="color" type="color" value="{{old('color')}}" class="form-control">
                    </div>
                </div>

                <div class="card-footer col-lg-4" style="background-color: #fff">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection

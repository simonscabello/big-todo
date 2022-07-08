@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teams</h1>
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
            <h3 class="card-title">Create a new team</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('team.store')}}">
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
                        <textarea rows="4" type="password" class="form-control" id="description" name="description" value="{{old('description')}}">

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

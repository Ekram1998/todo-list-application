@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todos Create List</div>

                    <div class="card-body">
                        <a href="{{url('todos/')}}" class="btn btn-info" title="Back to home"><i class="fa fa-plus" aria-hidden="true"></i>Back To Home</a> <br> <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url("/todos")}}">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Description</label>
                              <textarea name="description" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todos Edit List</div>

                    <div class="card-body">
                        <form action="{{ url('todos/' .$todos->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="todo_id" value="{{$todos->id}}">
                            <div class="mb-3">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="title" value="{{$todos->title}}">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Description</label>
                              <textarea name="description" cols="5" rows="5" class="form-control">
                                {{$todos->description}}
                              </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="is_completed" class="form-control">
                                    <option value="disable selected">Select Option</option>
                                    <option value="1">Completed</option>
                                    <option value="0">IN Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

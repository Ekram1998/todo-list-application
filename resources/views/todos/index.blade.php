@extends('layouts.app')

@section('styles')
    <style>
        #outer {
            width: auto;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todos App</div>
                    <div class="card-body">
                        <a href="{{url('todos/create')}}" class="btn btn-success" title="Add New Todo">Add New Todo</a>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (count($todos) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Completed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $todo->title }}</td>
                                            <td>{{ $todo->description }}</td>
                                            <td>
                                                @if ($todo->is_completed == 1)
                                                    <a class="btn btn-sm btn-success" href="">Completed</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger" href="">In Completed</a>
                                                @endif
                                            </td>
                                            <td id="outer">
                                                <a class="inner btn btn-sm btn-success" href="{{URL::to('todos/' . $todo->id)}}">View</a>
                                                <a class="inner btn btn-sm btn-info" href="{{URL::to('todos/' . $todo->id . '/edit')}}">Edit</a>
                                                {{-- <form action="" class="inner">
                                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                </form> --}}

                                                <form class="inner" method="POST" action="{{ url('/todos' . '/' . $todo->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>No Todos Created Yet</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

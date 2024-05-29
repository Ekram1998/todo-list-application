@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo List App</div>
                <div class="card-body">
                    <a href="{{url()->previous()}}" class="btn btn-info">Go Home</a> <br>
                    <b>Your Todo Title is :</b> {{$todos->title}} <br>
                    <b>Your Todo Description is :</b> {{$todos->description}} <br>
                    <b>Is it Completed :</b> {{$todos->is_completed}} <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

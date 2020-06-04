@extends('layouts.app')

{{-- {{ Auth::user() }} --}}

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <strong class="text-justify">
                {{ Auth::user()->name }}
            </strong>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <div class="col-md-4 col-sm-12">
                        <label for="">ID</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="username">Name</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
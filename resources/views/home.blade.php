@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-end">
    <a href=" {{ route('discussions.create') }}" class="btn btn-success mb-3">
            Add Discussion
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

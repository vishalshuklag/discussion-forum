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
           @foreach ($discussions as $discussion)
               <div class="card card-default mb-3">
                   <div class="card-header">
                   {{-- <img src="{{ Gravatar::src('01vishals@gmail.com') }}" alt="avatar"> --}}
                   
                   {{-- @if ( !Gravatar::exists($discussion->user->email) )
                        <img src="{{ Gravatar::src('01vishals@gmail.com')  }}" alt="avatar">
                   @else
                        {{$discussion->user->email}}
                   @endif --}}

                   <div class="d-flex justify-content-between">
                        <div>
                            {{$discussion->user->email}}
                            <strong class="ml-2">{{ $discussion->user->name }}</strong>
                        </div>
                        <div>
                        <a href="{{ route('discussions.show' , $discussion->slug) }}" class="btn btn-outline-dark btn-sm">View</a>
                        </div>
                   </div>
                   </div>
                   <div class="card-body">
                        {{-- {!! $discussion->title !!} --}}
                        {{ $discussion->title }}
                   </div>
               </div>
           @endforeach
        </div>
    </div>
</div>
@endsection

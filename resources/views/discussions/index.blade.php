@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-between my-4">
        <div>
            <p class="h3">
                Discussion Questions
            </p>
        </div>
        <div>
            @auth
                <a href=" {{ route('discussions.create') }}" class="btn btn-success mb-3">
                    Add Discussion
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                    Please Log In to Start Discussion
                </a>
            @endauth
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
           @foreach ($discussions as $discussion)
               {{-- <div class="card card-default mb-3">
                   <div class="card-header"> --}}
                   {{-- <img src="{{ Gravatar::src('01vishals@gmail.com') }}" alt="avatar"> --}}
                   
                   {{-- @if ( !Gravatar::exists($discussion->user->email) )
                        <img src="{{ Gravatar::src('01vishals@gmail.com')  }}" alt="avatar">
                   @else
                        {{$discussion->user->email}}
                   @endif --}}

                   {{-- <div class="d-flex justify-content-between">
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
                        {{ $discussion->title }}
                   </div>
               </div> --}}

               <blockquote class="blockquote ">
                <p class="mb-0"> {{ $discussion->title }} </p>
                <footer class="blockquote-footer"> {{$discussion->user->email}} <cite title="Source Title">{{ $discussion->user->name }}</cite>
                    <a href="{{ route('discussions.show' , $discussion->slug) }}" class="btn btn-outline-secondary btn-sm float-right">View</a>
                </footer>
              </blockquote>
              <hr class="my-2">
           @endforeach
           {{ $discussions->appends( ['channel' => request()->query('channel')] )->links() }}
        </div>
    </div>
</div>
@endsection

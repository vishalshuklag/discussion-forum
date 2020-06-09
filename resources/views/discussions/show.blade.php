@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column mt-3">
        <div class="p-2">
            <p class="h4">
                {{ $discussion->title }}
            </p>
            <p class="text-muted">
                Asked <span class="h6 mx-2" title="{{ $discussion->created_at }}">{{ $discussion->created_at->diffForHumans() }}</span>
            </p>
            <hr>
        </div>
            
        <div class="p-0">
            {!! $discussion->content !!}

            <div class="d-flex justify-content-end m-0 p-0">
                <div class="card bg-light" style="max-width: 18rem;">
                    <div class="card-body">
                      <h6 class="card-title">{{ $discussion->user->name }}</h6>
                      <p class="card-text">{{$discussion->user->email}}</p>
                      
                    </div>
                  </div>
            </div>
            <div class="border-bottom p-3">
                @if ($discussion->bestReply)
                    <h4 class="text-success">
                        Best Reply
                    </h4>
                    <p class="text-justify">
                        {!! $discussion->bestReply->content !!}
                        <span class="float-right blockquote-footer">
                            By : 
                            {{ $discussion->bestReply->owner->name  }} &nbsp;&nbsp;&nbsp;
                            {{ $discussion->bestReply->owner->email  }}
                        </span>
                    </p>
                @endif
            </div>
        </div>

            @foreach ($discussion->replies as $reply)
                <div class="d-flex flex-column mb-2">
                    <div class="p-2 border-bottom">
                        <p>
                            {!! $reply->content !!}
                            <span class="float-right blockquote-footer" title="{{ $reply->created_at }}">
                                {{ $reply->owner->name }} &nbsp;
                                {{ $reply->created_at->diffForHumans() }}
                                
                                @auth
                                    @if (auth()->user()->id == $discussion->user_id)
                                        <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="ml-4 btn btn-sm btn-info">
                                                Mark as best reply
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
    </div>
    <div class="d-flex flex-column">
        <div class="p-2 border">
            @auth
            <p class="h3 mb-3">
                Your Answer 
            </p>
            <form action="{{ route('replies.store', $discussion->slug)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input id="content" type="hidden" name="content" class="@error('content') is-invalid @enderror">
                    <trix-editor input="content"></trix-editor>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Post Your Answer</button>
                </div>
            </form>
            @else
                <div class="d-flex justify-content-start">
                <a href="{{ route('login') }}" class="btn btn-info btn-sm">Please sign in to add reply</a>
                </div>
            @endauth  
        </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"/>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection

{{-- <div class="card card-default mb-3">
                   <div class="card-header">

                   <div class="d-flex justify-content-between">
                        <div>
                            {{$discussion->user->email}}
                            <strong class="ml-2">{{ $discussion->user->name }}</strong>
                        </div>
                        <div>
                        </div>
                   </div>
                   </div>
                   <div class="card-body">
                        {{ $discussion->title }}
                        <hr>
                        {!! $discussion->content !!}
                   </div>
               </div> --}}

               {{-- <div class="card card-default">
                   <div class="card-header">
                       Add a reply
                   </div>
                   <div class="card-body">
                    @auth
                    <form action="{{ route('replies.store', $discussion->slug)}}" method="POST">
                        <div class="form-group">
                            <input id="content" type="hidden" name="content" class="@error('content') is-invalid @enderror">
                            <trix-editor input="content"></trix-editor>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success btn-sm">Add Reply</button>
                        </div>
                    </form>
                    @else
                        <div class="d-flex justify-content-start">
                        <a href="{{ route('login') }}" class="btn btn-info btn-sm">Please sign in to add reply</a>
                        </div>
                    @endauth                       
                   </div>
               </div> --}}
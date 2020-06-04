@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
               <div class="card card-default mb-3">
                   <div class="card-header">

                   <div class="d-flex justify-content-between">
                        <div>
                            {{$discussion->user->email}}
                            <strong class="ml-2">{{ $discussion->user->name }}</strong>
                        </div>
                        <div>
                        {{-- <a href="{{ route('discussions.show' , $discussion->slug) }}" class="btn btn-outline-dark btn-sm">View</a> --}}
                        </div>
                   </div>
                   </div>
                   <div class="card-body">
                        {{-- {!! $discussion->title !!} --}}
                        {{ $discussion->title }}
                        <hr>
                        {!! $discussion->content !!}
                   </div>
               </div>

               <div class="card card-default">
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
               </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css"/>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection
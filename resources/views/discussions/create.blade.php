@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Discussion</div>
                <div class="card-body">
                <form action="{{ route('discussions.insert') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        {{-- <textarea name="content" id="content" cols="5" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea> --}}
                        <input id="content" type="hidden" name="content" class="@error('content') is-invalid @enderror">
                        <trix-editor input="content"></trix-editor>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="from-group">
                        <label for="channel">Channel</label>
                        <select name="channel" id="channel" class="form-control @error('channel') is-invalid @enderror">
                            <option value="">-- SELECT --</option>
                            @foreach ($channels as $channel )
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                        </select>
                        @error('channel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success mt-2">Save</button>
                    </div>
                </form>
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
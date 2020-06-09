@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    @foreach ($notifications as $notification)
                        <div class="d-flex border-bottom justify-content-between mb-3">
                            @if ($notification->type == 'App\Notifications\NewReplyAdded')
                                <p class="text-justify">
                                    A new Reply was added to your discussion <strong>
                                        {{ $notification->data['discussion']['title']  }}
                                    </strong>
                                </p>
                                <a href="{{ route('discussions.show', $notification->data['discussion']['slug'] ) }}" class=" btn btn-primary btn-sm mb-3"> View Reply</a>
                            @endif
                            @if ($notification->type == 'App\Notifications\ReplyMarkedAsBestReply')
                            <p class="text-justify">
                                Your reply to the discussion <strong>
                                    {{ $notification->data['discussion']['title']  }}
                                </strong>
                                was marked as best reply.
                            </p>
                            <a href="{{ route('discussions.show', $notification->data['discussion']['slug'] ) }}" class=" btn btn-primary btn-sm mb-3"> View Reply</a>
                            @endif
                            {{-- {{$notification->type}} --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

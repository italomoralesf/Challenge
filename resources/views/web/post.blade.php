@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><em>por</em> <a href="{{ route('author', $post->author_slug) }}">{{ $post->author }}</a></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>
                                {{ $post->title }}
                                @if( ! Auth::guest() && $post->user_id === auth()->user()->id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary pull-right"> 
                                    Editar 
                                </a> 
                                @endif
                            </h2>
                            <p class="alert alert-info">
                                {{ $post->excerpt }}
                            </p>
                            {!! $post->body !!}
                        </div>
                        @if($post->twitter)
                            @include('partials.twitter')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

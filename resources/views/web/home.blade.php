@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Últimos artículos</div>

                <div class="panel-body">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-sm-4">
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->excerpt }}</p>
                            <a href="{{ route('post', $post->slug) }}" class="btn btn-primary pull-right">ver más</a>
                        </div>
                        @endforeach
                        <div class="col-xs-12">
                            {!! $posts->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

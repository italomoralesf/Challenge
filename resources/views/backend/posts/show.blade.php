@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Panel administrativo</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>
                                {{ $post->title }}
                                <div class="btn-group pull-right"> 
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Editar</a>
                                    <a href="{{ route('posts.index') }}" class="btn btn-default">Artículos</a>
                                </div>
                            </h2>
                            <div><strong>Resumen:</strong> {!! $post->excerpt !!}</div>
                            <div><strong>Artículo:</strong> {!! $post->body !!}</div>
                        </div>
                        <div class="col-sm-4">
                            @include('backend.posts.partials.aside')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Panel administrativo
                    <span class="pull-right">
                        {{ $posts->total() }} artículos | página {{ $posts->currentPage() }} de {{ $posts->lastPage() }}
                    </span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>
                                Acceso directo
                                <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">Nuevo</a>
                            </h2>                            
                            <table class="table table-hover table-striped"> 
                                <thead> 
                                    <tr> 
                                        <th width="20px">ID</th> 
                                        <th>Nombre del artículo</th> 
                                        <th colspan="3">&nbsp;</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($posts as $post) 
                                    <tr> 
                                        <td>{{ $post->id }}</td> 
                                        <td> <strong>{{ $post->title }}</strong> {!! $post->excerpt !!} </td> 
                                        <td width="20px"> 
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link"> 
                                                Ver 
                                            </a> 
                                        </td> 
                                        <td width="20px"> 
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link"> 
                                                Editar 
                                            </a> 
                                        </td> 
                                        <td width="20px"> 
                                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!} 
                                            <button class="btn btn-link"> Borrar </button> 
                                            {!! Form::close() !!} 
                                        </td> 
                                    </tr> 
                                    @endforeach 
                                </tbody> 
                            </table> 
                            {!! $posts->render() !!}
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

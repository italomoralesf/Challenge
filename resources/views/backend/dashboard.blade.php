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
                            <h2>Acceso directo</h2>
                            <div class="btn-group"> 
                                <a href="{{ route('profile') }}" class="btn btn-default">Perfil</a>
                                <a href="{{ route('posts.index') }}" class="btn btn-default">Artículos</a>
                            </div>
                        </div>
                        @if(Auth::user()->twitter)
                        <div class="col-sm-4">
                            <h2>Programación de Tweets</h2>
                            {!! $tweets !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

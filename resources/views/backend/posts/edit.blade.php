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
                            <h2>Edición de artículo</h2>
                            @include('errors.error')
                            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

                            @include('backend.posts.partials.form')

                            {!! Form::close() !!}
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

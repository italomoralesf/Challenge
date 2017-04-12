<div class="form-group">
	{!! Form::label('title', 'Nombre del artículo *') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('slug', 'URL amigable *') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('excerpt', 'Descripción breve *') !!}
	{!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('body', 'Descripción completa *') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>

@section('js')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
    
    $(document).ready(function(){
        $("#title").stringToSlug({
            callback: function(text){
                $('#slug').val(text);
            }
        });       
    });
</script>
@endsection()
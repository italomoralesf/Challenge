<div class="form-group">
	{!! Form::label('name', 'Nombre y Apellido') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('slug', 'URL amigable') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('twitter', 'Usuario Twitter') !!}
	{!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Sin el @']) !!}
</div>

<div class="form-group">
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>

@section('js')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#name").stringToSlug({
            callback: function(text){
                $('#slug').val(text);
            }
        });       
    });
</script>
@endsection()
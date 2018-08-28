<div class="input-field col s6">
	{!! Form::select('docente_resp', $docente, null, ['placeholder' => 'Seleccione docente', 'id' => 'docente_resp']) !!}
	{!! Form::label('docente_resp', 'Docente Responsable') !!}
</div>

<div class="input-field col s6">
	{!! Form::select('alumno', $alumno, null, ['placeholder' => 'Seleccione alumno', 'id' => 'alumno']) !!}
	{!! Form::label('alumno', 'Alumno') !!}
</div>


<script>
    $('#state').on('change', function(e){
        console.log(e);
        var state_id = e.target.value;

        $.get('{{ url('acomplentarias') }}/create/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#alumno').empty();
            $.each(data, function(index,subCatObj){
                $('#alumno').append(''+subCatObj.name+'');
            });
        });
    });
</script>
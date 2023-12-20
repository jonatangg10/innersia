$('#departamento').change(function(){
	let parametros = "id="+$('#departamento').val();
	console.log(parametros);
	$.ajax({
		data: parametros,
		url: '../ejercicio/controllers/ajax_municipios.php',
		type: 'POST',
		beforeSend: function() { },
		dataType:"json",
		success:function(response){
			// console.log(response);
			$('#Ciudad').html(response.municipio);
			$('#municipioDisplay').show();


		},
		error:function(){
			alert('ocurrio un Errorsito!!');
		}
	});
})


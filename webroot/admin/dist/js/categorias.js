/*  foto  da categoria, via ajax  */

$('.delFoto').click(function(){

	var id = $(this).val();

	$.ajax({

		method: 'POST',
		url: './categorias_fotos/del',
		data: {
			'id': id
		},
		dataType: 'json'

	});

});

$('.setCapa').click(function(){

	var id = $(this).val();

	$.ajax({

		method: 'POST',
		url: './categorias_fotos/setCapa',
		data: {
			'id': id
		},
		dataType: 'json'

	});

});

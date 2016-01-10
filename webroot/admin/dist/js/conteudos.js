/*  foto  da categoria, via ajax  */

$('.delFoto').click(function(){

	var id = $(this).val();

	$.ajax({

		method: 'POST',
		url: './conteudos_fotos/del',
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
		url: './conteudos_fotos/setCapa',
		data: {
			'id': id
		},
		dataType: 'json'

	});

});


// build 04-11-2015
// setar legenda/link AJAX
$('.legLink').submit(function(e){

	var _this = $(this);


	$.ajax({
		url: './conteudos_fotos/legLink',
		method: 'POST',
		data: _this.serialize(),
	});

	e.preventDefault();

});
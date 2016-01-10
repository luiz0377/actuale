$( "#sortable" ).sortable({

	update: function(){
		$.ajax({
			url: 'banners/posicao',
			type: 'POST',
			data: $('#sortable').sortable('serialize'),
			dataType: 'json',
			success: function(){
				$('.retorno').html("<div class='alert alert-success'>Alterações Salvas!</div>");
				$('.retorno').fadeIn('slow');
				setTimeout(function(){
					$('.retorno').fadeOut('slow');
				}, 1000);
			}
		});
	}

});
$( "#sortable" ).disableSelection();
$('#valor').mask('000.000.000.000.000,00', {reverse: true});
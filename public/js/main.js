(function () {
	var link, 
	    toggleScrollToTopLink = function () {

	    if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
			link.fadeIn(400);
	    }
	    else {
	    	link.fadeOut(400);
	    }
	};

	$(document).ready(function() {

		link = $(".scroll-top");

		$(window).scroll(toggleScrollToTopLink);
		toggleScrollToTopLink(); 

		link.on("click", function() {
			$("body").animate({scrollTop: 0});
			$("html").animate({scrollTop: 0});
		});
	});   

}) ();

//função para confirmar se deseja apagar algo
$('.apagar').on('click', function(){
    var name = $(this).data('nome'); //pega o valor do atributo data-name
    var info = name.split('-');//e aqui separa o nome da página para criar o link dinamicamente

    $('p.nome').text('Deseja apagar ' + info[1] + '?');

    var id = $(this).data('id'); //busca o valor do data-id
    $('a.apagar-sim').attr('href', '/admin/' + info[0] + '/excluir/' + id);
    $('#apagarModal').modal('show'); // modal aparece
});

//clicar na imagem e aparecer no modal
$('.imagemModal').on('click', function () {
	var imagem = $(this).data('image');
	$('img.foto').attr('src', imagem);
});
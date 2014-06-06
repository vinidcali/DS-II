function abreFreq() {
 var id = $(this).parent().parent().children(':first-child').text();
    $.post('js/teste.php', { aula: id })
        .done(function(data) {
            alert(data);
        }
    );
}

function editarConteudo() {
	var id = $(this).parent().parent().children(':first-child').text();
	alert($(this).parent().parent().children(':nth-child(3)').html(''));
}
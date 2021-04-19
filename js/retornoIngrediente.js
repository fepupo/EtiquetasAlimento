$(document).ready(function () {

    // Captura o retorno do retornaCliente.php
    $.getJSON('retornaIngrediente.php', function (data) {
        let dados = [];

        // Armazena na array capturando somente o nome do cliente
        $(data).each(function (key, value) {
            dados.push(value.descricao);
        });

        // Chamo o Auto complete do JQuery ui setando o id do input, array 
        // com os dados e o mínimo de caracteres para disparar o AutoComplete
        $('input[type=text]').autocomplete({
            source: dados,
            minLength: 3
        });
    });
});
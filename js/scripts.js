// Insere mais campos no formulário de forma dinâmica
//https://api.jquery.com/click/
let cont = 1;
$("#addCampo").click(function () {
    cont++;
    //https://api.jquery.com/append/
    $("#form_alimento").append(
        '<div class="alimentos row col-sm-12" id="alimento' + cont + '"><div class="col-sm-2"><input type="number" class="form-control boxQtd" id="qntdIngrediente' + cont + '" name="qntdIngrediente[]" placeholder="Qntd. (g)" size="10" autocomplete="on"required /></div><div class="col-sm-8"><input type="text" class="form-control box" id="txtIngredientes' + cont + '" name="txtIngredientes[]"  placeholder="Nome do Alimento"class="ui-autocomplete-input" required /></div> <div class="col-sm-2"><button id="' + cont + '" class="btnApagar btn btn-danger botao "> <i class="fas fa-minus"> </i>  </button></div></div>'
    );
    // Faz o reload do script para o autocomplete do campo
    $.getScript("./js/retornoIngrediente.js");
});

$("form").on("click", ".btnApagar", function () {
    let button_id = $(this).attr("id");
    $('#alimento' + button_id + '').remove();
});
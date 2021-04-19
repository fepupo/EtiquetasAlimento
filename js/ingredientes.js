const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

var counter = 1;
jQuery('a.add-author').click(function(event){
    event.preventDefault();
    counter++;
    var newRow = jQuery('<tr><td class="box"><input type="text" id="qntdIngrediente" name="qntdIngrediente" value="" placeholder="Qntd. (g)" size="10"/></td><td class="box"><input type="text" id="txtIngrediente" name="txtIngrediente" size="50" value="" placeholder="Nome do Alimento" /></td></tr>');
    jQuery('table.authors-list').append(newRow);
});
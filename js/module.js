
function validarEntrada(character, typeBlock){

    // converte o caractér digitado no id na tabela ASCII
    if(window.event)
    var asc = character.charCode;
    else
    var asc = character.which;

    //restringe a entrada de números pelo id na tabela ASCII
    if(asc >= 48 && asc <= 57 && typeBlock == "number")
        return false

    if((asc < 48 || asc > 57) && typeBlock == "character")
        return false
}




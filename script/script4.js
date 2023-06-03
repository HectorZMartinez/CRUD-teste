function validarInputsNew(event) {
    var error = false;
    var campoNome = document.querySelector("#nomeContato")
    var campoNumero = document.querySelector("#numeroContato")
    var campoEndereco = document.querySelector("#enderecoContato")

    if (campoNome.value.length < 3 || campoNome.value.length > 50) {
        document.querySelector("#erroNomeContato").style.display = "flex"

        campoNome.style.border = "1px solid red"
        error = true;
    } else {
        document.querySelector("#erroNomeContato").style.display = "none"

        campoNome.style.border = "1px solid green"

    }

    if (!campoNumero.checkValidity()) {
        document.querySelector("#erroNumero").style.display = "flex"

        campoNumero.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroNumero").style.display = "none"

        campoNumero.style.border = "1px solid green"

    }

    if (!campoEndereco.checkValidity()) {

        document.querySelector("#erroEndereco").style.display = "flex"

        campoEndereco.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroEndereco").style.display = "none"

        campoEndereco.style.border = "1px solid green"


    }

    if (error) {
        // event.preventDefault()
    }
}

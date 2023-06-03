function validarInputs(event) {
    var error = false;
    var campoSenha = document.querySelector("#senha")

    if (!campoSenha.checkValidity()) {

        document.querySelector("#erroSenha").style.display = "flex"

        campoSenha.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroSenha").style.display = "none"

        campoSenha.style.border = "1px solid green"


    }
}
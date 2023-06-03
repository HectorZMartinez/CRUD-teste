function validarInputs(event) {
    var error = false;
    var campoEmail = document.querySelector("#email")
    var campoSenha = document.querySelector("#senha")

    if (!campoEmail.checkValidity()) {
        document.querySelector("#erroEmail").style.display = "flex"

        campoEmail.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroEmail").style.display = "none"

        campoEmail.style.border = "1px solid green"

    }

    if (!campoSenha.checkValidity()) {

        document.querySelector("#erroSenha").style.display = "flex"

        campoSenha.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroSenha").style.display = "none"

        campoSenha.style.border = "1px solid green"


    }

    if (error) {
        //        event.preventDefault()
    }

}
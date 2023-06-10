function validarInputs(event) {
    var error = false;
    var campoNome = document.querySelector("#nome");
    var campoEmail = document.querySelector("#email");
    var campoSenha = document.querySelector("#senha");
    var campoConfirmaSenha = document.querySelector("#confirmaSenha");

    if (campoNome.value.length < 3 || campoNome.value.length > 50 || campoNome.value.trim() === "") {
        document.querySelector("#erroNome").style.display = "flex";
        campoNome.style.border = "1px solid red";
        error = true;
    } else {
        document.querySelector("#erroNome").style.display = "none";
        campoNome.style.border = "1px solid green";
    }

    if (!campoEmail.checkValidity() || campoEmail.value.trim() === "") {
        document.querySelector("#erroEmail").style.display = "flex";
        campoEmail.style.border = "1px solid red";
        error = true;
    } else {
        document.querySelector("#erroEmail").style.display = "none";
        campoEmail.style.border = "1px solid green";
    }

    if (campoSenha.value.trim() === "") {
        document.querySelector("#erroSenha").style.display = "flex";
        campoSenha.style.border = "1px solid red";
        error = true;
    } else if (!campoSenha.checkValidity()) {
        document.querySelector("#erroSenha").style.display = "flex";
        campoSenha.style.border = "1px solid red";
        error = true;
    } else {
        document.querySelector("#erroSenha").style.display = "none";
        campoSenha.style.border = "1px solid green";
    }

    if (campoConfirmaSenha.value !== campoSenha.value || campoConfirmaSenha.value.trim() === "") {
        document.querySelector("#erroConfirmaSenha").style.display = "flex";
        campoConfirmaSenha.style.border = "1px solid red";
        error = true;
    } else {
        document.querySelector("#erroConfirmaSenha").style.display = "none";
        campoConfirmaSenha.style.border = "1px solid green";
    }

    if (error) {
        event.preventDefault();
    }
}

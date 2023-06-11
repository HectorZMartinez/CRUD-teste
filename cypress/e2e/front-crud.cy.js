describe('front crud teste', () => {
  it("Validação um", () => {
    // O usuário entra na página para se cadastrar
    cy.visit("http://localhost/back-end/Agenda%20Tele/index.php")
    cy.wait(1000) // Pausa de 1 segundo

    // Preenche os campos do formulário de cadastro
    cy.get('input[name="nome"]').type('Jailson')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="email"]').type('jairobarros@yahoo.com')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="senha"]').type('Jailson123@')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="confirmaSenha"]').type('Jailson123@')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="cadastroNewUser"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário vai para a página de login
    cy.get('[data-cy="oldUser"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário faz login
    cy.get('input[name="email"]').type('jairobarros@yahoo.com')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="senha"]').type('Jailson123@')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="salvarCookie"]').click()
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="loginOldUser"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário altera sua senha
    cy.get('input[name="senha"]').type('Jailson123&')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="editUser"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário cadastra um contato
    cy.get('input[name="nomeContato"]').type('Ken')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="numeroContato"]').type('(18) 9964-2189')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('input[name="enderecoContato"]').type('Barbie Land')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="cadastroContato"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário vai para a página de contatos
    cy.get('[data-cy="listaContato"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário apaga o contato
    cy.get('[data-cy="deletContato"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário retorna ao cadastro de contatos
    cy.get('[data-cy="voltarCadastroContato"]').click()
    cy.wait(1000) // Pausa de 1 segundo

    // O usuário deleta sua conta
    cy.get('input[name="senha"]').type('Jailson123&')
    cy.wait(1000) // Pausa de 1 segundo
    cy.get('[data-cy="deleteUser"]').click()
    cy.wait(1000) // Pausa de 1 segundo
  })
})

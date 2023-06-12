# Agenda Eletrônica


  ## Índice

- [Sobre](#sobre)
- [Pré-requisitos](#pré-requisitos)
- [Preparando o Banco de Dados](#preparando-o-banco-de-dados)
- [Instalação do Cypress](#instalação-do-cypress)
- [Testes Automatizados](#testes-automatizados)
- [Contribuição](#contribuição)


## Sobre

#### O software desenvolvido é uma agenda eletrônica.

O primeiro passo para utilizar o software é realização do cadastro do usuário, onde serão coletadas as informações necessárias para criar uma conta pessoal. Após o cadastro, o usuário poderá acessar a página de login, garantindo a segurança e privacidade dos dados pessoais.
Uma vez autenticado, o usuário terá acesso à página de edição de conta, onde poderá realizar alterações na sua senha ou, se necessário, excluir a conta de forma simples e direta.
A funcionalidade principal da agenda eletrônica é o cadastro de contatos. O usuário poderá adicionar quantos contatos desejar, inserindo informações como nome, número de telefone, e endereço de e-mail.
Após isso, o usuário pode acessar sua lista de contatos salvos. A partir dessa lista, o usuário também terá a opção de deletar um contato específico.



### Foram utilizadas as seguintes tecnologias: 

HTML5 para o Front-end das páginas, PHP como linguagem principal (Back-end), Javascript para proporcionar animações mais fluidas ao interagir com os botões, CSS e Bootstrap para estilização visual, e SQL para armazenar os dados de forma persistente.


## Imagens da Aplicação

Cadastro do usuário.
![1](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/1681f1f5-339f-4797-a896-636505d382e6)

Usuário fazendo login.
![2](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/9905bb6e-b33f-4cf3-9e8e-be070fd66f0d)

Usuário cadastrando um contato.
![3](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/e6eac14c-9552-42fa-be3f-0a66af88aa91)

Lista de contatos.
![4](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/53f68af1-2ea9-4a78-9437-ec211ad54c39)



## Pré-requisitos

### Antes de começar, certifique-se de ter instalado:

NodeJS >= v16.14.2

MySQL >= v10.4.25-MariaDB

PHP >= v8.1.11

OBS: É recomendável possuir o XAMPP instalado e os serviços do Apache, FileZilla e MySQL em pleno funcionamento.


## Preparando o Banco de Dados

### Adicione as mesmas informações ao criar a conexão no MySQL Workbench

```sh
host = "localhost";
port = "3306";
user = "root";
password = "123";
```

### Criação das tabelas no banco de dados

```sql
create database	atividade01;
use atividade01;
CREATE TABLE usuario (
    idusuario int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    email varchar(255) UNIQUE,
    senha varchar(255)
);

CREATE TABLE contatos (
    idcontato INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    numero VARCHAR(20),
    endereco VARCHAR(255),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES usuario (idusuario) ON DELETE CASCADE
);
```


## Instalação do Cypress

### Instale o Cypress via npm:

```sh
/caminho/seu/projeto
```

```sh
npm install cypress
```

### Iniciar Cypress através do PowerShell:

```sh
npm run cypress:open
```


## Testes Automatizados

### Para visualizar os testes automatizados, siga os passos abaixo:

1º Após executar os comandos mencionados acima, o Cypress abrirá a interface gráfica.
![1](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/3dfa7fd5-8152-4196-ad90-818507477e22)

2º Clique em "E2E testing" e escolha o navegador em que deseja visualizar os testes.
![2](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/5c5a3fb2-7136-49d7-90d1-922daf1a3c84)


3º Clique em "specs" e digite "front-crud" para localizar o arquivo e a pasta.
![3](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/02c19915-266f-4bb7-a0e0-da0ada371ef5)


4º Selecione o arquivo para iniciar os testes.
![4](https://github.com/HectorZMartinez/CRUD-teste/assets/97033401/b1b65631-130d-4577-975a-366b573e0105)






## Contribuição

### Se você deseja contribuir com o projeto usando o GitHub Desktop, siga as etapas abaixo:

1º Leia a documentação do projeto para entender o processo e contribuir.

2º Acesse a aba "Issues" no repositório para encontrar uma tarefa disponível ou abrir uma nova issue.

3º Faça um fork do repositório do projeto clicando no botão "Fork" na página do repositório.

4º Baixe o repositório do projeto para o seu ambiente local clicando no botão "Code" e selecionando "Open with GitHub Desktop".

5º No GitHub Desktop, adicione o repositório do projeto clicando em "Add" e selecionando o repositório do projeto que você acabou de baixar.

6º Atualize o seu repositório local em relação ao repositório remoto clicando em "Fetch origin".

7º Faça as modificações necessárias no código usando a sua IDE ou editor de texto preferido.

8º No GitHub Desktop, verifique as alterações feitas nos arquivos modificados e selecione aqueles que deseja incluir no commit.

9º Digite uma mensagem descritiva para o commit e clique em "Commit to main" para realizar o commit das suas alterações na branch principal.

10º Envie as alterações para o repositório remoto no GitHub clicando em "Push origin".

11º Abra uma pull request clicando no botão "Pull request" na página do seu fork do repositório.

12º Preencha os detalhes da pull request, descrevendo as alterações que você fez, e clique em "Create pull request" para enviar a solicitação de merge da sua branch para o repositório do projeto.

13º Crie uma nova branch para realizar suas alterações/adições de código.

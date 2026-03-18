# Genshin Store
## Sistema de LOGIN e Carrinho de Compras
&nbsp;

## OBJETIVO
Desenvolver um sistema web que simula uma loja virtual com autenticação de usuário e carrinho de compras.

## Página de Login (index.php)
![Tela de Login](assets/img/screenshots/tela_login.png)
**LOGAR:**
- **Email:** admin@admin
- **Senha:** 123
&nbsp;

**Implemente uma página com os campos:**
- E-mail
- Senha
- Checkbox "Lembre-me"
&nbsp;

**Funcionalidades**:
Ao submeter o formulário:
- Criar uma sessão armazenando o e-mail do usuário
- Se a opção "Lembre-me" estiver marcada:
Criar um cookie para salvar o e-mail por 30 dias
- Se o cookie existir:
Preencher automaticamente o campo de e-mail
Redirecionar para a página dashboard.php após login
&nbsp;

## Página de Produtos (dashboard.php)
**Regras**
Permitir acesso somente se o usuário estiver logado
Caso contrário, redirecionar para login.php
**Funcionalidades**:
- Exibir o usuário
**Criar um array de produtos, contendo:**
- ID
- nome
- preço
- image
&nbsp;

- Listar os produtos na tela
- Cada produto deve ter um botão "Comprar"
**Carrinho**:
- Ao clicar em "Comprar":
- Adicionar o ID do produto em um array de sessão `$_SESSION['carrinho']`
- Redirecionar para a página carrinho.php
 
## Página de Carrinho (carrinho.php)
**Regras:**
Acesso permitido apenas para usuários logados
&nbsp;

**Funcionalidades**
- Criar um array associativo de produtos (id → dados)
- Listar os produtos adicionados ao carrinho
**Exibir**:
- Nome do produto
- Preço
- Calcular e mostrar o valor total da compra
&nbsp;

**Se o carrinho estiver vazio**
- Exibir mensagem: "Carrinho vazio"
 
## Logout (logout.php)
- Destruir a sessão
- Redirecionar para a página de login
 
## Regras Técnicas

**Utilizar:**
- $_SESSION para controle de login e carrinho
- $_COOKIE para funcionalidade "Lembre-me"
- Arrays para armazenar os produtos
- Utilizar session_start() em todas as páginas que usam sessão
- Utilizar header("Location: ...") para redirecionamentos
- Validar acesso às páginas protegidas
 
**Desafios Extras (Opcional)**
- Permitir remover itens do carrinho
- Evitar duplicação de produtos no carrinho
- Exibir quantidade de cada item
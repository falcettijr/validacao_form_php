# Validação de Formulário (PHP e Bootstrap)

Este é um exemplo de código PHP que demonstra como realizar a validação de um formulário usando PHP e Bootstrap. O código verifica se os campos de nome, e-mail, senha e repetição de senha foram preenchidos corretamente. Se não houver erros, o usuário será redirecionado para uma página de agradecimento.

## Pré-requisitos

- Servidor web com suporte a PHP.
- Biblioteca Bootstrap (versão 5.3.0-alpha3) e Material Design Icons (versão 7.2.96) devem ser incluídas no seu projeto.

## Instruções

1. Copie o código PHP fornecido para um arquivo com a extensão ".php" no seu servidor web.
2. Certifique-se de que a biblioteca Bootstrap e Material Design Icons estão corretamente incluídas no seu projeto.
3. Acesse o formulário através do navegador para testar a validação.

## Explicação do Código

O código consiste em um formulário HTML com campos de entrada para nome, e-mail, senha e repetição de senha. Quando o formulário é enviado via método POST, o código PHP é executado para validar os campos.

- A função `limpaPost()` é usada para limpar os valores dos campos, removendo espaços em branco e caracteres especiais.
- A validação de cada campo é feita verificando se está vazio ou se atende a determinadas condições. Se algum erro for encontrado, uma mensagem de erro é exibida.
- Se não houver erros em nenhum dos campos, o usuário será redirecionado para a página "agradecimento.html".
- A classe CSS "is-invalid" é aplicada aos campos de entrada que possuem erros de validação, exibindo uma indicação visual para o usuário.
- A biblioteca Bootstrap é utilizada para adicionar estilos e comportamentos interativos aos elementos HTML, como os ícones de informação exibidos ao lado dos campos.

Certifique-se de ajustar os links para a biblioteca Bootstrap e Material Design Icons, se necessário, para que sejam carregados corretamente.

Esse código é um exemplo básico de validação de formulário usando PHP e Bootstrap. É importante ressaltar que ele pode ser aprimorado e personalizado para atender às necessidades específicas do seu projeto.
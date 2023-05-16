<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = limpaPost($_POST['nome']);
    $email = limpaPost($_POST['email']);
    $senha = limpaPost($_POST['senha']);  
    $repete_senha = limpaPost($_POST['repete_senha']);  
    
    //VERIFICAÇÃO DE NOME
    if (empty($nome)) {
        $erroNome = "Por favor, digite seu nome";
    }else{
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
            $erroNome = "Apenas letras e espaços em branco são aceitos!";
        }else {
            $erroNome = "Nenhum";
        }
    }

    //VERIFICAÇÃO DE EMAIL
    if (empty($email)) {
        $erroEmail = "Por Favor, digite seu email";
    }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = "Formato de email inválido";
        }else {
            $erroEmail = "Nenhum";
        }
    }

    //VERIFICAÇÃO DE SENHA
    if (empty($senha)) {
        $erroSenha = "Por Favor, digite sua senha";
    }else {
        if (strlen($senha) < 6) {
            $erroSenha = "A senha deve ter no mínimo 6 caracteres";
        }else{
            $erroSenha = "Nenhum";
        }
    }

    //VERIFICAÇÃO DE REPETIÇÃO DE SENHA
    if (empty($repete_senha)) {
        $erroRepeteSenha = "Por Favor, repita sua senha";
    }else {
        if ($senha !== $repete_senha) {
            $erroRepeteSenha = "As senhas não coincidem";
        }else {
            $erroRepeteSenha = "Nenhum";;
        }
    }   

    //VERIFICAR SE NÃO HOUVE NENHUM ERRO
    
    if ($erroNome == "Nenhum" && $erroEmail == "Nenhum" && $erroSenha == "Nenhum" && $erroRepeteSenha == "Nenhum") {
        //REDIRECIONAR O USUÁRIO PARA UMA PÁGINA DE AGRADECIMENTO
        header('Location: agradecimento.html');
    }

}

function limpaPost($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POST</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" />
    <style>
        body{
            background-color: #22272E;
            color: #CDD9E5;
        }
        h1{
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Validação de Formulário (PHP e Bootstrap)</h1>
        <hr />
        <form method="post">

            <div class="mb-3 mt-5">
                <label for="nome" class="form-label">Nome Completo <i class="mdi mdi-information-outline"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrigatório"></i></label>
                <input type="text" class="form-control <?php if(isset($erroNome)){if($erroNome !== "Nenhum") {echo "is-invalid";}} ?> " id="nome" name="nome" placeholder="Digite seu nome" value="<?php if(isset($_POST['nome'])) {echo $_POST['nome']; } ?>" required/>
                <div class="invalid-feedback">
                <?php if(isset($erroNome)){if($erroNome !== "Nenhum") {echo "$erroNome";}} ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email <i class="mdi mdi-information-outline"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrigatório"></i></label>
                <input type="email" class="form-control  <?php if(isset($erroEmail)){ if ($erroEmail !== "Nenhum") {echo "is-invalid";}} ?>" id="email" name="email" placeholder="email@provedor.com" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>" required />
                    <div class="invalid-feedback">
                    <?php if(isset($erroEmail)){if($erroEmail !== "Nenhum") {echo $erroEmail;}} ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Digite uma senha <i class="mdi mdi-information-outline"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrigatório"></i></label>
                <input type="password" class="form-control <?php if(isset($erroSenha)){if($erroSenha !== "Nenhum") {echo "is-invalid";}} ?>" id="senha" name="senha" placeholder="Digite uma senha" value="<?php if(isset($_POST['senha'])) {echo $_POST['senha'];} ?>" required />
                    <div class="invalid-feedback">
                    <?php if(isset($erroSenha)){if($erroSenha !== "Nenhum") {echo $erroSenha;}} ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="repete_senha" class="form-label">Repita sua senha <i class="mdi mdi-information-outline"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Campo obrigatório"></i></label>
                <input type="password" class="form-control <?php if(isset($erroRepeteSenha)){if($erroRepeteSenha !== "Nenhum") {echo "is-invalid";}} ?>" id="repete_senha" name="repete_senha" placeholder="Repita sua senha" value="<?php if(isset($_POST['repete_senha'])) {echo $_POST['repete_senha'];} ?>" required />
                    <div class="invalid-feedback">
                    <?php if(isset($erroRepeteSenha)){if($erroRepeteSenha !== "Nenhum") {echo $erroRepeteSenha;}} ?>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary "><i class="mdi mdi-send"> Cadastrar</i></button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
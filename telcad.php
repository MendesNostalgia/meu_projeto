<?php

if(isset($_POST['submit']))
{
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO logado (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "Vaga cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a vaga! " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>CADASTRO</title>
</head>
<body>
    <div class="box">
        <form action="telcad.php" method="POST" autocomplete="on">
            <h1>CADASTRO DE VAGAS</h1>

            <label for="inome">Nome Completo</label>
            <input type="text" name="nome" id="inome" required placeholder="Insira seu nome aqui" autocomplete="username">

            <label for="iemail">E-mail</label>
            <input type="email" name="email" id="iemail" required placeholder="Insira seu e-mail aqui" autocomplete="email">

            <label for="isenha">Senha</label>
            <input type="password" name="senha" id="isenha" required minlength="8" 
           placeholder="Insira sua senha aqui" autocomplete="current-password">
            
            <button type="submit" name="submit" id="submit" value="Cadastrar">Cadastrar</button>

            <!-- <input type="submit" name="submit" id="submit" class="submit" value="Cadastrar">Cadastrar</input> -->
             
            <label for="radio" class="radio" style="text-transform: none;">
            <input type="radio" name="radio" style="height: auto;" required> Eu concordo com os <a href="index.html" target="_blank">termos e condições</a>.</input></label>
        
            <p class="copyright">Copyright © 2024 - Todos os direitos reservados.</p>

        </form>
    </div>
</body>
</html>
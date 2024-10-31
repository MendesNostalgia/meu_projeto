<?php

if(isset($_POST['submit']))
{
    include_once('config.php');

    $titulo = $_POST['titulo'];
    $desc = $_POST['desc'];
    $requisitos = $_POST['requisitos'];
    $localizaçao = $_POST['localizaçao'];
    $beneficios = $_POST['beneficios'];
    $datas = $_POST['data_val'];

    $stmt = $mysqli->prepare("INSERT INTO cadastro_vagas (titulo_vagas, descriçao_vaga, requisitos, localizaçao, beneficios, data_inscriçao) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $titulo, $desc, $requisitos, $localizaçao, $beneficios, $datas);

    if ($stmt->execute()) {
        echo "Vaga cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a vaga: " . $stmt->error;
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
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>CADASTRO</title>
</head>
<body>
    <div class="login">
        <form action="telcad.php" method="POST">
            <h1>CADASTRO DE VAGAS</h1>
            
            <label>Título da vaga:</label>
            <input type="text">
            
            <label>Descrição detalhada da vaga:</label>
            <input type="text">
            
            <label>Requisitos:</label>
            <input type="text">

            <label>Localização:</label>                
            <input type="text">

            <label>Benefícios:</label>
            <input type="text">

            <label>Data de inscrição:</label>
            <input type="date">
            
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
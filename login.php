<?php 
    include('./conexaolog.php');

    if(isset($_POST['usuario']) || isset($_POST['senha'])) { //Verificar se existe a variável.
        
        $usu = $mysqli->real_escape_string($_POST['usuario']); //para limpar a str
        $sen = $mysqli->real_escape_string($_POST['senha']); //para limpar a str

        $sql_code = "SELECT * FROM dados_usu WHERE usuario = '$usu' AND senha = '$sen'";
        $sql_query = $mysqli->query($sql_code) or die ("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome']; // session é uma variável que continua válida em mais de uma tela.

            header("Location: index.php"); //para redirecionar a pág.

        } else {
            echo  "<script>alert('Usuário ou senha incorretos!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imagens/user.ico" type="image/x-icon">
    <link rel="stylesheet" href="./estilo.login/style.css">
    <link rel="stylesheet" href="./estilo.login/media.query.css">
    <title>Login</title>
</head>
<body>
    <header>
        <menu id="topo">
            <a href="./index.php">
                <div id="title">
                    <img src="./imagens/logolm1.png" alt="logo L e M" id="img1">
                    <img src="./imagens/logonfl.png" alt="logo nfl" id="img2">
                </div>
            </a>
            <div id="logo">
                <img src="./imagens/shield.png" alt="shield" id="shield">
                <span>Ambiente 100% seguro</span>
            </div>
        </menu>
    </header>
    <div id="container">
        <form method="post">
            <h2 class="title-login">Login</h2>
            <div class="field">
                <input type="text" class="conteudo" name="usuario" id="idusu" placeholder="Usuário" autocomplete="on" required>
            </div>
            <div class="field">
                <input type="password" class="conteudo" name="senha" id="idsenha" placeholder="Senha"  required>
            </div>
            <p id="res"></p>
            <div class="esenha">
                <a href="./opcoes.html">Esqueci a senha</a>
            </div>
            <div id="botoes">
                <input type="submit" value="Enviar" class="btn-login">
                <a href="./cadastro.php" class="btn-cad">Cadastre-se</a>
            </div>
        </form>
    </div>
    <footer>Site criado por <strong>Larissa Menezes</strong> e <strong>Lucas Menezes</strong> para o Projeto de ADS.</footer>
</body>
</html>
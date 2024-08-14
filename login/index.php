<?php 
    require_once '\xampp\htdocs\testephp\formulario\conexao.php';

    if( isset($_POST["username"]) || isset($_POST["senha"])){
        $username = $mysqli->real_escape_string($_POST["username"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);

        $sql = "SELECT * FROM usuario WHERE usuario = '$username' AND senha = '$senha';";
        $sqlQuery = $mysqli->query($sql) or die("Falha na execução" . $mysqli->error);

        $quantidadeUsuario = $sqlQuery->num_rows;

        if($quantidadeUsuario == 1){
            $usuario = $sqlQuery->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];

            header("Location: pagina.php");
        }else{
            echo "Usuario ou Senha Incorretos!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>
            Login
        </h1>
    </header>
    <form action="" method="POST">
        <label for="username">Nome: </label>
        <input type="text" name="username" require>

        <br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" require>npm install bootstrap

        <br>

        <button type="submit">Entrar    </button>
    </form>
</body>
</html>
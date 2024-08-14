<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <header>
        <h1>Resultado</h1>
    </header>
    <main>
        <?php 
            require_once '\xampp\htdocs\testephp\formulario/ViaCep.php';
            include("conexao.php");
            $viaCep = new ViaCep();


            $usuario = $mysqli->real_escape_string($_GET["usuario"]);
            $senha = $mysqli->real_escape_string($_GET["senha"]);
            $nome = $mysqli->real_escape_string($_GET["nome"] ?? "");
            $idade = $mysqli->real_escape_string($_GET["idade"] ?? "");
            $dataCadastro = date('Y-m-d H:i:s');
            
            $cep = $mysqli->real_escape_string($_GET["cep"]);

            
            $dadosCEP = $viaCep::consultarCEP($cep);

            $rua = $dadosCEP['logradouro'];
            $bairro = $dadosCEP['bairro'];
            $estado = $dadosCEP['localidade'];
            $sql = "INSERT INTO usuario (usuario, senha, nome, idade, datacadastro, cep, rua, bairro, estado)
                VALUES ('$usuario', '$senha', '$nome', $idade, '$dataCadastro', '$cep', '$rua', '$bairro', '$estado')";
    
            
            if(mysqli_query($mysqli, $sql)){
                echo "<p>Formlario cadastrado com sucesso</p>";
                echo "Usuário: $usuario<br>";
                echo "Nome: $nome<br>";
                echo "Idade: $idade<br>";
                echo "Data de Cadastro: $dataCadastro<br>";
                echo "CEP: $cep<br>";
                echo "Rua: $rua<br>";
                echo "Bairro: $bairro<br>";
                echo "Estado: $estado<br>";
            }
            mysqli_close($mysqli);
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para o formulario</a></p>
    </main>
</body>
</html>
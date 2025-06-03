<?php
    require_once "conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $conexao = obterConexaoMySQLi();
    if($conexao){
        $insert = "INSERT INTO usuarios (nome,email) VALUES ('$nome','$email')";

        if(mysqli_query($conexao,$insert)){

            echo "<p style ='color: green'>Novo usuário inserido com sucesso!</p>";

            $sql = "SELECT * FROM usuarios";

            $resultado = mysqli_query($conexao,$sql);
            
            if($resultado){
                echo "<table style = 'width: 100%'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nome</th>";
                echo "<th>Email</th>";
                echo "</tr>";
                while($row = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($resultado);
            } else{
                echo "<p style='color: red;'>Erro ao buscar usuários: " . mysqli_error($conexao) . "</p>";

            }
        } else{
            echo "<p style ='color: red'>Erro: " . mysqli_error($conexao) . "</p>";
        }
        mysqli_close($conexao);
        }
?>
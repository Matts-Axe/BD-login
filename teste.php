<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status da Conexão MySQLi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        
        h1, h2 {
            color: #2c3e50;
        }
        
        .table-container {
            margin: 20px 0;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #e3f2fd;
        }
        
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Verificação da Conexão com o Banco de Dados (MySQLi)</h1>

    <?php
        // Inclui o arquivo de conexão MySQLi
        require_once 'conexao.php';

        // Exibe a mensagem de conexão
        exibirMensagemConexaoMySQLi();

        // Opcional: Exibir a lista de usuários usando MySQLi
        $conexao = obterConexaoMySQLi();
        if ($conexao) {
            echo "<h2>Lista de Usuários:</h2>";
            $sql = "SELECT id, nome, email FROM usuarios";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                echo '<div class="table-container">';
                echo '<table>';
                echo '<thead><tr><th>ID</th><th>Nome</th><th>Email</th></tr></thead>';
                echo '<tbody>';
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
                    echo "</tr>";
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                mysqli_free_result($resultado); // Libera a memória do resultado
            } else {
                echo "<p class='error'>Erro ao buscar usuários: " . mysqli_error($conexao) . "</p>";
            }

            mysqli_close($conexao); // Fecha a conexão com o banco de dados
        }
    ?>

</body>
</html>
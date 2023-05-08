<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página Inicial</title>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data_de_nascimento'];
            $nomeF = $_POST['nomeF'];
            $peso = $_POST['peso'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];
            $tamanho = $_POST['tamanho'];

            $stmt = $pdo->prepare('SELECT COUNT(*) FROM cliente WHERE data_de_nascimento = ?');
            $stmt->execute([$data]);
            $count = $stmt->fetchColumn();

            $stmt = $pdo->prepare('INSERT INTO cliente
            (nome, email, telefone, data_de_nascimento)
            VALUES(:nome, :email, :telefone, :data_de_nascimento)');
            $stmt->execute(['nome' => $nome,
            'email' => $email,
            'telefone' => $telefone, 'data_de_nascimento' => $data]);

           
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM produto WHERE quantidade = ?');
            $stmt->execute([$quantidade]);
            $count = $stmt->fetchColumn();

            $stmt = $pdo->prepare('INSERT INTO produto
            (nomeF, peso, preco, quantidade, tamanho)
            VALUES(:nomeF, :peso, :preco, :quantidade, :tamanho)');
            $stmt->execute(['nomeF' => $nomeF,
            'peso' => $peso,
            'preco' => $preco, 'quantidade' => $quantidade, 'tamanho' => $tamanho]);
        }

        ?>
        <form method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>
        <label for="data_de_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_de_nascimento" required><br>
    
            <h1>Compra</h1>

        <label for="nomeF">Nome da Fruta:</label>
        <input type="text" name="nomeF" required><br>
        <label for="peso">Peso (Max: 4kg):</label>
        <input type="text" name="peso" required><br>
        <label for="preco">Preço que deseja pagar (veremos se é válido):</label>
        <input type="text" name="preco" required><br>
        <label for="quantidade">Quantidade (Max: 15):</label>
        <input type="text" name="quantidade" required><br>
        <label for="tamanho">Tamanho que deseja (Max: 30cm):</label>
        <input type="text" name="tamanho" required><br>
        
            <div>
            <button type="submit" name="submit" value="Agendar">Pedir</button>
            <button type="button"><a href="listar.php">Listar</a></button>
            </div>

         </form>
            
</body>
</html>
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<h1>Pedidos</h1>
<?php
$stmt = $pdo->query('SELECT * FROM cliente ORDER BY id');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($registros) == 0) {
    echo '<p>Nenhum registro enviado</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($registros as $registro) {
        echo '<tr>';
        echo '<td>' . $registro['nome'] . '</td>';
        echo '<td>' . $registro['email'] . '</td>';
        echo '<td>' . $registro['telefone'] . '</td>';
        echo '<td>' . date('d/m/Y', strtotime($registro['data_de_nascimento'])) . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $registro['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $registro['id'] . '">Deletar</a></td>';
        echo '</tr>';
        
    }
    echo '</tbody>';
    echo '</table>';
}
?>
<?php
$stmt = $pdo->query('SELECT * FROM produto ORDER BY id');
$frutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($frutas) == 0) {
    echo '';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome da Fruta</th><th>Peso</th><th>Preço</th><th>Quantidade</th><th>Tamanho</th><th colspan="2">Atualizar Pedido</th></tr></thead>';
    echo '<tbody>';

    foreach ($frutas as $fruta) {
        echo '<tr>';
        echo '<td>' . $fruta['nomeF'] . '</td>';
        echo '<td>' . $fruta['peso'] . '</td>';
        echo '<td>' . $fruta['preco'] . '</td>';
        echo '<td>' . $fruta['quantidade'] . '</td>';
        echo '<td>' . $fruta['tamanho'] . '</td>';
        echo '<td><a style="color:black;" href="atualizarp.php?id=' . $fruta['id'] . '">Atualizar</a></td>';
        echo '</tr>';
        
    }
    echo '</tbody>';
    echo '</table>';
}
?>
<button type="button"><a href="index.php">Voltar para a Página Inicial</a></button>
</body>
</html>
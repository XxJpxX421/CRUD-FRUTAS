<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt = $pdo->prepare('SELECT * FROM produto WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt = $pdo->prepare('DELETE FROM cliente WHERE id = ?');
$stmt->execute([$id]);
$stmt = $pdo->prepare('DELETE FROM produto WHERE id = ?');
$stmt->execute([$id]);
header ('Location: listar.php');
exit;
}

?>
<!DOCTYPE html>
<head>
    <title>Deletar Pedido</title>
</head>
<body>
    <h1>Deletar Pedido?</i>
    <form method="post">
    <button type="submit">Sim</button>
    <button type="submit"><a href="listar.php">Não</a></button>
</form></body></html>
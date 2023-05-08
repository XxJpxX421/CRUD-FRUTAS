<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);

$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$data = $appointment['data_de_nascimento'];
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Atualizar Pedido</title>
</head>
<body>
    <div class="container">
    <h1>Atualizar Registro</h1>
    <form method="post">
    <label for="nome">Nome:</label>
<input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

<label for="email">Email:</label>
<input type="email" name="email" value="<?php echo $email; ?>" required><br>

<label for="telefone">Telefone:</label>
<input type="text" name="telefone" value="<?php echo $telefone; ?>" required><br>

<label for="data_de_nascimento">Data de Nascimento:</label>
<input type="date" name="data_de_nascimento" value="<?php echo $data_de_nascimento; ?>" required><br>

        <button type="submit">Atualizar</button>
</form>
</div>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data_de_nascimento'];
   
    $stmt = $pdo->prepare('UPDATE cliente SET  nome = ?, email = ?, telefone = ?,
     data_de_nascimento = ? WHERE id = ?');
     $stmt->execute([$nome, $email, $telefone, $data, $id]);
     header('Location:listar.php');
     exit;
}
?>
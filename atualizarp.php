<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM produto WHERE id = ?');
$stmt->execute([$id]);

$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}
$nomeF = $appointment['nomeF'];
$peso = $appointment['peso'];
$preco = $appointment['preco'];
$quantidade = $appointment['quantidade'];
$tamanho = $appointment['tamanho'];
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Atualizar Pedido</title>
</head>
<body>
    <div class="container">
    <h1>Atualizar Compra</h1>
   
<label for="nomeF">Nome da Fruta:</label>
<input type="text" name="nomeF" value="<?php echo $nomeF ?? ''; ?>" required><br>

<label for="peso">Peso (Max: 4kg):</label>
<input type="text" name="peso" value="<?php echo $peso ?? ''; ?>" required><br>

<label for="preco">Preço que deseja pagar (veremos se é válido):</label>
<input type="text" name="preco" value="<?php echo $preco ?? ''; ?>" required><br>

<label for="quantidade">Quantidade (Max: 15):</label>
<input type="text" name="quantidade" value="<?php echo $quantidade ?? ''; ?>" required><br>

<label for="tamanho">Tamanho que deseja (Max: 30cm):</label>
<input type="text" name="tamanho" value="<?php echo $tamanho ?? ''; ?>" required><br>

        <button type="submit">Atualizar</button>
</form>
</div>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeF = $_POST['nomeF'];
    $peso = $_POST['peso'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $tamanho = $_POST['tamanho'];

    $stmt = $pdo->prepare('UPDATE produto SET  nomeF = ?, peso = ?, preco = ?,
     quantidade = ?, tamanho = ? WHERE id = ?');
     $stmt->execute([$nomeF, $peso, $preco, $quantidade, $tamanho, $id]);
     header('Location:listar.php');
     exit;
}
?>
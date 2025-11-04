<?php 
include 'conexao.php';
$id = $_POST['btnEditar'];
$sql = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
$sql->execute([$id]);
$linha = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar o Produto: <?php echo $linha['nome']?></h1>

    <div class="container">
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id"
            value="<?php echo $linha['id']?>" class="form-control"><br>

            <label for="name" class="form-label">Nome do produto: </label>
            <input type="text" name="nome" 
            value="<?php echo $linha['nome']?>" class="form-control"><br>

            <label for="descricao" class="form-label">Descricao do produto: </label>
            <input type="text" name="descricao"
            value="<?php echo $linha['descricao']?>" class="form-control"><br>

            <label for="preco" class="form-label">Preco do produto: </label>
            <input type="text" name="preco"
            value="<?php echo $linha['preco']?>" class="form-control"><br>

            <label for="tipo" class="form-label">tipo: </label>
            <input type="text" name="tipo" 
            value="<?php echo $linha['tipo']?>" class="form-control"><br>

            <label for="categoria" class="form-label">categoria: </label>
            <input type="text" name="categoria" 
            value="<?php echo $linha['categoria']?>" class="form-control"><br>

            <label for="data_lancamento" class="form-label">Data de lançamento: </label>
            <input type="date" name="data_lancamento"
            value="<?php echo $linha['data_lancamento']?>" class="form-control"><br>

            <label for="desconto_usados" class="form-label">desconto usados: </label>
            <input type="text" name="desconto_usados"
            value="<?php echo $linha['desconto_usados']?>" class="form-control"><br>

            <input type="submit" name="btnSalvar" value="Salvar"
            class="btn btn-primary">
        </form>
    </div>

</body>
</html>
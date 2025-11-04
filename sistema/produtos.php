<?php 
    include 'conexao.php';
    $sql = $pdo->query("SELECT * FROM produto");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Página Principal</title>
</head>

<body>

    <div class="container">
        <h1>Página Principal</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Caracteristica</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Produto_Caracteristica</th>
                    <th scope="col">Loja</th>
                    <th scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <th scope="row"><?php echo $linha['id']?></th>
                    <td><?php echo $linha['nome']?></td>
                    <td><?php echo $linha['descricao'] ?></td>
                    <td><?php echo $linha['preco']?></td>
                    <td><?php echo $linha['tipo'] ?></td>
                    <td><?php echo $linha['categoria'] ?></td>
                    <td><?php 
                        $partes = explode('-', $linha['data_lancamento']);
                        $data = "".$partes[2]."/".$partes[1]."/".$partes[0];
                        echo $data ?>
                    </td>
                    <td><?php echo $linha['desconto_usados'] ?></td>
                <!-- ********************************* -->
                    <td><form action="editar.php" method="POST">
                        <button class="btn btn-primary" name="btnEditar" 
                        value="<?php echo $linha['id'];?>">Editar</button>
                    </form></td>
                 <!-- ********************************* -->
                    <td><form action="excluir.php" method="POST"> 
                        <button class="btn btn-danger" name="btnExcluir" 
                        value="<?php echo $linha['id'];?>">Excluir</button>
                    </form></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        
        <form action="adicionar.php" method="POST">
            
            <label for="nome" class="form-label">Nome do produto: </label>
            <input type="text" name="nome" class="form-control" 
            placeholder="Digite o nome do produto..." required>

            <label for="descricao" class="form-label">Descricao do produto: </label>
            <input type="text" name="descricao" class="form-control" 
            placeholder="Digite a descrição do produto..." required>

            <label for="preco" class="form-label">Preco do produto: </label>
            <input type="text" name="preco" class="form-control" 
            placeholder="Digite o preço do produto..." required>

            <input type="text" name="tipo" 
            placeholder="Digite o tipo do produto.." required>
            
            <input type="date" name="txtData" 
            placeholder="Digite a data de nascimento do aluno..">

            <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-success">
        </form>
    </div>
</body>

</html>
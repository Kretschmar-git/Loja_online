<?php
    include 'conexao.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $data_lancamento = $_POST['data_lancamento'];
    $desconto_usados = $_POST['desconto_usados'];

    $sql = $pdo->prepare("UPDATE produto SET nome = ?, descricao = ?, preco = ?, tipo = ?, categoria = ?, 
    data_lancamento  = ?, desconto_usados= ? WHERE id = ?");
    $sql->execute([$nome, $descricao, $preco, $tipo, $categoria, $data_lancamento, $desconto_usados, $id]);

    header("Location: produtos.php");
    exit;
?>
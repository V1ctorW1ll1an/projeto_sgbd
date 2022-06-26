<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_cliente = (int)$id_cliente;
    $primeiro_nome = $_POST['primeiro_nome'];
    $segundo_nome = $_POST['segundo_nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];

    $comercio->atualizar_cliente($id_cliente, $primeiro_nome, $segundo_nome, $data_nascimento, $cpf, $rg, $endereco, $cep, $cidade, $telefone);

    redirecionar('/index.php');
} else {
    $id_cliente_get = $_GET['id_cliente'];
    $dados_cliente = $comercio->pegarCliente($id_cliente_get);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("src/head.php") ?>

<body>
    <?php require("src/navbar.php") ?>

    <form class="container mt-5 pt-5" method="post" action="editar_cliente.php">
        <div class="mb-3">
            <input type="hidden" name="id_cliente" value="<?= $id_cliente_get ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Primeiro nome" name="primeiro_nome" value="<?= $dados_cliente['primeiro_nome'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Segundo nome" name="segundo_nome" value="<?= $dados_cliente['segundo_nome'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Data de nascimento (yyyy-mm-dd)" name="data_nascimento" value="<?= $dados_cliente['data_nascimento'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cpf" name="cpf" value="<?= $dados_cliente['cpf'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Rg" name="rg" value="<?= $dados_cliente['rg'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Endereço" name="endereco" value="<?= $dados_cliente['endereco'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cidade" name="cidade" value="<?= $dados_cliente['cidade'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cep" name="cep" value="<?= $dados_cliente['cep'] ?>">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Telefone" name="telefone" value="<?= $dados_cliente['fone'] ?>">
        </div>
        <div class="mb-3">
            <input type="submit" class="button is-primary" value="Salvar cliente">
        </div>
    </form>
</body>

</html>
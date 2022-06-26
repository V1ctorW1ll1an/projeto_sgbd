<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $primeiro_nome = $_POST['primeiro_nome'];
    $segundo_nome = $_POST['segundo_nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];

    $comercio->cadastrar_cliente($primeiro_nome, $segundo_nome, $data_nascimento, $cpf, $rg, $endereco, $cep, $cidade, $telefone);

    redirecionar('/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("src/head.php") ?>

<body>
    <?php require("src/navbar.php") ?>

    <form class="container mt-5 pt-5" method="post">
        <div class="mb-3">
            <input class="input" type="text" placeholder="Primeiro nome" name="primeiro_nome">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Segundo nome" name="segundo_nome">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Data de nascimento (yyyy-mm-dd)" name="data_nascimento">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cpf" name="cpf">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Rg" name="rg">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Endereço" name="endereco">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cidade" name="cidade">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Cep" name="cep">
        </div>
        <div class="mb-3">
            <input class="input" type="text" placeholder="Telefone" name="telefone">
        </div>
        <div class="mb-3">
            <input type="submit" class="button is-primary" value="Salvar cliente">
        </div>
    </form>
</body>

</html>
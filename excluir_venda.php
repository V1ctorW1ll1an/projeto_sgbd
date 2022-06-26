<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_venda = $_POST['id_venda'];

    $comercio->excluir_venda($id_venda);

    redirecionar('/vendas.php');
} else {
    $id_venda = $_GET['id_venda'];
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require("src/head.php"); ?>

<body>
    <?php require("src/navbar.php") ?>
    <section class="container mt-5">
        <h1>Você deseja realmente excluir está venda?</h1>
        <form action="excluir_venda.php" method="post">
            <input type="hidden" name="id_venda" value="<?= $id_venda; ?>" />
            <input class="mt-5 button is-danger" type="submit" value="Excluir venda">
        </form>
    </section>

</body>

</html>
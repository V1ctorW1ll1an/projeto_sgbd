<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];

    $comercio->excluir_cliente($id_cliente);

    redirecionar('/index.php');
} else {
    $id_cliente = $_GET['id_cliente'];
}

?>

<!DOCTYPE html>
<html lang="en">
<?php require("src/head.php"); ?>

<body>
    <?php require("src/navbar.php") ?>
    <section class="container mt-5">
        <h1>Você deseja realmente excluir o cliente?</h1>
        <form action="excluir_cliente.php" method="post">
            <input type="hidden" name="id_cliente" value="<?= $id_cliente; ?>" />
            <input class="mt-5 button is-danger" type="submit" value="Excluir cliente">
        </form>
    </section>

</body>

</html>
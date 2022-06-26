<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];

    $r = $comercio->excluir_cliente($id_cliente);

    if ($r) {
        redirecionar('/index.php');
    } else {
        echo '
        <div class="mt-5 mb-5 container notification is-danger">
            <button class="delete"></button>
            Não é possivel excluir um cliente que está ligado a uma venda!
        </div>
        ';
    }
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

    <script src="./delete.js"></script>
</body>

</html>
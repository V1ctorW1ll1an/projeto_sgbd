<?php
require 'src/config.php';
include 'src/comercio.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $comercio = new Comercio($mysql);
    $id_cliente = $_GET["id_cliente"];
    $vendas = $comercio->listar_vendas_cliente($id_cliente);
}


?>
<!DOCTYPE html>
<html lang="en">
<?php require("src/head.php"); ?>

<body>

    <?php require("src/navbar.php"); ?>
    <main>
        <section class="container mt-5">
            <table class="table is-bordered">
                <thead>
                    <tr>
                        <th>Codigo da venda</th>
                        <th>Valor parcial</th>
                        <th>Valor do desconto</th>
                        <th>Valor de acrescimo</th>
                        <th>Valor total</th>
                        <th>Data da venda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendas as $venda) : ?>
                        <tr>
                            <th scope="row"> <?= $venda["codigo"]; ?> </th>
                            <td> R$ <?= $venda["valor_parcial"]; ?> </td>
                            <td> R$ <?= $venda["valor_desconto"]; ?> </td>
                            <td> R$ <?= $venda["valor_acrescimo"]; ?> </td>
                            <td> R$ <?= $venda["valor_total"]; ?> </td>
                            <td> <?= $venda["data"]; ?> </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>
<?php
require 'src/config.php';
include 'src/comercio.php';

$comercio = new Comercio($mysql);
$vendas = $comercio->listar_vendas();

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
                        <th>Cliente</th>
                        <th>Valor parcial</th>
                        <th>Valor do desconto</th>
                        <th>Valor de acrescimo</th>
                        <th>Valor total</th>
                        <th>Data da venda</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendas as $venda) : ?>
                        <tr>
                            <th scope="row"> <?= $venda["codigo"] ?> </th>
                            <td> <?= $venda["primeiro_nome"] ?> </td>
                            <td> R$ <?= $venda["valor_parcial"] ?> </td>
                            <td> R$ <?= $venda["valor_desconto"] ?> </td>
                            <td> R$ <?= $venda["valor_acrescimo"] ?> </td>
                            <td> R$ <?= $venda["valor_total"] ?> </td>
                            <td> <?= $venda["data"] ?> </td>
                            <td>
                                <a class="mr-2 has-text-success" href="editar_venda.php?id_venda=<?= $venda["codigo"] ?>&id_cliente=<?= $venda['codigo_cliente'] ?>">
                                    Editar
                                </a>
                                <a class="ml-2 has-text-danger" href="excluir_venda.php?id_venda=<?= $venda["codigo"] ?>">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

        <section class="container mt-5">
            <a class="button is-success is-light" href="add_vendas.php">
                Cadastrar novas vendas
            </a>
        </section>
    </main>

</body>

</html>
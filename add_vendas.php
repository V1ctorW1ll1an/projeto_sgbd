<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);
$clientes = $comercio->listar_clientes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = (int)$_POST['id_cliente'];
    $valor_parcial = (float)$_POST['valor_parcial'];
    $valor_desconto = (float)$_POST['valor_desconto'];
    $valor_acrescimo = (float)$_POST['valor_acrescimo'];

    $comercio->add_venda($id_cliente, $valor_parcial, $valor_desconto, $valor_acrescimo);

    redirecionar('/vendas.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("src/head.php") ?>

<body>
    <?php require("src/navbar.php") ?>

    <form class="container mt-5 pt-5" method="post" action="add_vendas.php">
        <div class="mb-3">
            <input class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor parcial (R$ 00.00)" name="valor_parcial" />
        </div>
        <div class="mb-3">
            <input class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor desconto (R$ 00.00)" name="valor_desconto" />
        </div>
        <div class="mb-3">
            <input class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor acrescimo (R$ 00.00)" name="valor_acrescimo" />
        </div>
        <div class="mb-3">
            <div class="select">
                <select name="id_cliente">
                    <?php foreach ($clientes as $c) : ?>
                        <option value="<?= $c["codigo"] ?>"><?= $c["primeiro_nome"] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <input type="submit" class="button is-primary" value="Salvar venda">
        </div>
    </form>
</body>

</html>
<?php
require 'src/config.php';
include 'src/comercio.php';
require 'src/utils/utils.php';

$comercio = new Comercio($mysql);
$clientes = $comercio->listar_clientes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_venda = (int)$_POST['id_venda'];
    $id_cliente = (int)$_POST['id_cliente'];
    $valor_parcial = (float)$_POST['valor_parcial'];
    $valor_desconto = (float)$_POST['valor_desconto'];
    $valor_acrescimo = (float)$_POST['valor_acrescimo'];

    $comercio->atualizar_venda($id_venda, $id_cliente, $valor_parcial, $valor_desconto, $valor_acrescimo);

    redirecionar('/vendas.php');
} else {
    $id_venda = $_GET['id_venda'];
    $id_cliente = $_GET['id_cliente'];

    $dados_venda = $comercio->pegar_venda_por_id($id_venda);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("src/head.php") ?>

<body>
    <?php require("src/navbar.php") ?>

    <form class="container mt-5 pt-5" method="post" action="editar_venda.php">
        <div class="mb-3">
            <input type="hidden" name="id_venda" value="<?= $id_venda ?>">
        </div>
        <div class="mb-3">
            <input value="<?= $dados_venda['valor_parcial'] ?>" class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor parcial (R$ 00.00)" name="valor_parcial" />
        </div>
        <div class="mb-3">
            <input value="<?= $dados_venda['valor_desconto'] ?>" class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor desconto (R$ 00.00)" name="valor_desconto" />
        </div>
        <div class="mb-3">
            <input value="<?= $dados_venda['valor_acrescimo'] ?>" class="input" type="number" min="0.00" max="10000.00" step="0.01" placeholder="Valor acrescimo (R$ 00.00)" name="valor_acrescimo" />
        </div>
        <div class="mb-3">
            <div class="select">
                <select name="id_cliente">
                    <?php foreach ($clientes as $c) : ?>
                        <?php if ($id_cliente === $c['codigo']) : ?>
                            <option selected value="<?= $c["codigo"] ?>"><?= $c["primeiro_nome"] ?> </option>
                        <?php else : ?>
                            <option value="<?= $c["codigo"] ?>"><?= $c["primeiro_nome"] ?> </option>
                        <?php endif ?>
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
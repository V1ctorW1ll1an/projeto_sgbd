<?php
require 'src/config.php';
include 'src/comercio.php';

$comercio = new Comercio($mysql);
$clientes = $comercio->listar_clientes();

?>
<section class="container mt-5">
    <table class="table is-bordered">
        <thead>
            <tr>
                <th><abbr title="Código">Cod</abbr></th>
                <th><abbr title="Primeiro nome">P_nome</abbr></th>
                <th><abbr title="Segundo nome">S_nome</abbr></th>
                <th><abbr title="Data de nascimento">Data_nasc</abbr></th>
                <th><abbr title="Registo Geral">Rg</abbr></th>
                <th><abbr title="Telefone">Tel</abbr></th>
                <th><abbr title="Cep">Cep</abbr></th>
                <th><abbr title="Cidade">Cid</abbr></th>
                <th><abbr title="Endereco">End</abbr></th>
                <th><abbr title="Cpf">Cpf</abbr></th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <th scope="row"> <?= $cliente["codigo"] ?> </th>
                    <td> <?= $cliente["primeiro_nome"] ?> </td>
                    <td> <?= $cliente["segundo_nome"] ?> </td>
                    <td> <?= $cliente["data_nascimento"] ?> </td>
                    <td> <?= $cliente["rg"] ?> </td>
                    <td> <?= $cliente["fone"] ?> </td>
                    <td> <?= $cliente["cep"] ?> </td>
                    <td> <?= $cliente["cidade"] ?> </td>
                    <td> <?= $cliente["endereco"] ?> </td>
                    <td> <?= $cliente["cpf"] ?> </td>
                    <td>
                        <a class="mr-1 has-text-success" href="editar_cliente.php?id_cliente=<?= $cliente["codigo"] ?>">
                            Editar
                        </a>
                        <a class="ml-1 has-text-danger" href="excluir_cliente.php?id_cliente=<?= $cliente["codigo"] ?>">
                            Excluir
                        </a>
                        <a class="ml-1 has-text-warning" href="cliente_vendas.php?id_cliente=<?= $cliente["codigo"] ?>">
                            Vendas
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>

<section class="container mt-5">
    <a class="button is-success is-light" href="add_cliente.php">
        Cadastrar cliente
    </a>
</section>
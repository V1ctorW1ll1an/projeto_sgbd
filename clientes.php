<?php
require 'src/config.php';
include 'src/comercio.php';

$comercio = new Comercio($mysql);
$clientes = $comercio->listar_clientes();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $primeiroNome = $_POST['primeiroNome'];
//     $segundoNome = $_POST['segundoNome'];
//     $dataNasci = $_POST['dataNasci'];
//     $cpf = $_POST['cpf'];
//     $rg = $_POST['rg'];
//     $endereco = $_POST['endereco'];
//     $cep = $_POST['cep'];
//     $cidade = $_POST['cidade'];
//     $fone = $_POST['fone'];

//     $store = new Store($mysql);
//     $store->addClient($primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone);

//     $store->redirect('index.php');
// }

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
                        <a class="mr-2 has-text-success" href="">
                            Editar
                        </a>
                        <a class="ml-2 has-text-danger" href="excluir_cliente.php?id_cliente=<?= $cliente["codigo"] ?>">
                            Excluir
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
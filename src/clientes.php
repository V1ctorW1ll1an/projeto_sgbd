<?php
require 'config.php';
include 'comercio.php';

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
<section>
    <table class="table">
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
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>
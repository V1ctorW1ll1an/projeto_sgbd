<?php
class Comercio
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function listar_clientes(): array
    {
        $clientes = 'SELECT * FROM cliente';
        $q = $this->mysql->query($clientes);
        $resposta =  $q->fetch_all(MYSQLI_ASSOC);
        return $resposta;
    }

    public function listar_vendas(): array
    {
        $vendas = 'SELECT * FROM vendas';
        $q = $this->mysql->query($vendas);
        return $q->fetch_all(MYSQLI_ASSOC);
    }

    public function add_venda($id_cliente, $valor_parcial, $valor_desconto, $valor_acrescimo)
    {
        $valor_total = $valor_parcial - $valor_desconto + $valor_acrescimo;
        if (!$id_cliente || !$valor_parcial || !$valor_desconto || !$valor_acrescimo) {
            echo "Preencha todos os campos corretamente!";
        }
        $q = $this->mysql->prepare("INSERT INTO vendas (codigo_cliente, valor_parcial, valor_desconto, valor_acrescimo,valorTotal, data) VALUES (?,?,?,?,?, NOW())");

        $q->bind_param('idddd', $id_cliente, $valor_parcial, $valor_desconto, $valor_acrescimo, $valor_total);
        $q->execute();
    }

    // public function addClient(
    //     string $primeiroNome,
    //     string $segundoNome,
    //     string $dataNasci,
    //     string $cpf,
    //     string $rg,
    //     string $endereco,
    //     string $cep,
    //     string $cidade,
    //     string $fone
    // ) {
    //     $addClient = $this->mysql->prepare("INSERT INTO 
    //     client (primeiroNome, segundoNome, dataNasci, cpf, rg, endereco, cep, cidade, fone)
    //     VALUES (?,?,?,?,?,?,?,?,?,?)");

    //     $addClient->bind_param('ssssssssss', $primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone);

    //     $addClient->execute();
    // }
}

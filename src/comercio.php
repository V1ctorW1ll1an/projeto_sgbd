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

    public function cadastrar_cliente(
        string $primeiro_nome,
        string $segundo_nome,
        string $data_nascimento,
        string $cpf,
        string $rg,
        string $endereco,
        string $cep,
        string $cidade,
        string $telefone
    ) {

        $q = $this->mysql->prepare("INSERT INTO cliente (primeiro_nome, segundo_nome, data_nascimento, rg, fone, cep, cidade, endereco, cpf) VALUES (?,?,?,?,?,?,?,?,?)");

        $q->bind_param('sssssssss', $primeiro_nome, $segundo_nome, $data_nascimento, $rg, $telefone, $cep, $cidade, $endereco, $cpf);

        $q->execute();
    }
}

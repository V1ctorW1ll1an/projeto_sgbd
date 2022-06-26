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
        $vendas = 'SELECT vendas.*, cliente.primeiro_nome FROM vendas, cliente where vendas.codigo_cliente = cliente.codigo;';
        $q = $this->mysql->query($vendas);
        $resultados = $q->fetch_all(MYSQLI_ASSOC);
        return $resultados;
    }

    public function add_venda(int $id_cliente, float $valor_parcial, float $valor_desconto, float $valor_acrescimo)
    {
        $valor_total = $valor_parcial - $valor_desconto + $valor_acrescimo;
        $q = $this->mysql->prepare("INSERT INTO vendas (codigo_cliente, valor_parcial, valor_desconto, valor_acrescimo,valor_total, data) VALUES (?,?,?,?,?, NOW())");
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

    public function excluir_cliente($id_cliente): bool
    {
        $venda = $this->mysql->prepare("SELECT * FROM vendas WHERE codigo_cliente = ?");
        $venda->bind_param('s', $id_cliente);
        $venda->execute();
        $resultado = $venda->get_result()->fetch_assoc();


        if ($resultado) {
            return false;
        }
        $q = $this->mysql->prepare("DELETE FROM cliente WHERE codigo=?");
        $q->bind_param('s', $id_cliente);
        $q->execute();
        return true;
    }
    public function pegarCliente($id_cliente)
    {
        $q = $this->mysql->prepare("SELECT * FROM cliente WHERE codigo=?");
        $q->bind_param('s', $id_cliente);

        $q->execute();

        $cliente = $q->get_result()->fetch_assoc();

        return $cliente;
    }
    public function atualizar_cliente(
        int $id_cliente,
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

        $q = $this->mysql->prepare("UPDATE cliente SET primeiro_nome=?, segundo_nome=?, data_nascimento=?, cpf=?, rg=?, endereco=?, cep=?, cidade=?, fone=? WHERE codigo=?");

        if ($q === false) {
            echo "Error ao atualizar cliente";
            return;
        }
        $q->bind_param('sssssssssi', $primeiro_nome, $segundo_nome, $data_nascimento, $cpf, $rg, $endereco, $cep, $cidade, $telefone, $id_cliente);
        $q->execute();
    }

    public function excluir_venda($id_venda)
    {
        $q = $this->mysql->prepare("DELETE FROM vendas WHERE codigo=?");
        $q->bind_param('s', $id_venda);
        $q->execute();
    }

    public function atualizar_venda(int $id_venda, int $id_cliente, float $valor_parcial, float $valor_desconto, float $valor_acrescimo)
    {
        $valor_total = $valor_parcial - $valor_desconto + $valor_acrescimo;

        $q = $this->mysql->prepare("UPDATE vendas SET codigo_cliente=?, valor_parcial=?, valor_desconto=?, valor_acrescimo=?, valor_total=? WHERE codigo=?");

        $q->bind_param('iddddi', $id_cliente, $valor_parcial, $valor_desconto, $valor_acrescimo, $valor_total, $id_venda);
        $q->execute();
    }

    public function pegar_venda_por_id($id_venda)
    {
        $q = $this->mysql->prepare("SELECT * FROM vendas WHERE codigo=?");
        $q->bind_param('s', $id_venda);

        $q->execute();

        $venda = $q->get_result()->fetch_assoc();

        return $venda;
    }
}

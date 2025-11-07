<?php
include("config.php");
class Produto
{
    private $produto;
    private $preco;
    private $quantidade;
    private $categoria;
    private $conn;

    public function __construct($produto, $preco, $quantidade, $categoria)
    {
        global $conn;
        $this->conn = $conn;
        $this->produto = $produto;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->categoria = $categoria;
    }
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function insereProduto()
    {
        try {
            $sql = $this->conn->prepare("INSERT INTO produto (produto, preco, quantidade, categoria) VALUES (?, ?, ?, ?)");

            $sql->bind_param('sdis', $this->produto, $this->preco, $this->quantidade, $this->categoria);
            $sql->execute();
            echo "<script>alert('Produto cadastrado com sucesso!');</script>";
        } catch (mysqli_sql_exception $e) {
            echo "Erro ao processar o cadastro:" . $e->getMessage();
        }
        $sql->close();
    }
    public function consultaProduto($id = null)
    {
        if ($id) {
            try {
                $sql = $this->conn->prepare("SELECT * FROM produto WHERE id = ?");
                $sql->bind_param('i', $id);
                $sql->execute();
                $result = $sql->get_result();
                $produto = $result->fetch_assoc();
                $sql->close();
                return $produto;
            } catch (mysqli_sql_exception $e) {
                echo "Erro ao processar a atualização." . $e->getMessage();
            }
        } else {
            try {
                $sql = $this->conn->prepare("SELECT * FROM produto");
                $sql->execute();
                $result = $sql->get_result();
                $produtos = [];
                while ($linha = $result->fetch_assoc()) {
                    $produtos[] = $linha;
                }
                $sql->close();
                return $produtos;
            } catch (mysqli_sql_exception $e) {
                echo "Erro ao processar a consulta." . $e->getMessage();
            }
        }
        $sql->close();
    }
    public function atualizaProduto($id)
    {
        try {
            $sql = $this->conn->prepare("UPDATE produto SET produto = ?, preco = ?, quantidade = ?, categoria = ? WHERE id = ?");
            $sql->bind_param('sdisi', $this->produto, $this->preco, $this->quantidade, $this->categoria, $id);
            $sql->execute();
            echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
        } catch (mysqli_sql_exception $e) {
            echo "Erro ao processar a atualização." . $e->getMessage();
        }
        $sql->close();
    }

    public function apagaProduto($id)
    {
        try {
            $sql = $this->conn->prepare("DELETE FROM produto WHERE id = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
            echo "<script>alert('Produto apagado com sucesso')</script>";
        } catch (mysqli_sql_exception $e) {
            echo "Erro ao processar a atualização." . $e->getMessage();
        }
        $sql->close();
    }

    public function cadastraImagem($id, $produto, $foto)
    {
        if (isset($foto) && $foto['erro'] === ['UPLOAD_ERR_OK']) {
            $nomeTemporario = $foto['tmp_name'];
            $nomeOriginal = basename($foto['name']);
            $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

            $novoNome = "img_{$id}_{$produto}.{$extensao}";
            $diretorio = "imagens/";

            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0777, true);
            }
            $caminhoFinal = $diretorio . $novoNome;
            if (move_uploaded_file($nomeTemporario, $caminhoFinal)) {
                $sql = $this->conn->prepare("UPDATE produto SET caminhoImagem =? WHERE id = ?");
                $sql->bind_param('si', $caminhoFinal, $id);
                $sql->execute();
                echo "<script>alert('Arquivo enviado com sucesso!');</script>";
            } else {
                echo "<script>alerta('Ocorreu um erro ao mover o arquivo.');</script>";
            }
        } else {
            echo "<script>alerta('Nenhum arquivo foi selecionado ou correu um erro.');</script>";
        }
    }
    public function vendeProduto($id,$quantidade) {
        try {
            $sql = $this->conn->prepare("UPDATE produto SET quantidade = (quantidade - ?) WHERE id = ?");
            $sql->bind_param('ii',$quantidade,$id);
            $sql->execute();
        } catch (mysqli_sql_exception $e) {
            echo "Erro ao processar a atualização.".$e->getMessage();
        }
        $sql->close();
    }
}

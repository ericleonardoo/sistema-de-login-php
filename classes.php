<?php 
    include("config.php");
    class Produto {
        private $produto;
        private $preco;
        private $quantidade;
        private $categoria;
        private $conn;

        public function __construct($produto, $preco, $quantidade, $categoria) {
            global $conn;
            $this->conn = $conn;
            $this->produto = $produto;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
            $this->categoria = $categoria;
        }
        public function setProduto($produto) {
            $this->produto = $produto;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }
        
        public function insereProduto() {
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
        public function consultaProduto($id = null) {
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
            }else{
                try {
                    $sql = $this->conn->prepare("SELECT * FROM produto");
                    $sql->execute();
                    $result = $sql->get_result();
                    $produtos = [];
                    while($linha = $result->fetch_assoc()){
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
        public function atualizaProduto($id) {
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

        public function apagaProduto ($id) {
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
    }
?>
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
    }
?>
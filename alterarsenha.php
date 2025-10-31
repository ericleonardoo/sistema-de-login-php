<?php 
    session_start();
    include "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $senha = $_POST["senha"];
        $id=$_SESSION["usuario_id"];
        $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
        try {
            $sql = $conn -> prepare(" UPDATE cadastro SET senha = ? WHERE id = ? ");
            $sql->bind_param('si', $hash_senha, $id);
            $sql->execute();
            if ( $sql->affected_rows > 0) {
                echo "<script>alert('Senha alterada com sucesso!'); window.location.href='login.html';</script>";
            } else {
                echo "Ocorreu um erro ao alterar a senha.";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Ocorreu um erro ao alterar a senha. " . $e->getMessage();
        } finally {
            mysqli_close($conn);
        }
    }
?>
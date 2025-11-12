<?php
    session_start();
    include "config.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        try {
        $sql = $conn->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = ?");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if ($result && $result->num_rows == 1 ){
            $usuario = $result->fetch_assoc();
             if ($usuario['email'] && password_verify($senha,$usuario["senha"])) {
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_nome'] = $usuario['nome'];
                $_SESSION['user'] = $email;
                if (isset($_POST['lembrar'])) {
                    setcookie('lembrar_email', $email, time() + 3600, "/");
                } else {
                    setcookie('lembrar_email', '', time() - 3600, "/");
                }
                header("Location: painelusuario.php");
                exit;
            } else {
                echo "Email e/ou senha incorreto.";
            }
        } else  {
            echo "Email e/ou senha incorreto.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Erro ao processar login: ". $e->getMessage();
    } finally {
        mysqli_close($conn);
    }
    }
?>
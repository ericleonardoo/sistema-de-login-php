<?php 
    $nome = htmlspecialchars($_POST["nome"]);
    $sobrenome = htmlspecialchars($_POST["sobrenome"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $data_nascimento = $_POST["data_nascimento"];
    $email = htmlspecialchars($_POST["email"]);
    $senha = htmlspecialchars($_POST["senha"]);
    try {
        $valida = $conn->prepare("SELECT 1 FROM cadastro WHERE email = ?");
        $valida->bind_param('s', $email);
        $valida->execute();
        $valida->get_result();
        if ($valida->num_rows > 0) {
            echo "E-mail já cadastrado";
            $valida->close();
            $conn->close();
            exit;
        }
        $valida->close();
        $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
        $sql = $conn->prepare("INSERT INTO cadastro (nome, sobrenome, telefone, data_nascimento, email, senha)
                              VALUES (?,?,?,?,?,?)");
        $sql->bind_param('ssssss', $nome, $sobrenome, $telefone, $data_nascimento, $email, $senha, $hash_senha);
        $sql->execute();
        $sql->close();
        echo 'Cadastro realizado com sucesso! <a href="loginadmin.html">Login</a>';
    } catch (mysqli_sql_exception $e) {
        echo "Erro ao processar cadastro." . $e->getMessage();
    }
    mysqli_close($conn);
    ?>
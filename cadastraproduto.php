<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        /* Importa fonte */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        :root{
            --bg: #f6f9ff;
            --card: #ffffff;
            --primary: #2563eb;
            --primary-600: #1d4ed8;
            --muted: #64748b;
            --border: #e6eefc;
            --radius: 12px;
            --shadow-sm: 0 6px 18px rgba(37,99,235,0.08);
        }

        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, 'Helvetica Neue', Arial;
            background:var(--bg);
            color:#0f172a;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            padding:3.5rem 1rem;
        }

        h2{
            text-align:center;
            margin:0 0 1rem 0;
            font-size:1.5rem;
            font-weight:600;
            color:var(--primary-600);
        }

        /* estiliza o form como card centralizado */
        form{
            max-width:720px;
            margin:0 auto;
            background:linear-gradient(180deg, rgba(255,255,255,0.9), var(--card));
            border-radius:var(--radius);
            padding:1.5rem 1.25rem;
            box-shadow:var(--shadow-sm);
            border:1px solid var(--border);
        }

        /* cada linha: texto (ex: Nome:) e input ficam empilhados para layout limpo */
        form > * { max-width:100%; }

        /* deixamos o texto (Nome:, Preço:) com estilo suave */
        form p.label-text{
            margin:0 0 .25rem 0;
            color:var(--muted);
            font-size:0.95rem;
            font-weight:500;
        }

        /* inputs - full width, arredondados */
        input[type="text"],
        input[type="number"],
        input[type="password"],
        input[type="email"],
        input[type="date"]{
            width:100%;
            padding:.72rem .9rem;
            border-radius:10px;
            border:1px solid var(--border);
            background:#fff;
            font-size:0.95rem;
            color: #071133;
            transition:box-shadow .18s ease, border-color .18s ease, transform .06s ease;
        }

        input:focus{
            outline:none;
            border-color:var(--primary);
            box-shadow:0 6px 20px rgba(37,99,235,0.12);
            transform:translateY(-1px);
        }

        /* espaçamento entre campos (substitui os <br><br>) */
        input + br { display:none; }
        input + br + br { display:none; }

        /* botão estilizado */
        button[type="submit"]{
            display:inline-block;
            width:100%;
            padding:0.9rem 1rem;
            margin-top:0.5rem;
            border-radius:10px;
            border:none;
            background:linear-gradient(90deg,var(--primary),var(--primary-600));
            color:#fff;
            font-weight:600;
            font-size:1rem;
            cursor:pointer;
            box-shadow:0 8px 24px rgba(37,99,235,0.12);
            transition:transform .14s ease, box-shadow .14s ease, opacity .12s ease;
        }

        button[type="submit"]:hover{
            transform:translateY(-3px);
            box-shadow:0 18px 40px rgba(37,99,235,0.14);
        }

        button[type="submit"]:active{ transform:translateY(0); }

        /* layout responsivo - inputs empilhados em telas pequenas */
        @media (min-width:720px){
            /* para telas maiores, manter inputs em colunas, alinhamento melhor */
            .row{
                display:flex;
                gap:1rem;
            }
            .row .col{ flex:1 }
        }

        @media (max-width:420px){
            body{ padding:1.25rem }
            form{ padding:1rem }
        }
    </style>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <form action="" method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Preço: <input type="number" name="preco" step="0.01" required><br><br>
        Quantidade: <input type="number" name="quantidade" step="1" required><br><br>
        Categoria: <input type="text" name="categoria" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php
        include "classes.php";
        $cadProduto = new Produto("", "", "", "");
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $produto = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];
            $categoria = $_POST['categoria'];
            $cadProduto->setProduto($produto);
            $cadProduto->setPreco($preco);
            $cadProduto->setQuantidade($quantidade);
            $cadProduto->setCategoria($categoria);
            $cadProduto->insereProduto();
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos - AutoPrime</title>
    <!-- Import Three.js -->
    <!-- Three.js principal -->
<script src="https://cdn.jsdelivr.net/npm/three@0.148.0/build/three.min.js"></script>

<!-- GLTFLoader compatível com esta versão -->
<script src="https://cdn.jsdelivr.net/npm/three@0.148.0/examples/js/loaders/GLTFLoader.js"></script>

    <style>
        :root {
            --laranja: #FF6A00;
            --preto: #0a0a0a;
            --branco: #ffffff;
            --cinza: #f5f5f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: var(--branco);
            color: var(--preto);
            overflow-x: hidden;
        }

        header {
            background-color: var(--preto);
            color: var(--branco);
            text-align: center;
            padding: 20px 10px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        header h1 {
            font-weight: 600;
            letter-spacing: 2px;
        }

        header a {
            color: var(--laranja);
            text-decoration: none;
            font-weight: 500;
            margin-top: 10px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        header a:hover {
            color: var(--branco);
        }

        /* Hero 3D Section */
        .hero3d {
            width: 100%;
            height: 420px;
            background: linear-gradient(180deg, var(--preto), #1c1c1c);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #three-container {
            width: 100%;
            height: 100%;
        }

        .hero-text {
            position: absolute;
            text-align: center;
            color: var(--branco);
        }

        .hero-text h2 {
            font-size: 2.2rem;
            letter-spacing: 1px;
        }

        /* Produtos */
        .produtos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            padding: 60px 40px;
            background-color: var(--branco);
        }

        .produto {
            background-color: var(--cinza);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .produto:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.15);
        }

        .produto img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .produto h3 {
            color: var(--preto);
            margin-top: 15px;
            font-size: 1.2rem;
        }

        .produto p {
            color: var(--laranja);
            font-weight: 600;
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .produto form {
            padding: 15px;
        }

        .produto input[type="number"] {
            width: 60px;
            padding: 6px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 8px;
        }

        .produto button {
            background-color: var(--laranja);
            color: var(--branco);
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .produto button:hover {
            background-color: #e65c00;
        }

        footer {
            text-align: center;
            background-color: var(--preto);
            color: var(--branco);
            padding: 20px 10px;
            margin-top: 40px;
        }

        footer p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        @media (max-width: 600px) {
            .hero-text h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>AutoPrime Motors</h1>
        <a href="carrinho.php">🛒 Ver Carrinho</a>
    </header>

    <section class="hero3d">
        <div id="three-container"></div>
        <div class="hero-text">
            <h2>Explore a tecnologia em cada detalhe</h2>
        </div>
    </section>

    <section class="produtos">
        <?php
            session_start();
            include "classes.php";
            $vendeProduto = new Produto("","","","");
            $produtos = $vendeProduto->consultaProduto();

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $quantidade = $_POST['quantidade'];
                if(!isset($_SESSION['carrinho'])) {
                    $_SESSION['carrinho'] = [];
                }
                if (isset($_SESSION['carrinho'][$id])) {
                    $_SESSION['carrinho'][$id] += $quantidade;
                } else {
                    $_SESSION['carrinho'][$id] = $quantidade;
                }
                echo "<script>alert('Produto adicionado ao carrinho!');</script>";
            }

            if ($produtos && count($produtos) > 0) {
                foreach ($produtos as $prod) {
                    echo "<div class='produto'>
                            <img src='{$prod['caminhoImagem']}' alt='{$prod['produto']}'>
                            <h3>{$prod['produto']}</h3>
                            <p>R$ {$prod['preco']}</p>
                            <form method='post'>
                                <input type='hidden' name='id' value='{$prod['id']}'>
                                <input type='number' name='quantidade' value='1' min='1'>
                                <button type='submit'>Comprar</button>
                            </form>
                        </div>";
                }
            } else {
                echo "<p style='grid-column: 1 / -1; text-align: center;'>Nenhum produto disponível.</p>";
            }
        ?>
    </section>

    <footer>
        <p>© 2025 AutoPrime Motors. Todos os direitos reservados.</p>
    </footer>

    <script>
      let scene, camera, renderer, model;

function init() {
    const container = document.getElementById('three-container'); // Crie uma div com id="three-container" no HTML
    scene = new THREE.Scene();

    // Câmera
    camera = new THREE.PerspectiveCamera(60, container.offsetWidth / container.offsetHeight, 0.1, 100);
    camera.position.set(0, 1.5, 3);

    // Renderer
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(container.offsetWidth, container.offsetHeight);
    container.appendChild(renderer.domElement);

    // Luzes
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambientLight);

    const dirLight = new THREE.DirectionalLight(0xffffff, 1);
    dirLight.position.set(2, 3, 5);
    scene.add(dirLight);

    // Loader do modelo
    const loader = new THREE.GLTFLoader();
    loader.load('models/carro.glb', function(gltf) {
        model = gltf.scene;
       camera.position.set(0, 1.5, 5);
model.scale.set(0.5, 0.5, 0.5);

        scene.add(model);
    });

    animate();
}

function animate() {
    requestAnimationFrame(animate);
    if(model) model.rotation.y += 0.01; // Rotação lenta do carro
    renderer.render(scene, camera);
}

// Inicializa tudo
init();
    </script>

</body>
</html>

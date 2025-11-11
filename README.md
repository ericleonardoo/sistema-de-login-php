<section class="featured-model">
            <div class="featured-content">
                <div class="text">
                    <h4>COMING SOON</h4>
                    <h2>TEMERARIO</h2>
                    <div class="buttons">
                        <a href="#" class="btn btn-yellow">DISCOVER MORE</a>
                        <a href="#" class="btn btn-outline-light">KEEP ME UPDATED</a>
                    </div>
                </div>
                <div class="image">
                    <img src="https://via.placeholder.com/800x600/1a1a1a/ffffff?text=TEMERARIO" alt="Temerario">
                </div>
            </div>
        </section>

        <section class="news">
            <h2 class="section-title">NEWS LAMBORGHINI WORLD</h2>
            
            <article class="news-article main-article">
                <img src="https://via.placeholder.com/1200x600/006400/ffffff?text=NEWS+MAIN" alt="News 1">
                <div class="content">
                    <h5>COMPETIZIONI</h5>
                    <h3>HEADLINE DA NOTÍCIA PRINCIPAL</h3>
                    <p>Descrição curta da notícia principal que fala sobre o evento ou o carro...</p>
                </div>
            </article>

            <div class="news-grid-secondary">
                <article class="news-article">
                    <img src="https://via.placeholder.com/400x300/c2b280/000000?text=NEWS+2" alt="News 2">
                    <div class="content">
                        <h5>ESPERIENZA</h5>
                        <h3>Aventura na Areia</h3>
                        <p>Descrição da segunda notícia...</p>
                    </div>
                </article>
                <article class="news-article">
                    <img src="https://via.placeholder.com/400x300/555555/ffffff?text=NEWS+3" alt="News 3">
                    <div class="content">
                        <h5>HERITAGE</h5>
                        <h3>História da Marca</h3>
                        <p>Descrição da terceira notícia...</p>
                    </div>
                </article>
                <article class="news-article">
                    <img src="https://via.placeholder.com/400x300/4b0082/ffffff?text=NEWS+4" alt="News 4">
                    <div class="content">
                        <h5>LAMBORGHINI IN ART</h5>
                        <h3>Arte e Carros</h3>
                        <p>Descrição da quarta notícia...</p>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-links">
            <div class="footer-column">
                <h5>COMPANY</h5>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">News</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h5>MODELS</h5>
                <ul>
                    <li><a href="#">Revuelto</a></li>
                    <li><a href="#">Huracán</a></li>
                    <li><a href="#">Urus</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h5>SUPPORT</h5>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Dealers</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>


/* Hero Section */
.hero-section {
    height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #000;
    overflow: hidden;
}

.three-container {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 3;
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 1200px;
    padding: 0 60px;
    width: 100%;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: 30px;
    padding: 60px 80px;
    border: 1px solid rgba(255, 215, 0, 0.2);
    box-shadow: var(--shadow-deep);
}

/* Hero Vehicles */
.hero-vehicles {
    position: absolute;
    bottom: 80px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    width: 90%;
    max-width: 1200px;
}

.vehicle-showcase {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-top: 40px;
}

.vehicle-item {
    text-align: center;
    padding: 20px;
    background: transparent;
    border-radius: 0;
    border: none;
    transition: all 0.3s ease;
}

.vehicle-item:hover {
    transform: translateY(-5px);
}

.vehicle-name {
    font-size: 16px;
    font-weight: 400;
    color: var(--accent-white);
    margin-bottom: 5px;
    letter-spacing: 0.5px;
}

.vehicle-price {
    font-size: 14px;
    color: var(--primary-gold);
    font-weight: 400;
}

.hero-title {
    font-size: 64px;
    font-weight: 300;
    letter-spacing: -1px;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(30px);
    animation: heroFadeInUp 1s ease forwards;
    color: var(--accent-white);
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 20px;
    font-weight: 400;
    letter-spacing: 0.5px;
    margin-bottom: 30px;
    color: var(--text-gray);
    opacity: 0;
    transform: translateY(30px);
    animation: heroFadeInUp 1s ease 0.2s forwards;
}

.hero-description {
    font-size: 16px;
    font-weight: 300;
    line-height: 1.6;
    color: var(--text-gray);
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0;
    transform: translateY(30px);
    animation: heroFadeInUp 1s ease 0.4s forwards;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    opacity: 0;
    animation: heroFadeInUp 1s ease 0.6s forwards;
    margin-top: 20px;
}

.cta-primary {
    background: var(--primary-gold);
    color: var(--primary-black);
    padding: 15px 30px;
    border: none;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.cta-primary:hover {
    background: #d4af37;
    transform: translateY(-2px);
}

.cta-secondary {
    background: transparent;
    color: var(--accent-white);
    padding: 15px 30px;
    border: 1px solid var(--accent-white);
    border-radius: 25px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.cta-secondary:hover {
    background: var(--accent-white);
    color: var(--primary-black);
}

/* About Section */
.about-section {
    padding: 100px 0;
    background: #fff;
    position: relative;
}

.about-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 60px;
}

.about-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.about-title {
    font-size: 36px;
    font-weight: 300;
    letter-spacing: -0.5px;
    margin-bottom: 30px;
    color: var(--primary-black);
}

.about-description {
    font-size: 18px;
    line-height: 1.6;
    color: var(--text-gray);
    margin-bottom: 40px;
    font-weight: 300;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 80px;
    margin-top: 80px;
}

.feature-card {
    text-align: center;
    padding: 40px;
    background: transparent;
    border: none;
    border-radius: 0;
    transition: all 0.3s ease;
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: transparent;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    font-size: 24px;
    color: var(--primary-gold);
    border: 2px solid var(--primary-gold);
}

.feature-title {
    font-size: 20px;
    font-weight: 400;
    color: var(--primary-black);
    margin-bottom: 20px;
    letter-spacing: 0.5px;
}

.feature-description {
    font-size: 16px;
    color: var(--text-gray);
    line-height: 1.6;
    font-weight: 300;
}

/* Products Section */
.products-section {
    padding: 100px 0;
    background: #f8f8f8;
    position: relative;
}

/* Hero Search Panel */
.hero-search {
    position: relative;
    margin: 20px auto 40px auto;
    max-width: 980px;
    background: #ffffff;
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    border-radius: 14px;
    padding: 22px 26px;
}

.hero-search .search-title {
    font-size: 16px;
    color: #111;
    font-weight: 500;
    margin-bottom: 16px;
}

.search-form {
    display: grid;
    grid-template-columns: 1fr 1fr auto;
    gap: 16px;
    align-items: end;
}

.search-group label {
    display: block;
    font-size: 12px;
    color: #666;
    margin-bottom: 8px;
}

.search-group select {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    color: #333;
    font-size: 14px;
}

.search-button {
    padding: 12px 24px;
    border: none;
    border-radius: 10px;
    background: #c75b34;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.2s ease;
}

.search-button:hover {
    background: #b44f2c;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-top: 60px;
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
    padding: 0 60px;
}

.product-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
    position: relative;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.product-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.product-info {
    padding: 30px;
}

/* Product image overlay */
.product-image-container {
    position: relative;
}

.product-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    opacity: 0;
    transition: opacity 0.2s ease;
}

.product-image-container:hover .product-overlay {
    opacity: 1;
}

.view-button,
.know-button {
    padding: 10px 16px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 13px;
    transition: all 0.2s ease;
}

.view-button {
    background: var(--primary-gold);
    color: var(--primary-black);
}

.view-button:hover {
    filter: brightness(0.95);
}

.know-button {
    background: #ffffff;
    color: #111111;
}

.know-button:hover {
    background: #f2f2f2;
}

.product-name {
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 10px;
    color: var(--primary-black);
    letter-spacing: 0.5px;
}

.product-price {
    font-size: 18px;
    color: var(--primary-black);
    font-weight: 400;
    margin-bottom: 20px;
}

.add-to-cart-form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.quantity-input {
    width: 50px;
    padding: 8px;
    background: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: var(--primary-black);
    text-align: center;
    font-size: 14px;
}

.quantity-input:focus {
    outline: none;
    border-color: var(--primary-gold);
}

.add-to-cart-btn {
    flex: 1;
    padding: 10px 20px;
    background: var(--primary-gold);
    color: var(--primary-black);
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    transition: all 0.3s ease;
}

.add-to-cart-btn:hover {
    background: #d4af37;
}

/* Contact Section */
.contact-section {
    padding: 100px 0;
    background: #f8f8f8;
    position: relative;
}

/* Footer */
.footer {
    background: var(--secondary-black);
    padding: 60px 0 30px;
    text-align: center;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 40px;
}

.footer-logo {
    font-size: 32px;
    color: var(--primary-gold);
    letter-spacing: 4px;
    margin-bottom: 20px;
    font-weight: 300;
}

.footer-text {
    color: var(--text-gray);
    margin-bottom: 30px;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-bottom: 40px;
}

.social-link {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-white);
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.social-link:hover {
    background: var(--primary-gold);
    color: var(--primary-black);
    transform: translateY(-3px);
}

.copyright {
    color: var(--text-gray);
    font-size: 14px;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .header-content {
        padding: 0 20px;
    }
    
    .nav-menu {
        display: none;
    }
    
    .hero-title {
        font-size: 48px;
        letter-spacing: 4px;
    }
    
    .hero-subtitle {
        font-size: 18px;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .container {
        padding: 0 20px;
    }
    
    .section-title {
        font-size: 36px;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Scroll Animations */
.scroll-animate {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.8s ease;
}

.scroll-animate.show {
    opacity: 1;
    transform: translateY(0);
}



<!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-background"></div>
        <div class="three-container" id="three-container"></div>
        <div class="hero-content">
            <div class="hero-text-content">
                <h1 class="hero-title">Mude suas perspectivas</h1>
                <p class="hero-subtitle">Mova a sua paixão</p>
                <p class="hero-description">
                    Escolha o modelo ideal para o seu estilo de vida
                </p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title scroll-animate">Por Que Nos Escolher</h2>
            <div class="features-grid">
                <div class="feature-card scroll-animate">
                    <div class="feature-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="feature-title">Luxo Premium</h3>
                    <p class="feature-description">Selecionamos apenas os veículos mais exclusivos e sofisticados do mercado.</p>
                </div>
                <div class="feature-card scroll-animate">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="feature-title">Assistência Especializada</h3>
                    <p class="feature-description">Nossa equipe de especialistas garante a manutenção perfeita do seu veículo.</p>
                </div>
                <div class="feature-card scroll-animate">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Garantia Total</h3>
                    <p class="feature-description">Tranquilidade total com nossa garantia abrangente e suporte 24/7.</p>
                </div>
            </div>
        </div>
    </section>






<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurum Motors - Conduzindo a Excelência</title>
    
    <!-- Import Three.js -->
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="venda.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loading">
        <div class="loading-spinner"></div>
    </div>

    <!-- Header -->
    <header>
        <nav>
            <div class="nav-left">
                <span>☰</span> </div>
            <div class="logo">
                <img src="./imagens/logoaurumpng.png" alt="Logo Aurum">
            </div>
            <div class="nav-right">
                <span>S</span> <span>U</span> </div>
        </nav>
        <a href="carrinho.php" class="cart-button">
                <i class="fas fa-shopping-cart"></i>
            </a>
    </header>
            
        </div>
    </header>

    <!-- Products Section -->
    <section class="products-section" id="vehicles">
        <div class="container">
            <h2 class="section-title scroll-animate">Encontre seu próximo veículo</h2>
            <div class="products-grid">
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
                            echo "<img src ='{$prod['caminhoImagem']}' alt='{$prod['produto']}''
                            <h3>{$prod['produto']}</h3>
                            <p>R$ {$prod['preco']}</p>
                            
                            <form method='post'>
                                <input type='hidden' name='id' value='{$prod['id']}'>
                                <input type='number' name='quantidade' value='1' min='1'>
                                <button type='submit'>Comprar</button>
                            </form>";
                        }
                    } else {
                        echo "<p>Nenhum produto disponível no momento.</p>";
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="about-content">
                <h2 class="section-title">Conheça a Avantgarde</h2>
                <p class="about-description">
                    A Avantgarde é referência no mercado de automóveis multimarcas premium. 
                    Com foco em veículos superesportivos e exclusivos, destaca-se pela personalidade 
                    nos negócios, qualidade do estoque e fidelidade dos mais de vinte mil clientes 
                    no país, conquistados nessa trajetória.
                </p>
                <div class="about-features">
                    <div class="about-feature">
                        <h3>Experiência Única</h3>
                        <p>Uma experiência imersiva como nunca vista, projetada para você se impressionar.</p>
                    </div>
                    <div class="about-feature">
                        <h3>Qualidade Garantida</h3>
                        <p>Selecionamos apenas os veículos mais exclusivos e sofisticados do mercado.</p>
                    </div>
                    <div class="about-feature">
                        <h3>Atendimento Personalizado</h3>
                        <p>Nossa equipe de especialistas garante a melhor experiência de compra.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <h2 class="section-title">Não encontrou o modelo que estava buscando?</h2>
            <p class="contact-description">Deixe agora o seu contato para ser notificado(a) quando chegar o seu modelo</p>
            <form class="contact-form">
                <input type="text" placeholder="Nome" class="form-input">
                <input type="email" placeholder="E-mail" class="form-input">
                <input type="tel" placeholder="Telefone" class="form-input">
                <select class="form-select">
                    <option>Marca de interesse</option>
                    <option>Lamborghini</option>
                    <option>Ferrari</option>
                    <option>Porsche</option>
                    <option>Outros</option>
                </select>
                <button type="submit" class="submit-button">Enviar contato</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">Avantgarde</div>
            <p class="footer-text">Conduzindo a Excelência</p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="copyright">© 2025 Avantgarde. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>

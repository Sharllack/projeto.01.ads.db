<?php

use LDAP\Result;

if(!isset($_SESSION)) {
    session_start();
};

include('./conexCadProd.php');

$sql_query = "SELECT * FROM prod" or die($mysqli->error);
$result = $mysqli->query($sql_query);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imagens/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./estilo.principal/styles.css">
    <link rel="stylesheet" href="./estilo.principal/media.queries.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Projeto 01 ADS </title>
</head>
<body onresize="mudouTamanho()">
    <header id="header">
        <menu id="topo">
            <h1>
                <div id="title">
                    <a href="./index.php"><img src="./imagens/logolm1.png" alt="logo L e M" id="img1"></a>
                    <a href="./index.php"><img src="./imagens/logonfl.png" alt="logo nfl" id="img2"></a>
                </div>
                <input type="search" name="pes" id="idpes" placeholder="O que você está buscando?">
            </h1>
            <button class="hamburguer"></button>
            <section id="logado">
                <ul id="usu">
                    <?php if(!isset($_SESSION['usuario'])):?>
                        <li><a href="./login.php" class="topolog">Login &#x1F464</a></li>
                        <li><a href="./cadastro.php" class="topocad"> Cadastre-se  &#x1F58A &#xFE0F</a></li>
                        <li><a href="#"><img src="./imagens/logo-facebook.jpg" alt="Facebook" class="logos"></a></li>
                        <li><a href="#"><img src="./imagens/logo-instagram.jpg" alt="Instagram" class="logos"></a></li>
                        <li><a href="#"><img src="./imagens/x_logo.png" alt="Twitter" class="logos"></a></li>
                        <li><a href="https://wa.me/5521990420932"><img src="./imagens/whats_logo.png" alt="Whatsapp" class="logos"></a></li>
                    <?php else: ?>
                        <p class="topolog">Olá, <?=$_SESSION['usuario']?>!</p>
                        <li><a href="#"><img src="./imagens/logo-facebook.jpg" alt="Facebook" class="logos"></a></li>
                        <li><a href="#"><img src="./imagens/logo-instagram.jpg" alt="Instagram" class="logos"></a></li>
                        <li><a href="#"><img src="./imagens/x_logo.png" alt="Twitter" class="logos"></a></li>
                        <li><a href="https://wa.me/5521990420932"><img src="./imagens/whats_logo.png" alt="Whatsapp" class="logos"></a></li>
                        <li><a href="./logout.php" class="topocad">Logout</a></li>
                        <li><a href="./logout.php"><span class="material-symbols-outlined">logout</span></a></li>
                    <?php endif; ?>
                    <li>
                        <label class="toggle-button">
                            <input type="checkbox" class="toggle">
                            <span class="slider1 round"></span>
                        </label>
                    </li>
                </ul>
            </section>
        </menu>
        <span id="burguer" class="material-symbols-outlined" onclick="clickMenu()">Menu</span>
    </header>
    <menu id="pe">
        <ul>
            <li class="dropdown">
                <a href="#" class = "dropname">Luvas</a>

                <div class="dropdown-menu">
                    <a href="./compra.php" id="p1" onclick="selecionarProduto('p1')">F8 - Under Armour</a>
                    <a href="./compra.php" id="p2" onclick="selecionarProduto('p2')">Battle Ultra-Sticky</a>
                </div>
            
            </li>
            <li class="dropdown">
                <a href="#" class = "dropname">Chuteiras</a>

                <div class="dropdown-menu">
                    <a href="./compra.php" id="p3" onclick="selecionarProduto('p3')">Under Armour Spotlight RM 2.0</a>
                    <a href="./compra.php" id="p4" onclick="selecionarProduto('p4')">Nike Alpha Pro 2 TD</a>
                </div>
            
            </li>
            <li class="dropdown">
                <a href="#" class = "dropname">Capacetes</a>

                <div class="dropdown-menu">
                    <a href="./compra.php" id="p5" onclick="selecionarProduto('p5')">Helmet Schutt F7</a>
                    <a href="./compra.php" id="p6" onclick="selecionarProduto('p6')">Helmet Riddell Speed Icon</a>
                </div>


            </li>
            <li class="dropdown">
                <a href="#" class = "dropname">Shoulder pad</a>

            <div class="dropdown-menu">
                <a href="./compra.php" id="p7" onclick="selecionarProduto('p7')">Surge Youth Riddell</a>
                <a href="./compra.php" id="p8" onclick="selecionarProduto('p8')">Gauntlet I Youth Champro</a>
                <a href="./compra.php" id="p9" onclick="selecionarProduto('p9')">Rival Varsity Riddell</a>
            </div>   
                    
            </li>
            <li class="dropdown">
                <a href="#" class = "dropname">Bolas</a>

            <div class="dropdown-menu">
                <a href="./compra.php" id="p10" onclick="selecionarProduto('p10')">NFL Super Grip Wilson</a>
                <a href="./compra.php" id="p11" onclick="selecionarProduto('p11')">NFL New England Patriots Team Logo Jr Wilson</a>
            </div>
            
            </li>

            <li class="dropdown">
                <a href="./historia.php" class = "dropname">Nossa história</a>

            </li>
        </ul>
    </menu>
        <main id="main">
            <div class="slider">

                <div class="slides">
                    <!--Radio Buttons-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <!--Radio Buttons-->
        
                    <!--Slides img-->
                    <div class="slide first">
                        <img src="./imagens/ridell-frente.jpg">
                    </div>
                    <div class="slide">
                        <img src="./imagens/champro-frente.png" alt="img2">
                    </div>
                    <div class="slide">
                        <img src="./imagens/ridellv-frente.jpg" alt="img3">
                    </div>
                    <div class="slide">
                        <img src="../imagens/imagensprojeto/shoulder pad1 atrás.webp" alt="img4">
                    </div>
                    <!--Slides img-->
        
                    <!--Navigation auto-->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                    </div>
                    <!--Navigation auto-->
        
                </div>
        
                <div class="manual-navigation">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                </div>
            </div>

            <div class="cadProd">
                <div class="prod">
                    <?php 
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="prodContent">
                            <a href="#" class="Img"><img src="<?php echo $row['imgPrin'];?>"></a>
                            <h2 class="prec"><?php echo 'R$' . number_format($row['preco'], 2 , ',', '.');?></h2>
                            <hr class="hr1">
                            <p class="nome"><a href="#"><?php echo $row['nome'];?></a></p>
                            <hr class="hr2">
                            <a href="#" class="icons" >
                                <span class="material-symbols-outlined">
                                add_shopping_cart info
                                </span>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            
        </main>
        <footer id="footer">
            <div class="footer-container">
                <div class="footer-section">
                    <h3>Sobre nós</h3>
                    <p>Somos uma loja online especializada em equipamentos esportivos de alta qualidade para futebol americano.</p>
                </div>
                <div class="footer-section">
                    <h3>Contato</h3>
                    <p>Email: contato@lojafutebolamericano.com</p>
                    <p>Telefone: +55 21 1234-5678</p>
                </div>
                <div class="footer-section">
                    <h3>Redes Sociais</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Larissa Menezes & Lucas Menezes. Todos os direitos reservados.</p>
            </div>
        </footer>


    <script src="./JS.index/funcoes.js"></script>
    <script src="./JS.index/script.js"></script>
    <script src="./JS.index/compra.js"></script>
    <script src="./JS.index/darkmode.js"></script>
</body>
</html>
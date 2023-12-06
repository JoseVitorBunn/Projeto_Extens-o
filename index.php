<?php
session_start();

// Verifica se o formulário de cadastro foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    // Aqui você pode adicionar mais campos conforme necessário

    // Armazena os dados na sessão
    $_SESSION['user'] = [
        'username' => $username,
        // Adicione mais campos da maneira que desejar
    ];
}

// Verifica se o usuário já está logado
if (isset($_SESSION['user'])) {
    $greetingMessage = 'Olá, ' . $_SESSION['user']['username'] . '! Bem-vindo de volta!';
} else {
    $greetingMessage = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto 3D</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Projeto 3D</h1>
            <div class="user-options">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span class="greeting"><?php echo $greetingMessage; ?></span>
                <?php else : ?>
                    <button onclick="showSignUp()">Sign Up</button>
                <?php endif; ?>
            </div>
        </div>

        <div id="user-input" class="input-container">
            <label for="name">Digite seu nome:</label>
            <input type="text" id="name" placeholder="Seu nome">
            <button onclick="showGreeting()">Enviar</button>
        </div>

        <div id="greeting-container" class="greeting-container" style="display:none;">
            <div id="greeting"></div>
        </div>

        <div class="image-grid-container">
            <?php
            $imagePath = 'Imagens/';
            $images = glob($imagePath . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

            foreach ($images as $image) {
                echo '<div class="image-item"><img src="' . $image . '" alt="Imagem"></div>';
            }
            ?>
        </div>
    </div>

    <div id="signup-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeSignUp()">&times;</span>
            <h2>Sign Up</h2>
            <form method="post" action="">
                <label for="username">Nome de Usuário:</label>
                <input type="text" id="username" name="username" required>
                <!-- Adicione mais campos conforme necessário -->

                <button type="submit" name="signup">Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

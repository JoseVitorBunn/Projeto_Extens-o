<?php
session_start();

// Adicione o código abaixo para exibir a resposta do upload
if (isset($_SESSION['upload_response'])) {
    echo '<p>' . $_SESSION['upload_response'] . '</p>';
    unset($_SESSION['upload_response']);
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
                <?php if (!isset($_SESSION['user'])) : ?>
                    <button onclick="showSignUp()">Sign Up</button>
                <?php endif; ?>
            </div>
        </div>
        <div id="user-input" class="input-container">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="file">Escolha uma imagem:</label>
                <input type="file" name="file" id="file" accept="image/*">
                <button type="submit" name="upload">Enviar Imagem</button>
            </form>
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
    <script src="script.js"></script>
    <div class="footer">
    <p>&copy; 2023 Projeto 3D. Todos os direitos reservados.</p>
</div>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'Imagens/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo "Arquivo enviado com sucesso.";
        } else {
            echo "Erro ao enviar o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}
?>

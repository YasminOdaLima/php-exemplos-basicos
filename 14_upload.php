[10:25, 28/10/2024] Maria: <?php
// Página restrita (15b_restrita.php)
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15a_sistema.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Restrita</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p>Esta é uma página restrita, apenas para usuários logados.</p>
    <a href="15c_logout.php">Logout</a>
</body>
</html>
[10:26, 28/10/2024] Maria: 15-b
[10:28, 28/10/2024] Maria: <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de Imagem</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imagem">Selecione uma imagem:</label>
        <input type="file" name="imagem" accept="image/*" required><br>
        <button type="submit">Upload</button>
    </form>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diretorio_destino = 'uploads/';

    // Verifica se a pasta existe, caso não, cria a pasta
    if (!is_dir($diretorio_destino)) {
        mkdir($diretorio_destino, 0777, true);
    }

    $nome_arquivo = basename($_FILES['imagem']['name']);
    $caminho_completo = $diretorio_destino . $nome_arquivo;

    // Move o arquivo enviado para o diretório de destino
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
        echo "<p>Upload realizado com sucesso!</p>";
        echo "<img src='$caminho_completo' alt='Imagem enviada' style='max-width: 300px;'>";
    } else {
        echo "<p>Erro ao fazer upload do arquivo.</p>";
    }
}
?>
</body>
</html>
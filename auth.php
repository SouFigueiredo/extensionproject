<?php
session_start();
include("connect.php");

// Limite de tentativas
if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}

if ($_SESSION['tentativas'] >= 5) {
    die("Muitas tentativas. Aguarde antes de tentar novamente.");
}

// Receber dados
$user = $_POST['inUser'] ?? '';
$pass = $_POST['inPass'] ?? '';

if (empty($user) || empty($pass)) {
    die("Preencha todos os campos.");
}

// Busca segura com prepared statements
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();

    if (password_verify($pass, $dados['senha'])) {
        $_SESSION['tentativas'] = 0;
        $_SESSION['usuario'] = $dados['usuario'];
        header("Location: dashboard.php");
        exit();
    }
}

$_SESSION['tentativas']++;
echo "Usuário ou senha inválidos.";
?>

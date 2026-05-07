<?php

session_start();
require_once 'connect.php';

$usuario = $_POST['inUser'];
$senha = $_POST['inPass'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();

    if (password_verify($senha, $dados['senha'])) {
        $_SESSION['usuario'] = $dados['usuario'];
        echo "Login realizado.";
    } else {

        echo "Senha incorreta!";
    }

} else {
    echo "Usuário não encontrado!";
}
?>
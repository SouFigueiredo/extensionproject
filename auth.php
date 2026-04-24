<?php
session_start();
include("connect.php");

$user = $_POST['inUser'];
$pass = $_POST['inPass'];

$user = $conn->real_escape_string($user);

$sql = "SELECT * FROM usuarios WHERE usuario = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();

    if (password_verify($pass, $dados['senha'])) {
        $_SESSION['usuario'] = $dados['usuario'];
        echo "Login realizado com sucesso!";
    } else {
        echo "Senha incorreta!";
    }
} else  {
    echo "Usuário não encontrado!";
}
?>

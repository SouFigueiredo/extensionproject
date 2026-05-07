<?php

header('Content-Type: application/json');
session_start();
require_once '../config/connect.php';
$data = json_decode(file_get_contents("php://input"), true);

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
        echo json_encode([
            "success" => true,
            "message" => "Login realizado"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Senha incorreta"
        ]);
    }

} else {
    echo json_encode([
        "success" => false,
        "message" => "Usuário não encontrado"
    ]);
}
?>

<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../public/index.html");
    exit;
}

require_once '../config/connect.php';

$sala_id      = $_POST['sala_id'];
$turma_id     = $_POST['turma_id'];
$dataReserva  = $_POST['data_reserva'];
$periodo_id   = $_POST['periodo_id'];

$stmtUser = $conn->prepare("
    SELECT id
    FROM usuarios
    WHERE usuario = ?
");

$stmtUser->bind_param(
    "s",
    $_SESSION['usuario']
);

$stmtUser->execute();

$userResult = $stmtUser->get_result();

$user = $userResult->fetch_assoc();

$usuario_id = $user['id'];

$check = $conn->prepare("
    SELECT id
    FROM reservas

    WHERE sala_id = ?
    AND data_reserva = ?
    AND periodo_id = ?
");

$check->bind_param(
    "isi",
    $sala_id,
    $dataReserva,
    $periodo_id
);

$check->execute();

$checkResult = $check->get_result();

if ($checkResult->num_rows > 0) {

    echo "
        <script>
            alert('Essa sala já está reservada nesse período.');
            window.location.href='../../public/dashboard.php';
        </script>
    ";

    exit;
}

$stmt = $conn->prepare("
    INSERT INTO reservas (

        sala_id,
        turma_id,
        usuario_id,
        data_reserva,
        periodo_id,
        status

    ) VALUES (?, ?, ?, ?, ?, 'Reservado')
");

$stmt->bind_param(
    "iiisi",
    $sala_id,
    $turma_id,
    $usuario_id,
    $dataReserva,
    $periodo_id
);

if ($stmt->execute()) {

    echo "
        <script>
            alert('Reserva criada com sucesso!');
            window.location.href='../../public/dashboard.php';
        </script>
    ";

} else {
    echo "
        <script>
            alert('Erro ao criar reserva.');
            window.location.href='../../public/dashboard.php';
        </script>
    ";
}
?>
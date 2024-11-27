<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $usuario_id = $_POST['usuario_id'];

    $sql = "UPDATE tarefas SET status = :status, usuario_id = :usuario_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':status' => $status, ':usuario_id' => $usuario_id, ':id' => $id]);

    echo "Chamado atualizado com sucesso.";
}
?>

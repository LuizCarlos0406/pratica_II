<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $colaborador_id = $_POST['colaborador_id'];

    $sql = "UPDATE chamados SET status = :status, colaborador_id = :colaborador_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':status' => $status, ':colaborador_id' => $colaborador_id, ':id' => $id]);

    echo "Chamado atualizado com sucesso.";
}
?>

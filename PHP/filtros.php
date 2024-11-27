<?php
include 'db_connection.php';

$crit = $_GET['crit'] ?? null;
$status = $_GET['status'] ?? null;
$usuario_id = $_GET['usuario_id'] ?? null;

$sql = "SELECT * FROM tarefas WHERE 1=1";

if ($Priori) $sql .= " AND Prioridade = '$Prori'";
if ($status) $sql .= " AND status = '$status'";
if ($usuario_id) $sql .= " AND usuario = $usuario_id";

$stmt = $conn->query($sql);
$chamados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tarefas as $tarefas) {
    echo "ID: {$tarefas['id']} - {$tarefas['descricao']}<br>";
}
?>

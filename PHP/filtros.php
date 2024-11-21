<?php
include 'db_connection.php';

$crit = $_GET['crit'] ?? null;
$status = $_GET['status'] ?? null;
$colaborador_id = $_GET['colaborador_id'] ?? null;

$sql = "SELECT * FROM chamados WHERE 1=1";

if ($crit) $sql .= " AND criticidade = '$crit'";
if ($status) $sql .= " AND status = '$status'";
if ($colaborador_id) $sql .= " AND colaborador_id = $colaborador_id";

$stmt = $conn->query($sql);
$chamados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($chamados as $chamado) {
    echo "ID: {$chamado['id']} - {$chamado['descricao']}<br>";
}
?>

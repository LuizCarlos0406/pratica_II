<?php
include 'db_connection.php';

$sql = "SELECT chamados.id, clientes.nome AS cliente, descricao, criticidade, status, data_abertura, 
               colaboradores.nome AS colaborador 
        FROM chamados 
        LEFT JOIN clientes ON chamados.cliente_id = clientes.id
        LEFT JOIN colaboradores ON chamados.colaborador_id = colaboradores.id";
$stmt = $conn->query($sql);
$chamados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($chamados as $chamado) {
    echo "ID: {$chamado['id']}<br>";
    echo "Cliente: {$chamado['cliente']}<br>";
    echo "Descrição: {$chamado['descricao']}<br>";
    echo "Criticidade: {$chamado['criticidade']}<br>";
    echo "Status: {$chamado['status']}<br>";
    echo "Data de Abertura: {$chamado['data_abertura']}<br>";
    echo "Colaborador: " . ($chamado['colaborador'] ?? 'Não atribuído') . "<br><hr>";
}
?>

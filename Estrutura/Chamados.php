<?php

include ('db.php');

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Solicitação</title>
    <link rel="stylesheet" href="../visual/Chamados.css">
    <script src="js/filtros.js"></script>
</head>
<body>
    <h1>Gerenciamento de Solicitação</h1>

    <label for="filtroStatus">Filtrar por Status:</label>
    <select id="filtroStatus" onchange="aplicarFiltro();">
        <option value="">Todos</option>
        <option value="aberto">Aberto</option>
        <option value="em andamento">Em andamento</option>
        <option value="resolvido">Resolvido</option>
    </select>

    <label for="filtroCriticidade">Filtrar por Urgência:</label>
    <select id="filtroCriticidade" onchange="aplicarFiltro();">
        <option value="">Todas</option>
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>
    <label for="filtroCriticidade">Filtrar por Funcionário:</label>
    <select id="filtroCriticidade" onchange="aplicarFiltro();">
        <option value="">Todas</option>
        <option value="baixa">Lucas Souza</option>
        <option value="media">Renato Monteiro</option>
        <option value="alta">Sofia Barbosa</option>
        <option value="alta">Livia Andrade</option>
        <option value="alta">Sofia Barbosa</option>
    </select>

    <table border="1" id="tabelaChamados">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cliente</th>
                <th>Nome Cliente</th>
                <th>Descrição</th>
                <th>Urgência</th>
                <th>Status</th>
                <th>Data de Abertura</th>
                <th>ID Funcionário</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <br>
    <a href="Clientes.html" id="sair-button"><button>Sair</button></a>
    <a href="Editar_chamado.html" id="sair-button"><button>Editar Solicitações</button></a>
</body>
</html>

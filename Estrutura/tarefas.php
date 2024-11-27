<?php

include ('db.php');

$sql = "SELECT tarefas.id, usuarios.nome AS usuario, descricao, p, status, data_abertura, 
               tarefa.nome AS tarefa 
        FROM tarefa 
        LEFT JOIN usuario ON tarefa.usuario_id = usuario.id
        LEFT JOIN usuario ON tarefa.usuario_id = usuario.id";
$stmt = $conn->query($sql);
$tarefa = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tarefa as $tarefa) {
    echo "ID: {$tarefa['id']}<br>";
    echo "Cliente: {$tarefa['cliente']}<br>";
    echo "Descrição: {$tarefa['descricao']}<br>";
    echo "Prioridade: {$tarefa['Prioridade']}<br>";
    echo "Status: {$tarefa['status']}<br>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link rel="stylesheet" href="../visual/tarefas.css">
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

    <label for="filtroPrioridade">Filtrar por Urgência:</label>
    <select id="filtroPrioridade" onchange="aplicarFiltro();">
        <option value="">Todas</option>
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>
    <label for="filtroPrioridade">Filtrar por Funcionário:</label>
    <select id="filtroPrioridade" onchange="aplicarFiltro();">
        <option value="">Todas</option>
        <option value="baixa">Lucas Souza</option>
        <option value="media">Renato Monteiro</option>
        <option value="alta">Sofia Barbosa</option>
        <option value="alta">Livia Andrade</option>
        <option value="alta">Sofia Barbosa</option>
    </select>

    <table border="1" id="tabelaTarefas">
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

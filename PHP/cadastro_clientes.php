<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':nome' => $nome, ':email' => $email, ':telefone' => $telefone]);

    echo "Cliente cadastrado com sucesso.";
}
?>

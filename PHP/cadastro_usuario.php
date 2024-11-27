<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST['ID'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    $sql = "INSERT INTO Usuarios (ID, nome, email) VALUES (:ID, :nome, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':ID' => $ID, ':nome' => $nome, ':email' => $email]);

    echo "usuario cadastrado com sucesso.";
}
?>

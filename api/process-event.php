<?php
if (session_id() == '' || !isset($_SESSION['id_event'])) {
    session_start();
}
require_once('conn.php');

// Receber os dados do formulário
$tenant_id = $_POST['tenant_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$nome_local = $_POST['nome-local'];
$data_hour = $_POST['data_hour'];
$local_cep = $_POST['local_cep'];
$local_street = $_POST['local_street'];
$local_neighborhood = $_POST['local_neighborhood'];
$local_number = $_POST['local_number'];
$local_city = $_POST['local_city'];
$local_uf = $_POST['local_uf'];
$complement = $_POST['complement'];

$sql = "INSERT INTO Events (tenant_id,
                            title, 
                            description, 
                            local_name, 
                            date_hour, 
                            local_cep, 
                            local_street, 
                            local_neighborhood, 
                            local_number, 
                            local_city, 
                            local_uf, 
                            complement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssssssssssss", $tenant_id, $title, $description, $nome_local, $data_hour, $local_cep, $local_street, $local_neighborhood, $local_number, $local_city, $local_uf, $complement);

// Execute statement
$result = $stmt->execute();

if (!$result) {
    die("Erro ao executar a consulta: " . $stmt->error);
}

// Verificar se a sessão foi iniciada antes de definir $_SESSION['id_event']
if (session_status() == PHP_SESSION_ACTIVE) {
    $_SESSION['id_event'] = $conn->insert_id;
}

header('Location: create-ticket.php');
?>

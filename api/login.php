/*
* (c) COPYRIGHT 2024, MARCO NASCIMENTO
* CAMPINAS-SP, BRASIL
* ALL RIGHTS RESERVED - TODOS DIREITOS RESERVADOS
* CONFIDENTIAL, UNPUBLISHED PROPERTY OF MARCO NASCIMENTO
* PROPRIEDADE CONFIDENCIAL, NÃO PUBLICADA DE MARCO NASCIMENTO
*/

<?php
require_once('conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Evite usar consultas diretas assim em um ambiente de produção. Considere usar prepared statements.
    $sql = "SELECT * FROM Tenant WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tenant autenticado com sucesso
        $tenant = $result->fetch_assoc();

        // Armazenar informações do tenant na sessão
        $_SESSION['tenant_id'] = $tenant['id'];
        $_SESSION['tenant_name'] = $tenant['name'];
        $_SESSION['tenant_email'] = $tenant['email'];

        $tenantId= $tenant['id'];

        // Redirecionar para a página do tenant (ou para onde for necessário)
        header("Location: dashboard.php?name={$tenant['name']}");
        exit();
    } else {
        // Falha na autenticação
        echo "Credenciais inválidas. Tente novamente.";
    }

    $conn->close();
}
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard
        <?php echo $_SESSION['tenant_name']; ?>
    </title>
    <link rel="stylesheet" href="../css/create-event.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body>

    <!-- Barra lateral -->
    <div class="sidebar">
        
        <h3><?php echo $_SESSION['tenant_name']; ?></h3>
        <a href="create-event.php">Criar evento</a>
        <a href="view-event.php">Filtro de eventos</a>
        <a href="#">Página 3</a>
        <!-- Adicione mais links ou botões conforme necessário -->
    </div>



    <!-- Criar evento-->
    <form action="process-event.php" method="POST">
        <input type="hidden" name="tenant_id" value="<?php echo $_SESSION['tenant_id']; ?>">
        <input type="text" name="title" placeholder="Nome do evento">
        <input type="text" name="description" placeholder="Descrição do evento">
        <input type="text" name="nome-local" placeholder="Nome do local">
        <input type="text" name="data_hour" placeholder="Data e hora do evento">
        <input type="text" name="local_cep" placeholder="CEP">
        <input type="text" name="local_street" placeholder="Rua">
        <input type="text" name="local_neighborhood" placeholder="Bairro">
        <input type="text" name="local_number" placeholder="Número">
        <input type="text" name="local_city" placeholder="Cidade">
        <input type="text" name="local_uf" placeholder="UF">
        <input type="text" name="complement" placeholder="Complemento">
        <input type="submit" value="Criar evento">
        
    </form>

</body>

</html>
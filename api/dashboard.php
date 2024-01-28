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
        
        <h3><?php echo $_SESSION['tenant_name']; ?></p></h3>
        <a href="create-event.php">Criar evento</a>
        <a href="view-event.php">Filtro de eventos</a>
        <a href="#">Página 3</a>
        <!-- Adicione mais links ou botões conforme necessário -->
    </div>


</body>

</html>
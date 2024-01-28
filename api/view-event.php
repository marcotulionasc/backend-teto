<?php
session_start();
require_once('conn.php');

// Verifica se o usuário está autenticado
if (!isset($_SESSION['tenant_id'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit();
}

$tenant_id = $_SESSION['tenant_id'];

// Consulta SQL para recuperar informações do evento
$sql = "SELECT * FROM Events WHERE tenant_id = ? AND events_active = 1";
$stmt = $conn->prepare($sql);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param("i", $tenant_id);
$stmt->execute();
$result = $stmt->get_result();

// Exibe a lista de eventos
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Filtro de eventos</title>
    <link rel="stylesheet" href="../css/create-event.css">
    <link rel="stylesheet" href="../css/sidebar.css">

    <style>
        .content {
            width: 80%;
            margin: auto;
        }

        .event-container {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
        }

        .event-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .event-description {
            color: #666;
        }
    </style>

</head>

<body>

    <!-- Barra lateral -->
    <div class="sidebar">

        <h3>
            <?php echo $_SESSION['tenant_name']; ?>
        </h3>
        <a href="create-event.php">Criar evento</a>
        <a href="view-event.php">Filtro de eventos</a>
        <a href="#">Página 3</a>
        <!-- Adicione mais links ou botões conforme necessário -->
    </div>

    <div class="content">
        <h2>Listagem de Eventos</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <div class="event-container">
                        <div class="event-title">
                            <strong>
                                <?php echo $row['title']; ?>
                            </strong>
                        </div>
                        <div class="event-description">
                            <p>
                                <?php echo $row['description']; ?>
                            </p>

                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>


</body>

</html>
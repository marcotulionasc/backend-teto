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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Filtro de eventos</title>

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
    </div>

    <div class="content">
        <h2>Listagem de Eventos</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <div class="event-container">
                        <div class="event-title">
                            <!-- Adicione uma tag img para exibir a imagem -->
                            <img src="data:image/webp;base64,<?php echo $row['image_event']; ?>">
                        </div>
                        <div class="event-description">
                            <p>
                                <strong>
                                    <?php echo $row['title']; ?>
                                </strong>
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
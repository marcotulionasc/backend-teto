<?php
/*
* (c) COPYRIGHT 2024, MARCO NASCIMENTO
* CAMPINAS-SP, BRASIL
* ALL RIGHTS RESERVED - TODOS DIREITOS RESERVADOS
* CONFIDENTIAL, UNPUBLISHED PROPERTY OF MARCO NASCIMENTO
* PROPRIEDADE CONFIDENCIAL, NÃO PUBLICADA DE MARCO NASCIMENTO
*/

require_once('conn.php');

$id = $_GET['id']; // Obter o ID do evento da URL

// Check if the confirmation is received
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    // Desativar o evento
    $query = "UPDATE events SET events_active = 0 WHERE id_event = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Desativar os ingressos associados ao evento
    $query = "UPDATE ingressos SET ingresso_ativo = 0 WHERE id_evento = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Desativar os lotes associados aos ingressos do evento
    $query = "UPDATE lotes SET lote_ativo = 0 WHERE id_ingresso IN (SELECT id_ingresso FROM ingressos WHERE id_evento = ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>
            alert("Evento, ingressos e lotes desativados com sucesso.");
            window.location.href = "view-event.php";
        </script>';
    } else {
        echo "Falha ao desativar o evento, ingressos e lotes.";
    }
} else {
    // Show the confirmation modal
    echo '<script>
        if (confirm("Deseja realmente desativar o evento, ingressos e lotes?")) {
            window.location.href = "process-inactive.php?id=' . $id . '&confirm=yes";
        } else {
            window.location.href = "process-inactive.php?id=' . $id . '&confirm=no";
        }
    </script>';
}

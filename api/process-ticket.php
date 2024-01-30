<?php
session_start();
require_once('conn.php');

// Iniciar a transação
$conn->begin_transaction();

try {
    // Lógica para criar ingressos
    foreach ($_POST['ingressos'] as $ingresso) {
        $nome_ingresso = $ingresso['nome_ingresso'];
        $start_date = $ingresso['start_date'];
        $end_date = $ingresso['end_date'];

        // Inserir o ingresso
        $sqlIngresso = "INSERT INTO Ingressos (id_evento, nome_ingresso, ingresso_ativo, start_date, end_date) VALUES (?, ?, 1, ?, ?)";
        $stmtIngresso = $conn->prepare($sqlIngresso);
        $stmtIngresso->bind_param("isss", $_SESSION['id_event'], $nome_ingresso, $start_date, $end_date);

        if (!$stmtIngresso->execute()) {
            throw new Exception("Erro ao criar Ingresso.");
        }

        // Obter o ID do ingresso recém-criado
        $id_ingresso = $stmtIngresso->insert_id;

        // Lógica para criar lotes associados ao ingresso
        foreach ($ingresso['lotes'] as $lote) {
            $nome_lote = $lote['nome_lote'];
            $valor_ingresso = $lote['valor_ingresso'];
            $quantidade_ingresso = $lote['quantidade_ingresso'];

            // Inserir o lote associado ao ingresso
            $sqlLote = "INSERT INTO Lotes (id_ingresso, nome_lote, lote_ativo, valor_ingresso, quantidade_ingresso) VALUES (?, ?, 1, ?, ?)";
            $stmtLote = $conn->prepare($sqlLote);
            $stmtLote->bind_param("isdd", $id_ingresso, $nome_lote, $valor_ingresso, $quantidade_ingresso);

            if (!$stmtLote->execute()) {
                throw new Exception("Erro ao criar Lote associado ao Ingresso.");
            }
        }
    }

    // Confirmar a transação se tudo ocorrer bem
    $conn->commit();
    echo "<script>alert('Ingressos e Lotes criados com sucesso!'); 
            window.location.href = 'view-event.php';</script>";
} catch (Exception $e) {
    // Rollback se ocorrer algum erro
    $conn->rollback();
    die("Erro ao criar Ingressos e Lotes: " . $e->getMessage());
}

// Fechar a conexão
$conn->close();
?>

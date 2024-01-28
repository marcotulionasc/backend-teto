<?php
if (session_id() == '' || !isset($_SESSION['id_event'])) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ingressos e Lotes</title>

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


    <form id="create-form" action="process-ticket.php" method="POST">
        <h4>Criar Ingressos e Lotes</h4>
        <div id="tickets-container">
            <!-- Campos para criar ingressos -->
            <div class="ticket">
                <label for="nome_ingresso">Nome do Ingresso:</label>
                <input type="text" name="ingressos[0][nome_ingresso]" required>
                <label for="ingresso_ativo">Ingresso Ativo:</label>
                <input type="checkbox" name="ingressos[0][ingresso_ativo]" checked>
                <label for="start_date">Data de Início:</label>
                <input type="datetime-local" name="ingressos[0][start_date]" required>
                <label for="end_date">Data de Fim:</label>
                <input type="datetime-local" name="ingressos[0][end_date]" required>

                <!-- Campos para criar lotes -->
                <div class="lots-container">
                    <div class="lot">
                        <label for="nome_lote">Nome do Lote:</label>
                        <input type="text" name="ingressos[0][lotes][0][nome_lote]" required>
                        <label for="lote_ativo">Lote Ativo:</label>
                        <input type="checkbox" name="ingressos[0][lotes][0][lote_ativo]" checked>
                        <label for="valor_ingresso">Valor do Ingresso:</label>
                        <input type="number" name="ingressos[0][lotes][0][valor_ingresso]" required>
                        <label for="quantidade_ingresso">Quantidade de Ingressos:</label>
                        <input type="number" name="ingressos[0][lotes][0][quantidade_ingresso]" required>
                    </div>
                </div>
                <button type="button" class="add-lot">Adicionar Lote</button>
            </div>
        </div>
        </div>
        <button type="button" id="add-ticket">Adicionar Ingresso</button>
        <button type="submit">Criar Ingressos e Lotes</button>

        <script>
            document.getElementById('add-ticket').addEventListener('click', function () {
                var ticketsContainer = document.getElementById('tickets-container');
                var ticketCount = ticketsContainer.querySelectorAll('.ticket').length;

                var newTicket = document.createElement('div');
                newTicket.classList.add('ticket');
                newTicket.innerHTML = `
        <label for="nome_ingresso">Nome do Ingresso:</label>
        <input type="text" name="ingressos[${ticketCount}][nome_ingresso]" required>
        <label for="ingresso_ativo">Ingresso Ativo:</label>
        <input type="checkbox" name="ingressos[${ticketCount}][ingresso_ativo]" checked>
        <label for="start_date">Data de Início:</label>
        <input type="datetime-local" name="ingressos[${ticketCount}][start_date]" required>
        <label for="end_date">Data de Fim:</label>
        <input type="datetime-local" name="ingressos[${ticketCount}][end_date]" required>
        
        <div class="lots-container">
            <div class="lot">
                <label for="nome_lote">Nome do Lote:</label>
                <input type="text" name="ingressos[${ticketCount}][lotes][0][nome_lote]" required>
                <label for="lote_ativo">Lote Ativo:</label>
                <input type="checkbox" name="ingressos[${ticketCount}][lotes][0][lote_ativo]" checked>
                <label for="valor_ingresso">Valor do Ingresso:</label>
                <input type="number" name="ingressos[${ticketCount}][lotes][0][valor_ingresso]" required>
                <label for="quantidade_ingresso">Quantidade de Ingressos:</label>
                <input type="number" name="ingressos[${ticketCount}][lotes][0][quantidade_ingresso]" required>
            </div>
        </div>
        <button type="button" class="add-lot">Adicionar Lote</button>
    `;
                ticketsContainer.appendChild(newTicket);
            });

            document.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('add-lot')) {
                    var ticketContainer = e.target.closest('.ticket');
                    var lotsContainer = ticketContainer.querySelector('.lots-container');
                    var lotCount = lotsContainer.querySelectorAll('.lot').length;

                    // Get the ticket index
                    var ticketIndex = Array.from(ticketContainer.parentNode.children).indexOf(ticketContainer);

                    var newLot = document.createElement('div');
                    newLot.classList.add('lot');
                    newLot.innerHTML = `
        <label for="nome_lote">Nome do Lote:</label>
        <input type="text" name="ingressos[${ticketIndex}][lotes][${lotCount}][nome_lote]" required>
        <label for="lote_ativo">Lote Ativo:</label>
        <input type="checkbox" name="ingressos[${ticketIndex}][lotes][${lotCount}][lote_ativo]" checked>
        <label for="valor_ingresso">Valor do Ingresso:</label>
        <input type="number" name="ingressos[${ticketIndex}][lotes][${lotCount}][valor_ingresso]" required>
        <label for="quantidade_ingresso">Quantidade de Ingressos:</label>
        <input type="number" name="ingressos[${ticketIndex}][lotes][${lotCount}][quantidade_ingresso]" required>
    `;
                    lotsContainer.appendChild(newLot);
                }
            });
        </script>
    </form>
</body>

</html>
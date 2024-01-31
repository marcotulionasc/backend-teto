<?php

if (session_id() == '' || !isset($_SESSION['id_event'])) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo(a)
        <?php echo $_SESSION['tenant_name']; ?>
    </title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">

    <style>
        label {

            border-radius: 10%;
            background-color: #f8f9fc;
        }

        input {
            margin-top: 10px;
            border-radius: 6px;
            background-color: #f8f9fc;
            width: 300px;
            /* Altere o valor conforme necessário */
        }

        .custom-button {
            margin-top: 10px;
            border-radius: 6px;
            background-color: #4e73df;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>


</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <!-- Logo -->
                </div>
                <div class="sidebar-brand-text mx-3">Painel <strong>Produtor</strong></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Interface</div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ferramentas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Atalhos das ferramentas</h6>
                        <a class="collapse-item" href="#">Financeiro</a>
                        <a class="collapse-item" href="#">Pedidos</a>
                        <a class="collapse-item" href="#">Eventos</a>
                        <a class="collapse-item" href="#">Relatórios</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ações
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ações do sistema</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Telas</h6>
                        <a class="collapse-item" href="create-event.php">Criar evento</a>
                        <a class="collapse-item" href="view-event.php">Gerenciamento de eventos</a>
                        <a class="collapse-item" href="#">Validar cadastro usuário</a>
                        <a class="collapse-item" href="#">Cadastro Promoter</a>
                        <a class="collapse-item" href="#">QR Code ingressos</a>
                    </div>
                </div>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por" aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['tenant_name']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log de atividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../index.html" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-bottom: 20px">
                    <div class="row justify-content-center">
                        <div class="wrapper">
                            <div class="form-inner" style="height: auto;">
                                <form id="create-form" action="process-ticket.php" method="POST">
                                    <h4>Criar Ingressos</h4>
                                    <div id="tickets-container">
                                        <!-- Campos para criar ingressos -->
                                        <div class="ticket">

                                            <input type="text" name="ingressos[0][nome_ingresso]" placeholder="Nome ingresso" required>
                                            <br>Data de Início <input type="datetime-local" name="ingressos[0][start_date]" placeholder="Data de início" required>
                                            <br>Data de Fim <input type="datetime-local" name="ingressos[0][end_date]" placeholder="Data de fim" required>

                                            <h4 style="margin-top: 20px;">Criar Lotes do ingresso</h4>
                                            <div class="lots-container">
                                                <div class="lot">

                                                    <input type="text" name="ingressos[0][lotes][0][nome_lote]" placeholder="Nome lote" required>
                                                    <input type="text" name="ingressos[0][lotes][0][valor_ingresso]" placeholder="Valor do ingresso" required>
                                                    <input type="number" name="ingressos[0][lotes][0][quantidade_ingresso]" placeholder="Quantidade ingresso" required>
                                                </div>
                                            </div>
                                            <button class="custom-button add-lot" type="button" class="add-lot">Adicionar Lote</button>
                                        </div>
                                    </div>
                                    <button class="custom-button" type="button" id="add-ticket">Adicionar Ingresso</button>
                                    <button class="custom-button" type="submit">Criar Ingressos e Lotes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('add-ticket').addEventListener('click', function() {
                        var ticketsContainer = document.getElementById('tickets-container');
                        var ticketCount = ticketsContainer.querySelectorAll('.ticket').length;

                        var newTicket = document.createElement('div');
                        newTicket.classList.add('ticket');
                        newTicket.innerHTML = `
        
        <input type="text" name="ingressos[${ticketCount}][nome_ingresso]" placeholder="Nome ingresso" required>
        <br>Data de Início <input type="datetime-local" name="ingressos[${ticketCount}][start_date]" required>
        <br>Data de Fim <input type="datetime-local" name="ingressos[${ticketCount}][end_date]" required>

        <div class="lots-container" style="margin-top: 10px;">
            <div class="lot">
                <input type="text" name="ingressos[${ticketCount}][lotes][0][nome_lote]" placeholder="Nome lote" required>
                <input type="text" name="ingressos[${ticketCount}][lotes][0][valor_ingresso]" placeholder="Valor do ingresso" required>
                <input type="number" name="ingressos[${ticketCount}][lotes][0][quantidade_ingresso]" placeholder="Quantidade ingresso" required>
            </div>
        </div>
        <button class="custom-button add-lot" type="button" class="add-lot">Adicionar Lote</button>
        <button class="custom-button delete-ticket" type="button" class="delete-ticket">Excluir Ingresso</button>
    `;
                        ticketsContainer.appendChild(newTicket);
                    });

                    document.addEventListener('click', function(e) {
                        if (e.target && e.target.classList.contains('add-lot')) {
                            var ticketContainer = e.target.closest('.ticket');
                            var lotsContainer = ticketContainer.querySelector('.lots-container');
                            var lotCount = lotsContainer.querySelectorAll('.lot').length;

                            // Get the ticket index
                            var ticketIndex = Array.from(ticketContainer.parentNode.children).indexOf(ticketContainer);

                            var newLot = document.createElement('div');
                            newLot.classList.add('lot');
                            newLot.innerHTML = `
            
            <input type="text" name="ingressos[${ticketIndex}][lotes][${lotCount}][nome_lote]" placeholder=" Nome do lote" required>
           
           
            <input type="text" name="ingressos[${ticketIndex}][lotes][${lotCount}][valor_ingresso]" placeholder="Valor do ingresso" required>
            
            <input type="number" name="ingressos[${ticketIndex}][lotes][${lotCount}][quantidade_ingresso]" placeholder="Quantidade ingresso" required>
            <button class="custom-button delete-lot" type="button" class="delete-lot">Excluir Lote</button>
        `;
                            lotsContainer.appendChild(newLot);
                        } else if (e.target && e.target.classList.contains('delete-ticket')) {
                            var ticketContainer = e.target.closest('.ticket');
                            ticketContainer.remove();
                        } else if (e.target && e.target.classList.contains('delete-lot')) {
                            var lotContainer = e.target.closest('.lot');
                            lotContainer.remove();
                        }
                    });
                </script>



                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Marco Nascimento</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="../js/sb-admin-2.min.js"></script>
            <script src="../vendor/chart.js/Chart.min.js"></script>
            <script src="../js/demo/chart-area-demo.js"></script>
            <script src="../js/demo/chart-pie-demo.js"></script>


</body>

</html>
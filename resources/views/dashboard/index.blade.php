<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-5">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Sistema de Agendamento de Serviços</span>
        </div>
    </nav>

    <div class="container">
        <div class="row text-center">
            
            <!-- Card de Usuários -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body py-5">
                        <h2 class="h4 card-title">Usuários</h2>
                        <p class="display-6 fw-bold text-primary">{{ $counts['users'] }}</p>
                        <p class="text-muted">Gestão de clientes e acessos</p>
                        <a href="/users" class="btn btn-primary w-100">Acessar Usuários</a>
                    </div>
                </div>
            </div>

            <!-- Card de Serviços -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body py-5">
                        <h2 class="h4 card-title">Serviços</h2>
                        <p class="display-6 fw-bold text-success">{{ $counts['services'] }}</p>
                        <p class="text-muted">Preços e tipos de atendimento</p>
                        <a href="/services" class="btn btn-success w-100">Acessar Serviços</a>
                    </div>
                </div>
            </div>

            <!-- Card de Agendamentos -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body py-5">
                        <h2 class="h4 card-title">Agendamentos</h2>
                        <p class="display-6 fw-bold text-info">{{ $counts['appointments'] }}</p>
                        <p class="text-muted">Controle de horários marcados</p>
                        <a href="/appointments" class="btn btn-info text-white w-100">Acessar Agendamentos</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 text-center text-muted">
            <small>Dashboard de serviços e agendamentos - Desenvolvimento WEB</small>
        </div>
    </div>

</body>
</html>
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
            
            <div class="d-flex align-items-center">
                <span class="text-white me-3">Olá, {{ Auth::user()->name ?? 'Usuário' }}</span>
                
                <form method="POST" action="{{ route('logout.send') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row text-center">
            
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
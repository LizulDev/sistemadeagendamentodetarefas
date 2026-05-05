<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="border-bottom pb-2 mb-4 d-flex justify-content-between align-items-center">
        <h2>Agendamentos Marcados</h2>
        <a href="/appointments/create" class="btn btn-success btn-sm">Novo Agendamento</a>
    </div>

    <!-- Filtro de Busca (Requisito do Trabalho) -->
    <form action="/appointments" method="GET" class="row g-2 mb-4">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Nome do cliente..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-secondary">Filtrar</button>
            @if(request('search'))
                <a href="/appointments" class="btn btn-outline-danger">Limpar</a>
            @endif
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Data e Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->user->name }}</td> 
                <td>{{ $appointment->service->name }} (R$ {{ number_format($appointment->service->price, 2, ',', '.') }})</td>
                <td>{{ $appointment->scheduled_at->format('d/m/Y H:i') }}</td>
                <td>
                    <span class="badge bg-secondary">{{ $appointment->status }}</span>
                </td>
                <td>
                    <a href="/appointments/{{ $appointment->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
                    <a href="/appointments/{{ $appointment->id }}/delete" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($appointments->isEmpty())
        <div class="alert alert-info">Nenhum agendamento encontrado para os critérios de busca.</div>
    @endif

    <div class="mt-4">
        <a href="/dashboard">Voltar ao Menu Principal</a>
    </div>

</body>
</html>
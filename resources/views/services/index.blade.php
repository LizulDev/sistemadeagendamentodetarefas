<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="border-bottom pb-2 mb-4 d-flex justify-content-between align-items-center">
        <h2>Serviços Disponíveis</h2>
        <a href="/services/create" class="btn btn-success btn-sm">Novo Serviço</a>
    </div>

    <!-- Filtro de Busca Simples -->
    <form action="/services" method="GET" class="row g-2 mb-4">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Buscar serviço..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-secondary">Pesquisar</button>
            @if(request('search'))
                <a href="/services" class="btn btn-outline-danger">Limpar</a>
            @endif
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th width="80">ID</th>
                <th>Nome do Serviço</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th width="180">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>R$ {{ number_format($service->price, 2, ',', '.') }}</td>
                <td>{{ $service->description ?? 'Sem descrição' }}</td>
                <td>
                    <a href="/services/{{ $service->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
                    <a href="/services/{{ $service->id }}/delete" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($services->isEmpty())
        <div class="alert alert-info">Nenhum serviço cadastrado ou encontrado.</div>
    @endif

    <div class="mt-4">
        <a href="/dashboard">Voltar ao Menu Principal</a>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="border-bottom pb-2 mb-4 d-flex justify-content-between align-items-center">
        <h2>Usuários Cadastrados</h2>
        <a href="/users/create" class="btn btn-success btn-sm">Novo Cadastro</a>
    </div>

    <!-- Busca Simples -->
    <form action="/users" method="GET" class="row g-2 mb-4">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Buscar nome..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-secondary">Pesquisar</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/users/{{ $user->id }}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="/users/{{ $user->id }}/delete" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <a href="/dashboard">Voltar ao Menu Principal</a>
    </div>

</body>
</html>
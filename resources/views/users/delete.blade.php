<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border-bottom pb-2 mb-4">
                <h3 class="text-danger">Confirmar Exclusão</h3>
            </div>

            <div class="alert alert-warning mb-4">
                <strong>Atenção!</strong> Você está prestes a excluir o usuário abaixo. 
                Se este usuário tiver agendamentos vinculados, isso pode gerar erros de integridade no banco de dados.
            </div>

            <form method="POST" action="/users/{{ $user->id }}">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nome:</label>
                    <input type="text" class="form-control bg-light" value="{{ $user->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">E-mail:</label>
                    <input type="email" class="form-control bg-light" value="{{ $user->email }}" disabled>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-danger">Sim, Excluir Usuário</button>
                    <a href="/users" class="btn btn-outline-secondary">Cancelar e Voltar</a>
                </div>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</body>
</html>
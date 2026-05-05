<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3>Novo Usuário</h3>
            <hr>

            <form method="POST" action="/users/store">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome Completo:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Salvar Dados</button>
                    <a href="/users" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>

            @if ($errors->any())
                <div class="mt-3 text-danger">
                    <ul class="small">
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
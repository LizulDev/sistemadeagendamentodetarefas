<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border-bottom pb-2 mb-4">
                <h3>Alterar Usuário</h3>
            </div>

            <form method="POST" action="/users/{{ $user->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nome Completo:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">E-mail:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nova Senha:</label>
                    <input type="password" class="form-control" name="password" placeholder="Mínimo de 8 caracteres">
                    <div class="form-text">Deixe em branco se não quiser alterar a senha atual.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Confirmar Nova Senha:</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repita a nova senha">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
                    <a href="/users" class="btn btn-outline-secondary">Cancelar</a>
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
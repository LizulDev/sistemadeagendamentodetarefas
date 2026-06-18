<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Agendador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Nova Conta</h3>
            <hr>

            <form method="POST" action="{{ route('register.send') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Nome Completo:</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ex: João da Silva" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">E-mail:</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="seu@email.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Senha:</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Mínimo de 8 caracteres" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repita sua senha" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Já tenho conta</a>
                </div>
            </form>

            @if ($errors->any())
                <div class="mt-3 text-danger">
                    <ul class="small mb-0">
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
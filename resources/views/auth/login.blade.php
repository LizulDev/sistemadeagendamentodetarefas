<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Agendador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Acessar o Sistema</h3>
            <hr>

            <form method="POST" action="{{ route('login.send') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="email">E-mail:</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Seu e-mail cadastrado" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Senha:</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Sua senha" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Lembrar-me</label>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">Criar uma conta</a>
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
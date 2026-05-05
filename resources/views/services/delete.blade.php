<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3 class="text-danger">Excluir Serviço</h3>
            <hr>

            <div class="alert alert-warning">
                <strong>Atenção!</strong> Você tem certeza que deseja excluir o serviço abaixo? Esta ação não pode ser desfeita.
            </div>

            <!-- Action para o método destroy do ServiceController -->
            <form method="POST" action="/services/{{ $service->id }}">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label class="form-label">Nome do Serviço:</label>
                    <input type="text" class="form-control" value="{{ $service->name }}" disabled>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-danger text-white">Confirmar Exclusão</button>
                    <a href="/services" class="btn btn-outline-secondary">Cancelar e Voltar</a>
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3>Alterar Serviço</h3>
            <hr>

            <!-- Action para o método update do ServiceController -->
            <form method="POST" action="/services/{{ $service->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome do Serviço:</label>
                    <input type="text" class="form-control" name="name" value="{{ $service->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço (R$):</label>
                    <!-- step="0.01" permite editar centavos -->
                    <input type="number" class="form-control" name="price" step="0.01" value="{{ $service->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição:</label>
                    <textarea class="form-control" name="description" rows="3">{{ $service->description }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Atualizar Serviço</button>
                    <a href="/services" class="btn btn-outline-secondary">Cancelar</a>
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3 class="text-danger">Excluir Agendamento</h3>
            <hr>

            <div class="alert alert-warning">
                <strong>Atenção!</strong> Deseja realmente cancelar/excluir este agendamento? Esta ação é irreversível.
            </div>

            <!-- Action para o método destroy do AppointmentController -->
            <form method="POST" action="/appointments/{{ $appointment->id }}">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label class="form-label">Cliente:</label>
                    <input type="text" class="form-control" value="{{ $appointment->user->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Serviço:</label>
                    <input type="text" class="form-control" value="{{ $appointment->service->name }} (R$ {{ number_format($appointment->service->price, 2, ',', '.') }})" disabled>
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                    <a href="/appointments" class="btn btn-outline-secondary">Voltar</a>
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
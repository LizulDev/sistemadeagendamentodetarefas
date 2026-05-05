<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3>Novo Agendamento</h3>
            <hr>

            <!-- Action enviando para o método store do AppointmentController -->
            <form method="POST" action="/appointments/store">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Cliente (Usuário):</label>
                    <select class="form-select" name="user_id" required>
                        <option value="">Selecione um cliente...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Serviço:</label>
                    <select class="form-select" name="service_id" required>
                        <option value="">Selecione um serviço...</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->name }} (R$ {{ number_format($service->price, 2, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data e Hora:</label>
                    <input type="datetime-local" class="form-control" name="scheduled_at" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Confirmar Agendamento</button>
                    <a href="/appointments" class="btn btn-outline-secondary">Cancelar</a>
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
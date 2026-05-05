<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-8">
            <h3>Alterar Agendamento</h3>
            <hr>

            <!-- Action enviando para o método update do AppointmentController -->
            <form method="POST" action="/appointments/{{ $appointment->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Cliente (Usuário):</label>
                    <select class="form-select" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $appointment->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Serviço:</label>
                    <select class="form-select" name="service_id" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->name }} (R$ {{ number_format($service->price, 2, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data e Hora:</label>
                    <!-- Formatamos a data para o padrão que o input datetime-local entende -->
                    <input type="datetime-local" class="form-control" name="scheduled_at" 
                           value="{{ $appointment->scheduled_at->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
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
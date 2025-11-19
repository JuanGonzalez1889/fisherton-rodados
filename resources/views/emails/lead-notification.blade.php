<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nueva Consulta</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #FFD700; border-bottom: 2px solid #FFD700; padding-bottom: 10px;">
            Nueva Consulta - Fisherton Rodados
        </h2>

        <div style="margin: 20px 0;">
            <p><strong>Nombre:</strong> {{ $lead->name }}</p>
            <p><strong>Email:</strong> {{ $lead->email }}</p>
            <p><strong>Teléfono:</strong> {{ $lead->phone }}</p>

            @if ($lead->vehicle)
                <p><strong>Vehículo de interés:</strong> {{ $lead->vehicle->brand }} {{ $lead->vehicle->model }}
                    {{ $lead->vehicle->year }}</p>
            @endif

            @if ($lead->message)
                <div style="background: #f5f5f5; padding: 15px; border-radius: 5px; margin-top: 15px;">
                    <strong>Mensaje:</strong>
                    <p style="margin: 10px 0 0 0;">{{ $lead->message }}</p>
                </div>
            @endif
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; font-size: 12px;">
            <p>Este email fue generado automáticamente desde el sitio web de Fisherton Rodados.</p>
            <p>Fecha: {{ $lead->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>

</html>

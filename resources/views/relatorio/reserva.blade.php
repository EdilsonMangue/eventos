<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 1px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1 style="font-size: 13px">Reserva</h1>

    <div class="info">
        <p><strong>Cliente:</strong>{{$data?->cliente?->name}}</p>
        <p><strong>Status da Reserva:</strong> {{$data?->status}}</p>
        <p><strong>Total:</strong> {{$data?->total}}</p>
        <p><strong>Criado em:</strong> {{$data?->created_at}}</p>
        <p><strong>Rec:</strong> {{$data?->reserva_no}}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Data Inicio</th>
                <th>Hora Inicio</th>
                <th>Data Fim</th>
                <th>Hora Fim</th>
            </tr>
        </thead>

        <tbody>
            {{-- @foreach($data as $value) --}}
            <tr>
                <td>{{$data?->data_inicio}}</td>
                <td>{{$data?->hora_inicio}}</td>
                <td>{{$data?->data_fim}}</td>
                <td>{{$data?->hora_fim}}</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->itens as $value)
            <tr>
                <td>{{$value?->servico?->name}}</td>
                <td>{{$value?->servico?->preco}}</td>
                <td>{{$value?->quantidade}}</td>
                <td>{{($value?->quantidade * $value?->servico?->preco)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

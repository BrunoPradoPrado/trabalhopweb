<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Autores</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: #2c3e50;
            color: #fff;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background: #f5f5f5;
        }

        .footer {
            position: fixed;
            bottom: 0;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>{{ $titulo }}</h2>
        <p>Gerado automaticamente pelo sistema</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->nacionalidade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sistema de Livraria - Relatório de Autores
    </div>

</body>
</html>
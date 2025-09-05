<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cost Estimation</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .section {
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>

<body>

    <div class="section">
        <div class="card">
            <h2>General</h2>
            <p>Total Cost: {{ $general['total_cost'] ?? '-' }}</p>
            <p>Other Field: {{ $general['other_field'] ?? '-' }}</p>
        </div>
    </div>

    <div class="section">
        <div class="card">
            <h2>Freight</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($freight['items'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['cost'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="section">
        <div class="card">
            <h2>Answers</h2>
            @foreach ($answers ?? [] as $q => $a)
                <p><strong>{{ $q }}:</strong> {{ $a }}</p>
            @endforeach
        </div>
    </div>

</body>

</html>

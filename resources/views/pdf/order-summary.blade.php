<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Order Summary</h2>
    <p><strong>Customer:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Order Date:</strong> {{ now()->toDateTimeString() }}</p>
    <p><strong>Items in Cart:</strong> {{ $count }}</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Unit Price (Rs)</th>
                <th>Total (Rs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item->product->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->product->price, 2) }}</td>
                <td>{{ number_format($item->product->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Amount: Rs {{ number_format($sum, 2) }}</p>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total-row {
            background-color: #e8f5e9;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="800" cellpadding="20" cellspacing="0" border="1">
                    <tr>
                        <td>
                            <h2>Products Report</h2>                           
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>${{ number_format($product->quantity * $product->price, 2) }}</td>
                                    </tr>
                                    
                                    @empty
                                    <tr>
                                        <td colspan="5" style="text-align:center;">
                                            you have no products in your store yet.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                            <p style="margin-top: 20px;">This report contains a summary of all products in inventory.</p>
                            
                            <p>Best regards,<br>PMS Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
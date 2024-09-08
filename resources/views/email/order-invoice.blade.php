<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 180px;
            /* Adjust the size of the logo as needed */
        }

        h2 {
            color: #333333;
            text-align: center;
            border-bottom: 2px solid #333333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin-top: 20px;
            color: #555555;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
        }
        .bg-dark{
            width: fit-content;
            display: block;
            margin: auto;
            background: #000;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="bg-dark">
                <img src="https://demo-designprojects.com/demo/alain-fernandez/public/Uploads/Logo/351694945918/uu6jloUKFM6XVJ0OoumKQqqI0ted5KM3xbGeiME6.png"
                    alt="Alain Fernandez Logo">
            </div>
        </div>

        <h2>Order Invoice</h2>

        <p>Dear {{ $data['order']->fname . ' ' . $data['order']->lname }},</p>

        <p>We appreciate your business! Below is the invoice for your recent purchase:</p>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total_amount = 0;
                @endphp
                
                @foreach ($data['order_detail'] as $detail)
                
                @php
                $product = App\Models\Products::where('id',$detail['product_id'])->first();
                $total_amount += $detail['sub_total'];
                @endphp
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $detail['quantity'] }}</td>
                    <td>${{ $detail['sub_total'] }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>

        <p class="total">Total Amount: ${{ $total_amount }}</p>

        <p>Thank you for your purchase. If you have any questions or concerns, feel free to contact us.</p>
    </div>
</body>

</html>
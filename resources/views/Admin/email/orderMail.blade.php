<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe Display - New Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        header {
            background-color: #3498db;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        main {
            padding: 20px;
            background-color: #ffffff;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #3498db;
            color: #ffffff;
        }

        h1, h2, p {
            color: #333333;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <header>
            <h1>Wardrobe Display</h1>
        </header>
        <!-- Body -->
        <main>
            <h2>Hello {{ $mailData['fName'] }},</h2>
            <p>Thank you for choosing our Product! We appreciate.</p>
            <p>Your recent order has been confirmed and is being processed. Here are the details:</p>

            <!-- Customer Details -->
            <table>
                <tr>
                    <td><strong>Address :</strong></td>
                    <td>{{ $mailData['address'] }}</td>
                </tr>
                <tr>
                    <td><strong>Phone Number :</strong></td>
                    <td>{{ $mailData['cell'] }}</td>
                </tr>
                <tr>
                    <td><strong>Payment System :</strong></td>
                    <td>{{ $mailData['payment'] }}</td>
                </tr>
            </table>

            <!-- Order Details -->
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mailData['products'] as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ $product['price'] * $product['quantity'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><strong>Sub Total</strong></td>
                        <td>{{ $mailData['subTotal'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Shipping Charge</strong></td>
                        <td>{{ $mailData['shippingCost'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Grand Total</strong></td>
                        <td>{{ $mailData['grandTotal'] }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Call to Action Button
            <p>Track your order status or make changes by clicking the button below:</p>
            <a href="[Order Tracking Link]" class="button">Track Your Order</a>
            -->
            <p>If you have any questions or concerns, please feel free to <a href="[Contact Us Link]">contact us</a>.</p>

            <p>Thank you for shopping with us!</p>

        </main>

        <!-- Footer -->
        <footer>
            &copy; 2024 Wardrobe Display. All rights reserved.
        </footer>

    </div>
</body>

</html>

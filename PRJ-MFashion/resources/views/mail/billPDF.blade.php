<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 10px;
        }
        table {
            width: 100%;        
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #dee2e6;
            text-align: center;
        }
        th {
            height: 40px;
            text-align: left;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3 style="color: red">Male Fashion</h3>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Orderer's name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Pay</th>
            <th>Payment method</th>
        </thead>
        <tbody>
            <td>{{ $bill->id }}</td>
            <td>{{ $bill->user->fullname }}</td>
            <td>{{ $bill->user->address }}</td>
            <td>{{ $bill->user->phone }}</td>
            <td>
                @if ($bill->pay == 1)
                Paid 
                @else
                Unpaid
                @endif
            </td>
            <td>
                @if ($bill->paymentMethod == 1)
                Payment via vnpay
                @elseif($bill->paymentMethod == 0)
                Payment on delivery
                @endif
            </td>
        </tbody>
    </table>
    <hr>
    <table border="1">
        <thead>
            <th>Product name</th>
            {{-- <th>Image</th> --}}
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Total</th>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->product->name }}</td>
                    {{-- <td><img src="{{ asset('storage/images/products/'.$cart->product->srcImage) }}" alt="" width="80"></td> --}}
                    <td>${{ $cart->product->priceSale }}</td>
                    <td>{{ $cart->qty }}</td>
                    <td>{{ $cart->size }}</td>
                    <td>${{ $cart->total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Discounted</td>
                <td>${{ $totalBill - $bill->total }}</td>
            </tr>
            <tr>
                <th colspan="4">Total order</th>
                <th>${{ $bill->total }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
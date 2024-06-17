<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}">Back to Dashboard</a>
        <h2>Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td><img src="{{ asset('images/' . $cartItem->baju->gambar) }}" alt="{{ $cartItem->baju->nama }}" width="100"></td>
                        <td>{{ $cartItem->baju->nama }}</td>
                        <td>{{ $cartItem->baju->deskripsi }}</td>
                        <td>Rp {{ number_format($cartItem->baju->harga*$cartItem->quantity, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.updateQuantity', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('cart.removeFromCart', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $subtotal = $cartItem->baju->harga * $cartItem->quantity;
                        $total += $subtotal;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <h4>TOTAL: Rp {{ number_format($total, 0, ',', '.') }}</h4>
    </div>
</body>
</html>

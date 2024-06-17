<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="{{route('dashboard')}}">back</a>
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
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td><img src="{{ asset('images/' . $cartItem->baju->gambar) }}" alt="{{ $cartItem->baju->nama }}" width="100"></td>
                        <td>{{ $cartItem->baju->nama }}</td>
                        <td>{{ $cartItem->baju->deskripsi }}</td>
                        <td>Rp {{ number_format($cartItem->baju->harga, 0, ',', '.') }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.removeFromCart', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
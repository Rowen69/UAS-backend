<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <img src="../images/logo_transparant.png" alt="">
        <div class = "cart"> <i class="ri-shopping-cart-line"></i><p id="count">0</p></div>
    </div>
    <div class="container">
        <div id="root">
            <!-- Product items -->
            <div class='box'>
                <div class='img-box'>
                    <img class='image' src='images/beach_baju.jpg' alt='Kaos Beach'>
                </div>
                <div class='bottom'>
                    <p>Kaos Beach</p>
                    <h2>$ 120.000</h2>
                    <button>Add to cart</button>
                </div>
            </div>

            <div class='box'>
                <div class='img-box'>
                    <img class='image' src='images/dj_baju.jpg' alt='Kaos DJ'>
                </div>
                <div class='bottom'>
                    <p>Kaos DJ</p>
                    <h2>$ 120.000</h2>
                    <button>Add to cart</button>
                </div>
            </div>

            <div class='box'>
                <div class='img-box'>
                    <img class='image' src='images/catcher_baju.jpg' alt='Kaos Catcher'>
                </div>
                <div class='bottom'>
                    <p>Kaos Catcher</p>
                    <h2>$ 120.000</h2>
                    <button>Add to cart</button>
                </div>
            </div>

            <div class='box'>
                <div class='img-box'>
                    <img class='image' src='images/dance_baju.jpg' alt='Kaos Dance'>
                </div>
                <div class='bottom'>
                    <p>Kaos Dance</p>
                    <h2>$ 120.000</h2>
                    <button>Add to cart</button>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="head"><p>My Cart</p></div>
            <div id="cartItem">Your cart is empty</div>
            @foreach($cartItems as $cartItem)
            <div class='cart-item'>
                <div class='row-img'>
                <img src="{{ asset('images/baju/' . $cartItem->baju->gambar) }}" alt="{{ $cartItem->baju->nama }}">
                </div>
                <p style='font-size:12px;'>{{ $cartItem->baju->nama }}</p>
                <p style='font-size:12px;'>x{{ $cartItem->quantity }}</p>
                <h2 style='font-size: 15px;'>Rp {{ number_format($cartItem->baju->harga*$cartItem->quantity, 0, ',', '.') }}</h2>
                <form action="{{ route('cart.addQuantity', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="remove-this-button"><i>+</i></button>
                </form>
                <form action="{{ route('cart.deductQuantity', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="remove-this-button"><i>-</i></button>
                </form>
                <form action="{{ route('cart.removeFromCart', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-this-button"><i class='ri-delete-bin-line'></i></button>
                </form>
            </div>
            @endforeach
            <div class="foot">
                <h3>Total</h3>
                <h2 id="total">Rp 0</h2>
            </div>
        </div>
    </div>
    
</body>
</html>
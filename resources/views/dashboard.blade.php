<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 300px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <a href="{{ route('manage.items') }}">admin</a>
    <a href="{{ route('cart.index') }}">cart</a>

    <div class="container">
        @foreach($bajus as $baju)
            <div class="card">
                <img src="{{ asset('images/baju/' . $baju->gambar) }}" alt="{{ $baju->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $baju->nama }}</h5>
                    <p class="card-text">{{ $baju->deskripsi }}</p>
                    <p class="card-text">Harga: Rp {{ number_format($baju->harga, 0, ',', '.') }}</p>
                    <form action="{{ route('cart.addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="baju_id" value="{{ $baju->id }}">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

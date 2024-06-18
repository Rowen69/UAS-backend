<!DOCTYPE html>
<html>
<head>
    <title>Edit Baju</title>
</head>
<body>
    <h1>Edit Baju</h1>
    <form action="{{ route('baju.update', $baju->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $baju->nama }}">
        </div>
        <div>
            <label>Gambar:</label>
            <input type="file" name="image">
            <img src="{{ asset('images/baju/' . $baju->gambar) }}" alt="{{ $baju->nama }}" width="100">
        </div>
        <div>
            <label>Harga:</label>
            <input type="text" name="harga" value="{{ $baju->harga }}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>

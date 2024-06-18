<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Baju</title>
</head>
<body>
    <h1>Create New Baju</h1>
    <form action="{{ route('baju.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body>
<h1>Hello World</h1>
    <p>Selamat Datang di Halaman Genre</p>

    @foreach ($genres as $item)
    <ul>
        <li>{{ $item['id'] }}</li>
        <li>{{ $item['name'] }}</li>
        <li>{{ $item['description'] }}</li>
    </ul>
    @endforeach
</body>
</html>
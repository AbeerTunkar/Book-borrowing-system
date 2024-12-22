<!DOCTYPE html>
<html>
<head>
    <title>{{ $book->title }} Details</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { text-align: center; }
        p { margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Book Details</h1>
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Availability:</strong> {{ $book->status ? 'Available' : 'Unavailable' }}</p>
</body>
</html>

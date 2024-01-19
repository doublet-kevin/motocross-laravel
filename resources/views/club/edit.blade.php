<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>
        Update Club
    </h1>
    <form action="{{ route('club.update', ['id' => $club->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $club->name }}">
        <br>
        <label for="region">Region</label>
        <input type="text" name="region" id="region" value="{{ $club->region }}">
        <br>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city" value="{{ $club->city }}">
        <br>
        <label for="postal_code">Code postal</label>
        <input type="text" name="postal_code" id="postal_code" value="{{ $club->postal_code }}">
        <button type="submit">Modifier les informations du club</button>
    </form>
</body>

</html>

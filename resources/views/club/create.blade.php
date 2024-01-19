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
        Créer un club
    </h1>
    <form action="{{ route('club.store') }}" method="POST">
        @csrf
        <label for="club_name">Nom du club</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="club_region">Region</label>
        <input type="text" name="region" id="region">
        <br>
        <label for="club_city">City</label>
        <input type="text" name="city" id="city">
        <br>
        <label for="club_postal_code">Code postal</label>
        <input type="text" name="postal_code" id="postal_code">
        <br>
        <button type="submit">Créer le club</button>
    </form>
</body>

</html>

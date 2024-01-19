<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <select name="id_club" id="id_club">
            <option value="">Veuillez choisir votre club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>

        <input type="text" id="firstname" name="firstname" placeholder="Prénom">

        <input type="text" id="lastname" name="lastname" placeholder="Nom">
        
        <input type="text" id="id_license" name="id_license" placeholder="Id licence">

        <select name="region" id="region">
            <option value="">Veuillez choisir votre région</option>
            @foreach ($regions as $region)
                <option value="{{ $region['nom'] }}">{{ $region['nom'] }}</option>
            @endforeach
        </select>

        <input type="text" id="city" name="city" placeholder="Ville">

        <input type="text" id="postal_code" name="postal_code" placeholder="Code postal">

        <input type="email" id="email" name="email" placeholder="Email">

        <input id="birthdate" name="birthdate" type="date">

        <input type="password" id="password" name="password" placeholder="Mot de passe">

        <input type="submit" value="Créer">
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    {{'Prénom: '.$user->firstname}}
    {{'Nom: '.$user->lastname}}
    {{'Id club: '.$user->id_club}}
    {{'Id licence: '.$user->id_license}}
    {{'Région: '.$user->region}}
    {{'Ville: '.$user->city}}
    {{'Code postal: '.$user->postal_code}}
    {{'Email: '.$user->email}}
    {{'Date: '.$user->birthdate}}
    <button onclick="window.location.href='{{ route('user.index') }}'">Page d'accueil</button>
</body>
</html>
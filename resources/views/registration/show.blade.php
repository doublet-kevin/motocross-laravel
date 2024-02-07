<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>

<body>
    {{ 'Id: ' . $registration->id }}
    {{ 'Id d\'entraînement: ' . $registration->training_id }}
    {{ 'Id utilisateur: ' . $registration->user_id }}
    {{ 'Date d\'enregistrement: ' . $registration->registration }}
    <button onclick="window.location.href='{{ route('registration.index') }}'">Page d'accueil</button>
</body>

</html>

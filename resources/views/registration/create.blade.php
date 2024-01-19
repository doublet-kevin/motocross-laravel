<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('registration.store') }}" method="post">
        @csrf
        <select name="id_training" id="id_training">
            <option value="">Veuillez choisir un entraînement</option>
            @foreach ($trainings as $training)
                <option value="{{ $training->id }}">{{ $training->id }}</option>
            @endforeach
        </select>
        <select name="id_user" id="id_user">
            <option value="">Veuillez choisir un utilisateur</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }}</option>
            @endforeach
        </select>
        <input type="date" name="registration_date" id="registration_date" placeholder="Date d'enregistrement">
        <input type="submit" value="Ajouter">
</body>
</html>
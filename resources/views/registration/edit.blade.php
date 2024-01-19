<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('registration.update', $registration->id) }}" method="post">
        @csrf
        @method('PUT')
        <select name="id_training" id="id_training">
            <option value="">Veuillez choisir un entraînement</option>
            @foreach ($trainings as $training)
                <option value="{{ $training->id }}"{{ $registration->id_training == $training->id ? 'selected' : '' }}>{{ $training->id }}</option> 
            @endforeach
        
        <input type="text" name="id_user" id="id_user" placeholder="Id utilisateur"value="{{ $registration->id_user }}">

        <input type="date" name="registration_date" id="registration_date" placeholder="Date d'enregistrement" value="{{ $registration->registration_date }}">
        <input type="submit" value="Modifier">
</body>
</html>
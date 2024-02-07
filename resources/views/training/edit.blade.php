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
        Mise à jour d'un Training
    </h1>
    <form action="{{ route('training.update', ['id' => $training->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="circuit_id">Sélectionnez un circuit</label>
        <select id="circuit_id" name="circuit_id">
            @foreach ($circuits as $circuit)
                <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="date">Date du training</label>
        <input type="date" name="date" id="date" value="{{ $training->date }}">
        <br>
        <fieldset>
            <legend>Choisir le type de training</legend>
            <div>
                <input type="radio" id="type" name="type" value="adulte"
                    {{ $training->type == 'Adulte' ? 'checked' : '' }} />
                <label for="Adulte">Adulte</label>
            </div>
            <div>
                <input type="radio" id="type" name="type" value="Enfant"
                    {{ $training->type == 'Enfant' ? 'checked' : '' }} />
                <label for="Enfant">Enfant</label>
            </div>
        </fieldset>
        <br>
        <label for="max_participants">Nombre de places (1-75):</label>
        <input type="number" id="max_participants" name="max_participants" min="1" max="75"
            value="{{ $training->max_participants }}" />
        <br>
        <button type="submit">Modifier le training</button>
</body>

</html>

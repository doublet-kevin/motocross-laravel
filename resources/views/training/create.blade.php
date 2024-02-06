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
        Créer un training
    </h1>
    <form action="{{ route('training.store') }}" method="POST">
        @csrf
        <label for="id_circuit">Sélectionnez un circuit</label>
        <select id="id_circuit" name="id_circuit">
            @foreach ($circuits as $circuit)
                <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="date">Date du training</label>
        <input type="date" name="date" id="date">
        <br>
        <fieldset>
            <legend>Choisir le type de training</legend>
            <div>
                <input type="radio" id="type" name="type" value="Adulte" />
                <label for="Adulte">Adulte</label>
            </div>
            <div>
                <input type="radio" id="type" name="type" value="Enfant" />
                <label for="Enfant">Enfant</label>
            </div>
        </fieldset>
        <br>
        <label for="max_participants">Nombre de places (1-75):</label>
        <input type="number" id="max_participants" name="max_participants" min="1" max="75" />
        <br>
        <button type="submit">Créer le training</button>
    </form>
</body>

</html>

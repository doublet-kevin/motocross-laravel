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
        Créer un circuit
    </h1>
    <form action="{{ route('circuit.store') }}" method="POST">
        @csrf
        <label for="circuit_name">Nom du circuit</label>
        <input type="text" name="name" id="name">
        <br>

        <button type="submit">Créer le circuit</button>
    </form>
</body>

</html>

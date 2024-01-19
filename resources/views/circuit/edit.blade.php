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
        Mise à jour du circuit
    </h1>
    <form action="{{ route('circuit.update', ['id' => $circuit->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $circuit->name }}">
        <br>
        <button type="submit">Modifier les informations du circuit</button>
    </form>
</body>

</html>

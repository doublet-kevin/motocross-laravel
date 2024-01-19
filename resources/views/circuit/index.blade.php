<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Ceci est la view index des circuits</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Modifier le circuit</th>
                <th scope="col">Supprimer le circuit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($circuits as $circuit)
                <tr>
                    <td scope="row">{{ $circuit->id }}</th>
                    <td>{{ $circuit->name }}</td>
                    <td><a class="btn btn-primary" href="{{ route('circuit.edit', ['id' => $circuit->id]) }}">Modifier
                            le circuit</a>
                    </td>
                    <td>
                        <form action="{{ route('circuit.destroy', ['id' => $circuit->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer le circuit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

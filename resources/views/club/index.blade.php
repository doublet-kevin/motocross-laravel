<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Ceci est la view index des clubs :</p>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Région</th>
                <th scope="col">Ville</th>
                <th scope="col">Code postal</th>
                <th scope="col">Modifier le club</th>
                <th scope="col">Supprimer le club</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clubs as $club)
                <tr>
                    <td scope="row">{{ $club->id }}</th>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->region }}</td>
                    <td>{{ $club->city }}</td>
                    <td>{{ $club->postal_code }}</td>
                    <td><a class="btn btn-primary" href="{{ route('club.edit', ['id' => $club->id]) }}">Modifier le
                            club</a>
                    </td>
                    <td>
                        <form action="{{ route('club.destroy', ['id' => $club->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer le club</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Ceci est la view index des trainings</p>
</body>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Circuit</th>
            <th scope="col">Date</th>
            <th scope="col">Type</th>
            <th scope="col">Nombre de places</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainings as $training)
            <tr>
                <td scope="row">{{ $training->id }}</td>
                <td>{{ $training->circuit->name }}</td>
                <td>{{ $training->date }}</td>
                <td>{{ $training->type }}</td>
                <td>{{ $training->number_of_places }}</td>
                <td><a class="btn btn-primary" href="{{ route('training.edit', ['id' => $training->id]) }}">Modifier le
                        training</a>
                </td>
                <td>
                    <form action="{{ route('training.destroy', ['id' => $training->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer le training</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</html>

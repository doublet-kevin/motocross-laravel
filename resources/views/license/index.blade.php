<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Id utilisateur</th>
                <th>Numéro de licence</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($licenses as $license)
                <tr>
                    <td>{{ $license->id }}</td>
                    <td>{{ $license->user_id }}</td>
                    <td>{{ $license->license_number }}</td>
                    <td>
                        <button
                            onclick="window.location.href='{{ route('license.edit', $license->id) }}'">Modifier</button>
                        <form action="{{ route('license.destroy', $license->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.location.href='{{ route('license.create') }}'">Ajouter une licence</button>
</body>

</html>

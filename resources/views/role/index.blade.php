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
                <th>Id role</th>
                <th>Nom</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name}}</td>
                    <td>
                        <button onclick="window.location.href='{{ route('role.edit', $role->id) }}'">Modifier</button>
                        <form action="{{ route('role.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <button onclick="window.location.href='{{ route('role.create') }}'">Ajouter un rôle</button>
</body>
</html>
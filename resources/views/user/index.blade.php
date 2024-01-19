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
                <th>Prénom</th>
                <th>Nom</th>
                <th>Id club</th>
                <th>Id licence</th>
                <th>Région</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->id_club}}</td>
                    <td>{{ $user->id_license }}</td>
                    <td>{{ $user->region }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->postal_code }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>
                        <button onclick="window.location.href='{{ route('user.edit', $user->id) }}'">Modifier</button>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </td>
                        </form>
                        <td>
                            <button onclick="window.location.href='{{ route('user.show', $user->id) }}'">Afficher le profil</button>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <button onclick="window.location.href='{{ route('user.create') }}'">Ajouter un utilisateur</button>
</body>
</html>
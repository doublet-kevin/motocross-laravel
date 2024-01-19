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
                <th>Id d'enregistrement</th>
                <th>Id d'entraînement</th>
                <th>Id utilisateur</th>
                <th>Date d'enregistrement</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $registration->id }}</td>
                    <td>{{ $registration->id_training }}</td>
                    <td>{{ $registration->id_user }}</td>
                    <td>{{ $registration->registration_date }}</td>
                    <td>
                        <button onclick="window.location.href='{{ route('registration.edit', $registration->id) }}'">Modifier</button>
                        <form action="{{ route('registration.destroy', $registration->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                    <td>
                        <button onclick="window.location.href='{{ route('registration.show', $registration->id) }}'">Afficher l'enregistrement</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <button onclick="window.location.href='{{ route('registration.create') }}'">Ajouter un enregistrement</button>
</body>
</html>
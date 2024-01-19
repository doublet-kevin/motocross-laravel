<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('license.update', $license->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="id_user" id="id_user" value="{{ $license->id_user }}" placeholder="Id utilisateur">

        <input type="text" name="license_number" id="license_number" value="{{ $license->license_number }}" placeholder="Numéro de licence">
        
        <input type="submit" value="Modifier">
</body>
</html>
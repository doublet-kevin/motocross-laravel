<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('role.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" id="name" name="name" placeholder="Nom" value="{{ $role->name }}">
        <input type="submit" value="Modifier">
</body>
</html>
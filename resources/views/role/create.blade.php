<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('role.store') }}" method="post">
        @csrf
        <input type="text" id="name" name="name" placeholder="Nom">
        <input type="submit" value="Créer">
</body>
</html>
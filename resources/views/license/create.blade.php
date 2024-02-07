@extends('admin.layout')
@section('content')

    <body>
        <form action="{{ route('admin.license.store') }}" method="post">
            @csrf
            <input type="text" name="user_id" id="user_id" placeholder="Id utilisateur">

            <input type="text" name="license_number" id="license_number" placeholder="Numéro de licence">

            <input type="submit" value="Ajouter">
    </body>
@endsection

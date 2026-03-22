<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un stagiaire</title>
</head>
<body>
    <h1>Ajouter un stagiaire</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('stagiaires.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom"><br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom"><br><br>

        <label>Email :</label>
        <input type="email" name="email"><br><br>

        <label>Filière :</label>
        <input type="text" name="filiere"><br><br>

        <label>Age :</label>
        <input type="number" name="age"><br><br>

        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="{{ route('stagiaires.index') }}">Retour à la liste</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
</head>
<body>
    <h1>Ajouter un étudiant</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">

        <br><br>

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <br><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <br><br>

        <label for="filiere">Filière</label>
        <input type="text" name="filiere" id="filiere">

        <br><br>

        <label for="age">Age</label>
        <input type="number" name="age" id="age">

        <br><br>

        <button type="submit">Ajouter</button>
        <a href="{{ route('students.index') }}">Retour</a>
    </form>
</body>
</html>
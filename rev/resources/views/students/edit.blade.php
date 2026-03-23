<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
</head>
<body>
    <h1>Modifier un étudiant</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom">nom</label>
        <input type="text" name="nom" value="{{ $student->nom }}">

        <label for="prenom">prenom</label>
        <input type="text" name="prenom" value="{{ $student->prenom }}">

        <label for="email">email</label>
        <input type="text" name="email" value="{{ $student->email }}">

        <label for="filiere">filiere</label>
        <input type="text" name="filiere" value="{{ $student->filiere }}">

        <label for="age">age</label>
        <input type="text" name="age" value="{{ $student->age }}">

        <button type="submit">modifier</button>
        <a href="{{ route('students.index') }}">retour</a>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Etudiant</title>
</head>
<body>
    <h1>Information Etudiant</h1>

    <p>nom : {{ $student->nom }}</p>
    <p>prenom : {{ $student->prenom }}</p>
    <p>email : {{ $student->email }}</p>
    <p>filiere : {{ $student->filiere }}</p>
    <p>age : {{ $student->age }}</p>

    <a href="{{ route('students.edit', $student->id) }}">modifier</a>

    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">supprimer</button>
    </form>

    <a href="{{ route('students.index') }}">retour</a>
</body>
</html>
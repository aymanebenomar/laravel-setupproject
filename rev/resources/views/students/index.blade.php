<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants</h1>

    <a href="{{ route('students.create') }}">Ajouter un étudiant</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>filiere</th>
                <th>age</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $std)
                <tr>
                    <td>{{ $std->nom }}</td>
                    <td>{{ $std->prenom }}</td>
                    <td>{{ $std->email }}</td>
                    <td>{{ $std->filiere }}</td>
                    <td>{{ $std->age }}</td>
                    <td>
                        <a href="{{ route('students.edit', $std->id) }}">edit</a>
                        <a href="{{ route('students.show', $std->id) }}">show</a>

                        <form action="{{ route('students.destroy', $std->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
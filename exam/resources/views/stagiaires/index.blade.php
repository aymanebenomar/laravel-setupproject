<!DOCTYPE html>
<html>
<head>
    <title>Liste des stagiaires</title>
</head>
<body>
    <h1>Liste des stagiaires</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('stagiaires.create') }}">Ajouter un stagiaire</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Filière</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>

        @foreach($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->id }}</td>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->email }}</td>
                <td>{{ $stagiaire->filiere }}</td>
                <td>{{ $stagiaire->age }}</td>
                <td>
                    <a href="{{ route('stagiaires.show', $stagiaire->id) }}">Afficher</a>
                    <a href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a>

                    <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
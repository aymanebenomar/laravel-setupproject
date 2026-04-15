<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body style="font-family: Arial; padding: 40px;">

    <h1>✅ Login Success</h1>

    <h2>User Info:</h2>
    <p><strong>User ID:</strong> {{ session('user_id') }}</p>
    <p><strong>Name:</strong> {{ session('name') }}</p>

    <h2>All Session Data:</h2>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
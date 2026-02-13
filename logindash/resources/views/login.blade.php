<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #111827;
            padding: 35px;
            border-radius: 14px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #ffffff;
        }

        label {
            font-size: 14px;
            color: #9ca3af;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #374151;
            background: #1f2937;
            color: #fff;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #2563eb;
        }

        .error {
            background: #7f1d1d;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .footer {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #9ca3af;
        }

        .footer a {
            color: #3b82f6;
            text-decoration: none;
        }

    </style>
</head>
<body>

    <div class="card">

        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Sign In</button>
        </form>

        <div class="footer">
            Don’t have an account?
            <a href="/register">Register</a>
        </div>

    </div>

</body>
</html>

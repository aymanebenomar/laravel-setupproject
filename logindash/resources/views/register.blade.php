<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #0b0f16;
      color: #e9eef7;
      margin: 0;
      padding: 0;
    }

    .wrap {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .card {
      width: 100%;
      max-width: 500px;
      background: #121a26;
      border-radius: 16px;
      padding: 25px;
      border: 1px solid rgba(255,255,255,0.08);
      box-shadow: 0 12px 30px rgba(0,0,0,0.35);
    }

    h2 {
      margin-top: 0;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
      opacity: 0.8;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid rgba(255,255,255,0.1);
      background: #0f141c;
      color: #fff;
    }

    button {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-weight: bold;
      background: #8dff8b;
      color: #07110a;
      margin-top: 10px;
    }

    .error {
      color: #ff6b6b;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .link {
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
    }

    .link a {
      color: #8dff8b;
      text-decoration: none;
    }
  </style>
</head>

<body>

<div class="wrap">
  <div class="card">

    <h2>Create Account</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
      <div class="error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/register">
      @csrf

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="link">
      Already have an account?
      <a href="/login">Login</a>
    </div>

  </div>
</div>

</body>
</html>

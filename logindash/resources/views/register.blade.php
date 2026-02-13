<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    :root{
      --bg1:#0b1020;
      --bg2:#0f172a;
      --card:#0b1220;
      --border: rgba(148,163,184,.16);
      --muted:#94a3b8;
      --text:#e5e7eb;
      --primary:#8dff8b;
      --primary2:#5eea66;
      --ring: rgba(141,255,139,.35);
      --danger-bg: rgba(239,68,68,.12);
      --danger-border: rgba(239,68,68,.30);
      --danger-text:#fecaca;
      --shadow: 0 25px 60px rgba(0,0,0,.55);
      --radius: 16px;
    }

    * { box-sizing: border-box; }
    html, body { height: 100%; }

    body{
      margin:0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
      color: var(--text);
      background:
        radial-gradient(900px 500px at 20% 15%, rgba(141,255,139,.15), transparent 60%),
        radial-gradient(700px 450px at 80% 85%, rgba(59,130,246,.12), transparent 55%),
        linear-gradient(135deg, var(--bg1), var(--bg2));
      display:flex;
      align-items:center;
      justify-content:center;
      padding: 28px 16px;
    }

    .wrap{
      width: 100%;
      max-width: 460px;
    }

    .card{
      background: linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.02));
      border: 1px solid var(--border);
      backdrop-filter: blur(10px);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }

    .card-header{
      padding: 24px 24px 0 24px;
    }

    .logo{
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background:
        radial-gradient(circle at 30% 30%, rgba(255,255,255,.22), transparent 55%),
        linear-gradient(135deg, var(--primary), var(--primary2));
      box-shadow: 0 12px 30px rgba(141,255,139,.25);
      border: 1px solid rgba(255,255,255,.10);
      margin-bottom: 12px;
    }

    h2{
      margin: 6px 0;
      font-size: 22px;
    }

    .subtitle{
      margin: 0 0 14px 0;
      color: var(--muted);
      font-size: 13.5px;
    }

    .card-body{
      padding: 18px 24px 24px 24px;
    }

    .error{
      background: var(--danger-bg);
      border: 1px solid var(--danger-border);
      color: var(--danger-text);
      padding: 12px;
      border-radius: 12px;
      margin-bottom: 14px;
      font-size: 13.5px;
    }

    .error ul{
      margin:0;
      padding-left:18px;
    }

    .field{
      margin-bottom: 14px;
    }

    label{
      display:block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 6px;
    }

    .input{
      width:100%;
      padding: 12px;
      border-radius: 12px;
      border: 1px solid var(--border);
      background: rgba(2,6,23,.55);
      color: var(--text);
      outline:none;
      transition: border-color .2s, box-shadow .2s;
    }

    .input:focus{
      border-color: var(--primary);
      box-shadow: 0 0 0 4px var(--ring);
    }

    .btn{
      width:100%;
      padding: 13px;
      border-radius: 12px;
      border: none;
      cursor:pointer;
      font-weight: 700;
      letter-spacing:.3px;
      background: linear-gradient(135deg, var(--primary), var(--primary2));
      color:#06210d;
      margin-top:10px;
      transition: transform .06s, filter .2s;
      box-shadow: 0 16px 34px rgba(141,255,139,.22);
    }

    .btn:hover{ filter: brightness(1.05); }
    .btn:active{ transform: translateY(1px); }

    .footer{
      padding: 18px 24px 22px;
      border-top: 1px solid rgba(148,163,184,.10);
      text-align:center;
      font-size: 13.5px;
      color: var(--muted);
    }

    .footer a{
      color: var(--primary);
      text-decoration:none;
      font-weight:600;
    }

    .footer a:hover{ text-decoration: underline; }

    @media (max-width: 380px){
      .card-header, .card-body, .footer{
        padding-left:16px;
        padding-right:16px;
      }
    }
  </style>
</head>

<body>

<div class="wrap">
  <div class="card">

    <div class="card-header">
      <div class="logo"></div>
      <h2>Create Account</h2>
      <p class="subtitle">Sign up to start using your dashboard.</p>
    </div>

    <div class="card-body">

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

        <div class="field">
          <label for="name">Full Name</label>
          <input id="name" class="input" type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="field">
          <label for="email">Email Address</label>
          <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="field">
          <label for="password">Password</label>
          <input id="password" class="input" type="password" name="password" required>
        </div>

        <div class="field">
          <label for="password_confirmation">Confirm Password</label>
          <input id="password_confirmation" class="input" type="password" name="password_confirmation" required>
        </div>

        <button class="btn" type="submit">Create Account</button>
      </form>

    </div>

    <div class="footer">
      Already have an account?
      <a href="/login">Sign In</a>
    </div>

  </div>
</div>

</body>
</html>

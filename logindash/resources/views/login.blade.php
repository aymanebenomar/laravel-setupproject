<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    :root{
      --bg1:#0b1020;
      --bg2:#0f172a;
      --card:#0b1220;
      --border: rgba(148,163,184,.16);
      --muted:#94a3b8;
      --text:#e5e7eb;
      --primary:#3b82f6;
      --primary2:#2563eb;
      --ring: rgba(59,130,246,.35);
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
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Apple Color Emoji","Segoe UI Emoji";
      color: var(--text);
      background:
        radial-gradient(900px 500px at 20% 15%, rgba(59,130,246,.20), transparent 60%),
        radial-gradient(700px 450px at 80% 85%, rgba(34,197,94,.12), transparent 55%),
        linear-gradient(135deg, var(--bg1), var(--bg2));
      display:flex;
      align-items:center;
      justify-content:center;
      padding: 28px 16px;
    }

    .wrap{
      width: 100%;
      max-width: 420px;
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
      padding: 22px 22px 0 22px;
    }

    .brand{
      display:flex;
      align-items:center;
      gap: 10px;
      margin-bottom: 10px;
      opacity: .95;
    }

    .logo{
      width: 38px;
      height: 38px;
      border-radius: 12px;
      background:
        radial-gradient(circle at 30% 30%, rgba(255,255,255,.22), transparent 55%),
        linear-gradient(135deg, rgba(59,130,246,.95), rgba(37,99,235,.95));
      box-shadow: 0 12px 30px rgba(59,130,246,.25);
      border: 1px solid rgba(255,255,255,.10);
    }

    h2{
      margin: 6px 0 6px 0;
      font-size: 22px;
      letter-spacing: .2px;
    }

    .subtitle{
      margin: 0 0 14px 0;
      color: var(--muted);
      font-size: 13.5px;
      line-height: 1.4;
    }

    .card-body{
      padding: 18px 22px 22px 22px;
    }

    .error{
      background: var(--danger-bg);
      border: 1px solid var(--danger-border);
      color: var(--danger-text);
      padding: 12px 12px;
      border-radius: 12px;
      margin-bottom: 14px;
      font-size: 13.5px;
      line-height: 1.45;
    }
    .error div + div{ margin-top: 6px; }

    form{ margin:0; }

    .field{ margin-bottom: 14px; }

    label{
      display:block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 7px;
      letter-spacing: .15px;
    }

    .input{
      width:100%;
      padding: 12px 12px;
      border-radius: 12px;
      border: 1px solid var(--border);
      background: rgba(2,6,23,.55);
      color: var(--text);
      outline: none;
      transition: border-color .2s, box-shadow .2s, transform .06s;
    }

    .input::placeholder{ color: rgba(148,163,184,.55); }

    .input:focus{
      border-color: rgba(59,130,246,.65);
      box-shadow: 0 0 0 4px var(--ring);
    }

    .row{
      display:flex;
      justify-content: space-between;
      align-items:center;
      gap: 12px;
      margin-top: 8px;
      margin-bottom: 14px;
    }

    .hint{
      color: var(--muted);
      font-size: 13px;
    }

    .link{
      color: rgba(147,197,253,.95);
      text-decoration: none;
      font-size: 13px;
    }
    .link:hover{ text-decoration: underline; }

    .btn{
      width:100%;
      padding: 12px 14px;
      border: 0;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--primary), var(--primary2));
      color: white;
      font-weight: 700;
      letter-spacing: .2px;
      cursor:pointer;
      transition: transform .06s, filter .2s, box-shadow .2s;
      box-shadow: 0 16px 34px rgba(37,99,235,.22);
    }
    .btn:hover{ filter: brightness(1.05); }
    .btn:active{ transform: translateY(1px); }

    .divider{
      display:flex;
      align-items:center;
      gap: 10px;
      margin: 16px 0 10px 0;
      color: rgba(148,163,184,.6);
      font-size: 12px;
    }
    .divider::before,
    .divider::after{
      content:"";
      flex:1;
      height:1px;
      background: rgba(148,163,184,.16);
    }

    .footer{
      padding: 14px 22px 20px 22px;
      border-top: 1px solid rgba(148,163,184,.10);
      text-align:center;
      font-size: 13.5px;
      color: var(--muted);
    }

    .footer a{
      color: rgba(147,197,253,.95);
      text-decoration:none;
      font-weight: 600;
    }
    .footer a:hover{ text-decoration: underline; }

    @media (max-width: 380px){
      .card-header, .card-body, .footer{ padding-left: 16px; padding-right: 16px; }
    }
  </style>
</head>

<body>
  <div class="wrap">
    <div class="card">

      <div class="card-header">
        <div class="brand">
          <div class="logo" aria-hidden="true"></div>
          <div>
            <div style="font-size:12px;color:rgba(148,163,184,.75);line-height:1;">Welcome back</div>
            <div style="font-size:12px;color:rgba(148,163,184,.55);line-height:1.2;margin-top:2px;">Sign in to continue</div>
          </div>
        </div>

        <h2>Login</h2>
        <p class="subtitle">Enter your credentials to access your account.</p>
      </div>

      <div class="card-body">
        @if ($errors->any())
          <div class="error" role="alert">
            @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
            @endforeach
          </div>
        @endif

        <form method="POST" action="/login" autocomplete="on">
          @csrf

          <div class="field">
            <label for="email">Email</label>
            <input
              id="email"
              class="input"
              type="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="you@example.com"
              required
              autofocus
            />
          </div>

          <div class="field">
            <label for="password">Password</label>
            <input
              id="password"
              class="input"
              type="password"
              name="password"
              placeholder="••••••••"
              required
            />
          </div>

          <div class="row">
            <span class="hint">Keep your account secure.</span>
            <!-- If you have a route: <a class="link" href="/forgot-password">Forgot password?</a> -->
            <a class="link" href="#" onclick="return false;">Forgot password?</a>
          </div>

          <button class="btn" type="submit">Sign In</button>
        </form>

        <div class="divider">or</div>

        <div class="hint" style="text-align:center;">
          Don’t have an account? <a class="link" href="/register">Create one</a>
        </div>
      </div>

      <div class="footer">
        By signing in, you agree to our <a href="#" onclick="return false;">Terms</a> &amp; <a href="#" onclick="return false;">Privacy</a>.
      </div>

    </div>
  </div>
</body>
</html>

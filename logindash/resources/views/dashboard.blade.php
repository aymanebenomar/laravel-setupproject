<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
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
      max-width: 520px;
      background: #121a26;
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.35);
    }
    .top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 16px;
    }
    .title {
      font-size: 18px;
      font-weight: 700;
      margin: 0;
    }
    .badge {
      font-size: 12px;
      padding: 6px 10px;
      border-radius: 999px;
      background: rgba(141,255,139,0.12);
      color: #8dff8b;
      border: 1px solid rgba(141,255,139,0.25);
      white-space: nowrap;
    }
    .line {
      height: 1px;
      background: rgba(255,255,255,0.08);
      margin: 14px 0;
    }
    .box {
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.07);
      border-radius: 14px;
      padding: 14px;
      margin-top: 12px;
    }
    .label {
      font-size: 12px;
      opacity: 0.7;
      margin: 0 0 6px;
    }
    .value {
      font-size: 14px;
      margin: 0;
      font-weight: 600;
      word-break: break-word;
    }
    .btn {
      width: 100%;
      margin-top: 16px;
      padding: 12px 14px;
      border-radius: 12px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      background: #8dff8b;
      color: #07110a;
      transition: transform .05s ease;
    }
    .btn:active { transform: scale(0.99); }
    .small {
      font-size: 12px;
      opacity: 0.7;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="wrap">
    <div class="card">
      <div class="top">
        <h1 class="title">Dashboard</h1>
        <div class="badge">Authenticated ✅</div>
      </div>

      <p style="margin: 0; opacity: .85;">
        Welcome back,
        <strong>{{ auth()->user()->name }}</strong> 👋
      </p>

      <div class="line"></div>

      <div class="box">
        <p class="label">Email</p>
        <p class="value">{{ auth()->user()->email }}</p>
      </div>

      <div class="box">
        <p class="label">User ID</p>
        <p class="value">{{ auth()->user()->id }}</p>
      </div>

      <form method="POST" action="/logout">
        @csrf
        <button class="btn" type="submit">Logout</button>
      </form>

      <p class="small">
        If you refresh the page and you're still here, session login is working ✅
      </p>
    </div>
  </div>
</body>
</html>

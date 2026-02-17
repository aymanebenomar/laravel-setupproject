{{-- resources/views/posts/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Post</title>

  <style>
    :root{
      --bg:#0b0f16;
      --panel:#121a26;
      --panel2:#0f1623;
      --text:#e9eef7;
      --muted:rgba(233,238,247,.65);
      --muted2:rgba(233,238,247,.82);
      --border:rgba(255,255,255,.10);
      --shadow:0 14px 40px rgba(0,0,0,.28);
      --accent:#8dff8b;
      --danger:#ff6b6b;
      --dangerBorder:rgba(255,107,107,.35);
    }

    *{box-sizing:border-box}
    body{
      font-family:ui-sans-serif,system-ui,-apple-system,"Segoe UI",Arial,sans-serif;
      background:var(--bg);
      color:var(--text);
      margin:0;
    }

    .wrap{max-width:920px;margin:0 auto;padding:26px 16px 44px}

    /* Topbar */
    .topbar{
      position:sticky;
      top:0;
      z-index:20;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
      padding:14px 0;
      background:linear-gradient(to bottom, rgba(11,15,22,.92), rgba(11,15,22,.70), rgba(11,15,22,0));
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      margin-bottom:14px;
    }
    .brand{
      display:flex;
      align-items:flex-start;
      gap:12px;
      min-width:0;
    }
    .logo{
      width:42px;height:42px;border-radius:12px;
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      box-shadow:inset 0 0 0 1px rgba(255,255,255,.04);
      display:grid;place-items:center;
      flex:0 0 auto;
      overflow:hidden;
    }
    .logoDot{
      width:12px;height:12px;border-radius:999px;
      background:var(--accent);
      box-shadow:0 0 14px rgba(141,255,139,.35);
    }
    .brandText{min-width:0}
    .brandTitle{
      margin:0;
      font-weight:900;
      letter-spacing:-.02em;
      font-size:22px;
      line-height:1.1;
      display:flex;
      align-items:center;
      gap:8px;
      white-space:nowrap;
      overflow:hidden;
      text-overflow:ellipsis;
    }
    .brandTitle .dot{
      color:var(--accent);
      text-shadow:0 0 16px rgba(141,255,139,.25);
    }
    .muted{color:var(--muted);font-size:13px}
    .muted strong{color:rgba(233,238,247,.88)}

    /* Card */
    .card{
      background:var(--panel);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:16px;
      box-shadow:var(--shadow);
    }

    /* Errors */
    .errors{
      border-color:rgba(255,107,107,.28);
      background:rgba(255,107,107,.06);
      color:var(--danger);
      margin-bottom:14px;
    }
    .errors ul{margin:8px 0 0;padding-left:18px;color:rgba(255,107,107,.92)}

    /* Form */
    label{display:block;margin:0 0 6px}
    input,textarea{
      width:100%;
      background:var(--panel2);
      border:1px solid var(--border);
      border-radius:12px;
      color:var(--text);
      padding:11px 12px;
      outline:none;
      transition:border-color .12s ease, box-shadow .12s ease;
    }
    input:focus,textarea:focus{
      border-color:rgba(141,255,139,.45);
      box-shadow:0 0 0 3px rgba(141,255,139,.10);
    }
    textarea{min-height:150px;resize:vertical}
    .gap{height:14px}

    /* Buttons */
    .row{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      align-items:center;
    }
    .btn{
      background:var(--accent);
      color:#0b0f16;
      border:0;
      border-radius:12px;
      padding:10px 14px;
      font-weight:800;
      cursor:pointer;
      transition:transform .12s ease, filter .12s ease;
      white-space:nowrap;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:8px;
    }
    .btn:hover{filter:brightness(1.05);transform:translateY(-1px)}
    .btn:active{transform:translateY(0px)}

    .btnGhost{
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      color:rgba(233,238,247,.9);
    }

    .hint{
      margin-top:12px;
      color:var(--muted);
      font-size:13px;
      line-height:1.6;
    }

    @media (max-width: 520px){
      .brandTitle{font-size:20px}
      .logo{width:40px;height:40px}
      .card{padding:14px;border-radius:14px}
      .btn{padding:10px 12px}
    }
  </style>
</head>

<body>
  <div class="wrap">

    {{-- TOPBAR --}}
    <div class="topbar">
      <div class="brand">
        <div class="logo" aria-hidden="true">
          <span class="logoDot"></span>
        </div>
        <div class="brandText">
          <h1 class="brandTitle">
            Create Post<span class="dot">.</span>
          </h1>
          <div class="muted">
            Signed in as <strong>{{ auth()->user()->name }}</strong>
          </div>
        </div>
      </div>

      <div class="row">
        <a class="btn btnGhost" href="{{ route('posts.index') }}">← Back to feed</a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btnGhost" type="submit">Logout</button>
        </form>
      </div>
    </div>

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
      <div class="card errors">
        <strong>Fix these:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- CREATE POST FORM --}}
    <div class="card">
      <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label class="muted">Title</label>
        <input
          name="title"
          value="{{ old('title') }}"
          placeholder="Write a clear title..."
          autocomplete="off"
          required
          autofocus
        />

        <div class="gap"></div>

        <label class="muted">Content</label>
        <textarea
          name="content"
          placeholder="What's on your mind?"
          required
        >{{ old('content') }}</textarea>

        <div class="gap"></div>

        <div class="row">
          <button class="btn" type="submit">Post</button>
          <a class="btn btnGhost" href="{{ route('posts.index') }}">Cancel</a>
        </div>

        <div class="hint">
          Tip: keep it short and real. Use a strong title + one clear idea in the content.
        </div>
      </form>
    </div>

  </div>
</body>
</html>

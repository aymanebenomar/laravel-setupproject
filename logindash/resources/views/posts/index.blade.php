{{-- resources/views/posts/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Posts</title>

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

    .wrap{max-width:1100px;margin:0 auto;padding:26px 16px 44px}

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
      margin-bottom:10px;
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

    /* Cards */
    .card{
      background:var(--panel);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:16px;
      box-shadow:var(--shadow);
    }

    .errors{
      border-color:rgba(255,107,107,.28);
      background:rgba(255,107,107,.06);
      color:var(--danger);
    }
    .errors ul{margin:8px 0 0;padding-left:18px;color:rgba(255,107,107,.92)}

    /* Buttons */
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

    .btnDanger{
      background:transparent;
      color:var(--danger);
      border:1px solid var(--dangerBorder);
      border-radius:12px;
      padding:8px 12px;
      cursor:pointer;
      transition:transform .12s ease, border-color .12s ease;
      white-space:nowrap;
      font-weight:800;
    }
    .btnDanger:hover{transform:translateY(-1px);border-color:rgba(255,107,107,.6)}
    .btnDanger:active{transform:translateY(0px)}

    .gap{height:14px}

    /* ====== FACEBOOK LAYOUT GRID ====== */
    .grid{
      display:grid;
      grid-template-columns: 260px 1fr 260px;
      gap:14px;
      align-items:start;
      margin-top:14px;
    }

    /* Sticky sidebars (desktop) */
    .leftCol, .rightCol{
      position:sticky;
      top:86px; /* below topbar */
      align-self:start;
    }

    /* Left profile */
    .profile{
      display:flex;
      gap:12px;
      align-items:center;
      margin-bottom:12px;
    }
    .avatar{
      width:46px;height:46px;border-radius:14px;
      background:rgba(141,255,139,.12);
      border:1px solid rgba(141,255,139,.25);
      display:grid;place-items:center;
      font-weight:900;
      color:rgba(233,238,247,.95);
      flex:0 0 auto;
      box-shadow:0 0 16px rgba(141,255,139,.10);
    }
    .name{
      margin:0;
      font-weight:900;
      letter-spacing:-.01em;
      font-size:15px;
      line-height:1.2;
    }
    .email{
      margin-top:4px;
      font-size:12px;
      color:var(--muted);
      overflow:hidden;
      text-overflow:ellipsis;
      white-space:nowrap;
      max-width:180px;
    }

    .nav{
      margin-top:12px;
      display:grid;
      gap:8px;
    }
    .nav a{
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:10px 12px;
      border-radius:12px;
      border:1px solid rgba(255,255,255,.08);
      background:rgba(255,255,255,.04);
      color:rgba(233,238,247,.9);
      text-decoration:none;
      transition:transform .12s ease, border-color .12s ease, background .12s ease;
      font-weight:800;
      font-size:13px;
    }
    .nav a:hover{
      transform:translateY(-1px);
      border-color:rgba(141,255,139,.28);
      background:rgba(141,255,139,.06);
    }

    /* Right create widget */
    .widgetHead{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:12px;
      margin-bottom:10px;
    }
    .widgetTitle{
      margin:0;
      font-size:15px;
      font-weight:900;
      letter-spacing:-.01em;
      color:rgba(233,238,247,.92);
    }
    .plusBtn{
      width:44px;height:44px;
      border-radius:14px;
      border:1px solid rgba(141,255,139,.25);
      background:rgba(141,255,139,.12);
      color:rgba(233,238,247,.98);
      font-size:26px;
      font-weight:900;
      line-height:1;
      display:grid;
      place-items:center;
      text-decoration:none;
      transition:transform .12s ease, filter .12s ease, border-color .12s ease;
      box-shadow:0 0 18px rgba(141,255,139,.10);
    }
    .plusBtn:hover{
      transform:translateY(-1px);
      filter:brightness(1.05);
      border-color:rgba(141,255,139,.45);
    }
    .plusBtn:active{transform:translateY(0)}

    /* Feed */
    .feed{display:grid;gap:14px}
    .postHead{
      display:flex;
      justify-content:space-between;
      gap:12px;
      align-items:flex-start;
    }
    .title{
      margin:0;
      font-size:18px;
      font-weight:900;
      letter-spacing:-.01em;
      color:rgba(233,238,247,.92);
      overflow-wrap:anywhere;
    }
    .meta{
      margin-top:6px;
      color:var(--muted);
      font-size:13px;
      line-height:1.5;
    }
    .content{
      margin:12px 0 0;
      line-height:1.75;
      color:var(--muted2);
      white-space:pre-wrap;
      overflow-wrap:anywhere;
    }
    .empty{
      text-align:center;
      padding:18px;
      color:var(--muted);
    }

    .footerNote{
      margin-top:18px;
      text-align:center;
      color:rgba(233,238,247,.40);
      font-size:12px;
    }

    /* Pagination */
    .pager{
      margin-top:12px;
    }

    /* Responsive */
    @media (max-width: 980px){
      .grid{
        grid-template-columns: 1fr;
      }
      .leftCol, .rightCol{
        position:static;
      }
      .rightCol{order:2}
      .midCol{order:1}
      .leftCol{order:3}
    }
    @media (max-width: 520px){
      .brandTitle{font-size:20px}
      .logo{width:40px;height:40px}
      .btn{padding:10px 12px}
      .card{padding:14px;border-radius:14px}
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
            Posts<span class="dot">.</span>
          </h1>
          <div class="muted">
            Welcome, <strong>{{ auth()->user()->name }}</strong>
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btnGhost" type="submit">Logout</button>
      </form>
    </div>

    {{-- FLASH SUCCESS --}}
    @if (session('success'))
      <div class="card" style="border-color: rgba(141,255,139,.22); background: rgba(141,255,139,.06);">
        <strong style="color: rgba(141,255,139,.95);">✅ {{ session('success') }}</strong>
      </div>
      <div class="gap"></div>
    @endif

    {{-- VALIDATION ERRORS (will mainly appear on create page, but keep it here safe) --}}
    @if ($errors->any())
      <div class="card errors">
        <strong>Fix these:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <div class="gap"></div>
    @endif

    {{-- 3-COLUMN LAYOUT --}}
    <div class="grid">

      {{-- LEFT SIDEBAR --}}
      <aside class="leftCol">
        <div class="card">
          <div class="profile">
            <div class="avatar">
              {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <div style="min-width:0">
              <p class="name">{{ auth()->user()->name }}</p>
              <p class="email">{{ auth()->user()->email }}</p>
            </div>
          </div>

          <div class="nav">
            <a href="{{ route('posts.index') }}">
              <span>🏠 Feed</span>
              <span class="muted">→</span>
            </a>
            <a href="{{ route('posts.create') }}">
              <span>✍️ Create post</span>
              <span class="muted">→</span>
            </a>
          </div>
        </div>
      </aside>

      {{-- MIDDLE FEED --}}
      <main class="midCol">
        <div class="feed">
          @forelse ($posts as $post)
            <article class="card">
              <div class="postHead">
                <div>
                  <h3 class="title">{{ $post->title }}</h3>
                  <div class="meta">
                    By <strong>{{ $post->user->name ?? 'Unknown' }}</strong>
                    • {{ $post->created_at->diffForHumans() }}
                  </div>
                </div>

                {{-- Delete only if owner --}}
                @if ($post->user_id === auth()->id())
                  <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btnDanger" type="submit">Delete</button>
                  </form>
                @endif
              </div>

              <p class="content">{{ $post->content }}</p>
            </article>
          @empty
            <div class="card empty">No posts yet. Click + to create the first one.</div>
          @endforelse
        </div>

        <div class="pager">
          {{ $posts->links() }}
        </div>

        <div class="footerNote">
          Simple feed • Laravel Blade • 3-column layout
        </div>
      </main>

      {{-- RIGHT SIDEBAR --}}
      <aside class="rightCol">
        <div class="card">
          <div class="widgetHead">
            <div>
              <p class="widgetTitle">Create</p>
              <div class="muted">Share something with the feed</div>
            </div>

            {{-- + button goes to create page --}}
            <a class="plusBtn" href="{{ route('posts.create') }}" title="Create post">+</a>
          </div>

          <div class="muted" style="margin-top:10px; line-height:1.6;">
            Tip: keep posts short, clear, and real.  
            Your feed will look more “social” with consistent titles.
          </div>

          <div style="margin-top:12px;">
            <a class="btn" href="{{ route('posts.create') }}">Write a post</a>
          </div>
        </div>
      </aside>

    </div>

  </div>
</body>
</html>

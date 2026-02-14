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
    textarea{min-height:120px;resize:vertical}
    .gap{height:14px}

    .composerHead{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
      margin-bottom:10px;
    }
    .composerTitle{
      margin:0;
      font-size:15px;
      font-weight:900;
      letter-spacing:-.01em;
      color:rgba(233,238,247,.9);
    }

    /* Feed */
    .feed{margin-top:16px;display:grid;gap:14px}
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

    /* Footer note */
    .footerNote{
      margin-top:18px;
      text-align:center;
      color:rgba(233,238,247,.40);
      font-size:12px;
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

    <div class="topbar">
      <div class="brand">
        <div class="logo" aria-hidden="true">
          <span class="logoDot"></span>
        </div>
        <div class="brandText">
          <h1 class="brandTitle">
            Posts<span class="dot">.</span>
          </h1>
          <div class="muted">Welcome, <strong>{{ auth()->user()->name }}</strong></div>
        </div>
      </div>

      <form method="POST" action="/logout">
        @csrf
        <button class="btn btnGhost" type="submit">Logout</button>
      </form>
    </div>

    {{-- Validation errors --}}
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

    {{-- Create post --}}
    <div class="card">
      <div class="composerHead">
        <p class="composerTitle">Create a post</p>
        <span class="muted">Share something with the feed</span>
      </div>

      <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label class="muted">Title</label>
        <input
          name="title"
          value="{{ old('title') }}"
          placeholder="Write a title..."
          autocomplete="off"
          required
        />

        <div class="gap"></div>

        <label class="muted">Content</label>
        <textarea
          name="content"
          placeholder="What's on your mind?"
          required
        >{{ old('content') }}</textarea>

        <div class="gap"></div>

        <button class="btn" type="submit">Post</button>
      </form>
    </div>

    {{-- Feed --}}
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
              <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button class="btnDanger" type="submit">Delete</button>
              </form>
            @endif
          </div>

          <p class="content">{{ $post->content }}</p>
        </article>
      @empty
        <div class="card empty">No posts yet. Create the first one 👆</div>
      @endforelse
    </div>

    <div class="footerNote">
      Simple feed • Laravel Blade
    </div>

  </div>
</body>
</html>

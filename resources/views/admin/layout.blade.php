<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin · @yield('title', 'Lista de Presentes')</title>
  <link rel="stylesheet" href="{{ asset('css/classical.css') }}">
  <style>
    body{ background:var(--color-bg); }
    .admin-wrap{ max-width:1080px; margin:0 auto; padding:0 24px 80px; }
    .flash{ padding:12px 16px; border-radius:var(--radius-md); margin:20px 0; font-size:14px; }
    .flash-ok{ background:var(--color-accent-100); color:var(--color-accent-800); border:1px solid var(--color-accent-300); }
    .flash-err{ background:#fdecec; color:#8a2b2b; border:1px solid #e6b3b3; }
    .admin-thumb{ width:56px; height:56px; object-fit:cover; border-radius:var(--radius-sm); border:1px solid var(--color-divider); }
    .status-pill{ font-size:11px; letter-spacing:.06em; text-transform:uppercase; padding:3px 10px; border-radius:99px; }
    .status-disponivel{ background:var(--color-accent-100); color:var(--color-accent-800); }
    .status-reservado{ background:var(--color-neutral-200); color:var(--color-neutral-800); }
    .status-oculto{ background:#efe7e7; color:var(--color-neutral-700); }
    .actions a, .actions button{ font-size:13px; }
  </style>
</head>
<body>
  <nav class="nav">
    <span class="nav-brand">Carlos &amp; Bia · Admin</span>
    <a href="{{ route('admin.products.index') }}" @if(request()->routeIs('admin.products.*')) aria-current="page" @endif>Produtos</a>
    <a href="{{ route('admin.reservations.index') }}" @if(request()->routeIs('admin.reservations.*')) aria-current="page" @endif>Reservas</a>
    <a href="{{ route('home') }}" target="_blank" rel="noopener">Ver site ↗</a>
    <form method="POST" action="{{ route('admin.logout') }}" style="margin:0;">
      @csrf
      <button type="submit" class="btn btn-ghost">Sair</button>
    </form>
  </nav>

  <main class="admin-wrap">
    @if (session('status'))
      <div class="flash flash-ok">{{ session('status') }}</div>
    @endif
    @if (session('error'))
      <div class="flash flash-err">{{ session('error') }}</div>
    @endif

    @yield('content')
  </main>
</body>
</html>

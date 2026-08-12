<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin · Entrar</title>
  <link rel="stylesheet" href="{{ asset('css/classical.css') }}">
</head>
<body>
  <div style="min-height:100vh; display:grid; place-items:center; padding:24px;">
    <div class="card elev-md" style="width:min(400px,100%); gap:var(--space-4); padding:var(--space-6);">
      <div style="text-align:center;">
        <div style="font-family:var(--font-heading); letter-spacing:.24em; text-transform:uppercase; font-size:12px; color:var(--color-accent-700);">Lista de Presentes</div>
        <h1 style="font-size:30px; margin:8px 0 0;">Painel Admin</h1>
      </div>

      @if ($errors->any())
        <div style="background:#fdecec; color:#8a2b2b; border:1px solid #e6b3b3; padding:10px 14px; border-radius:var(--radius-md); font-size:14px;">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.login.attempt') }}" style="display:flex; flex-direction:column; gap:var(--space-3); margin:0;">
        @csrf
        <div class="field">
          <label for="email">E-mail</label>
          <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="field">
          <label for="password">Senha</label>
          <input class="input" type="password" id="password" name="password" required>
        </div>
        <label class="radio" style="gap:8px;">
          <input type="checkbox" name="remember" value="1" style="accent-color:var(--color-accent);"> Manter conectado
        </label>
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
      </form>
    </div>
  </div>
</body>
</html>

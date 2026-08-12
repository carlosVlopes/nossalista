<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carlos & Bia · Lista de Presentes</title>
  <link rel="stylesheet" href="{{ asset('css/classical.css') }}">
  <style>
    :root{
      --sage:#a8cd82; --sage-deep:#6f9a4a; --olive:#7ba050;
      --paper:#f3f2f2; --camel:#c9a066;
    }
    body{ margin:0; background:var(--color-bg); }
    a{ color:var(--color-accent-700); text-decoration:none; }
    a:hover{ color:var(--color-accent); }
    @keyframes riseIn{ from{opacity:0; transform:translateY(14px);} to{opacity:1; transform:none;} }
    .cb-card-media{
      position:relative; height:210px; margin:-1px -1px 0; overflow:hidden;
      background:#fff;
      display:flex; align-items:center; justify-content:center;
      filter:sepia(0.22) saturate(0.82) contrast(1.05);
    }
    .cb-card-media img{ width:100%; height:100%; object-fit:contain; padding:14px; box-sizing:border-box; }
    .cb-card-media .cb-placeholder{ color:var(--color-accent-300); opacity:.55; }
    .cb-hidden{ display:none !important; }
    /* flash toast */
    .cb-flash{ position:fixed; left:50%; top:24px; transform:translateX(-50%); z-index:60; max-width:92vw;
      padding:14px 22px; border-radius:var(--radius-md); font-family:var(--font-body); font-size:15px; box-shadow:var(--shadow-md); }
    .cb-flash-ok{ background:#eef6e6; color:var(--sage-deep); border:1px solid var(--olive); }
    .cb-flash-err{ background:#fdecec; color:#8a2b2b; border:1px solid #e6b3b3; }
    /* modal */
    .cb-modal-backdrop{ position:fixed; inset:0; z-index:50; display:none; place-items:center; padding:20px;
      background:color-mix(in srgb, var(--color-neutral-900) 46%, transparent); }
    .cb-modal-backdrop.open{ display:grid; }
    .cb-modal{ width:min(440px,100%); background:var(--color-bg); border:1px solid var(--color-divider);
      border-radius:var(--radius-lg); box-shadow:var(--shadow-lg); padding:30px 30px 28px; animation:riseIn .25s ease both; }
    .cb-spinner{ display:inline-block; width:16px; height:16px; border:2px solid rgba(255,255,255,.45);
      border-top-color:#fff; border-radius:50%; animation:cb-spin .7s linear infinite; vertical-align:-3px; margin-right:9px; }
    @keyframes cb-spin{ to{ transform:rotate(360deg); } }
    .cb-check-circle{ width:60px; height:60px; border-radius:50%; background:#eef6e6; border:1px solid var(--olive);
      display:grid; place-items:center; margin:0 auto 18px; color:var(--sage-deep); animation:riseIn .35s ease both; }
    @media (max-width:640px){
      .cb-hero{ padding:56px 18px 44px !important; }
      .cb-hero-grid{ grid-template-columns:1fr !important; gap:32px !important; text-align:center !important; }
      .cb-hero-text{ text-align:center !important; order:2 !important; }
      .cb-hero-text > div:first-child{ margin-bottom:18px !important; }
      .cb-hero-text .cb-intro{ margin-left:auto !important; margin-right:auto !important; }
      .cb-hero-text > div:nth-child(3){ margin-left:auto !important; margin-right:auto !important; }
      .cb-hero-photo{ order:1 !important; justify-self:center !important; max-width:300px !important; }
      .cb-hero-frame-a{ inset:12px !important; }
      .cb-hero-frame-b{ inset:18px !important; }
      .cb-intro{ font-size:16.5px !important; line-height:1.7 !important; }
      .cb-signoff{ margin-top:28px !important; font-size:19px !important; }
      .cb-wrap{ padding:0 18px !important; }
      .cb-listhead{ align-items:flex-start !important; gap:14px !important; }
      .cb-count{ text-align:left !important; min-width:0 !important; }
      .cb-grid{ grid-template-columns:1fr !important; gap:22px !important; }
      .cb-footer{ padding:40px 18px 60px !important; }
    }
  </style>
</head>
<body>
@if (session('status'))
  <div class="cb-flash cb-flash-ok" data-autohide>{{ session('status') }}</div>
@elseif (session('error'))
  <div class="cb-flash cb-flash-err" data-autohide>{{ session('error') }}</div>
@endif

<div style="min-height:100vh; color:var(--color-text); font-family:var(--font-body);">

  <header class="cb-hero" style="position:relative; padding:64px 40px; overflow:hidden;">
    <div class="cb-hero-frame-a" style="position:absolute; inset:22px; border:1px solid var(--color-accent); opacity:.45; pointer-events:none;"></div>
    <div class="cb-hero-frame-b" style="position:absolute; inset:29px; border:1px solid var(--color-divider); pointer-events:none;"></div>
    <div class="cb-hero-grid" style="position:relative; max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.05fr .95fr; align-items:center; gap:56px; animation:riseIn .9s ease both;">
      <div class="cb-hero-text" style="text-align:left;">
        <div style="font-family:var(--font-heading); letter-spacing:.34em; text-transform:uppercase; font-size:13px; color:var(--color-accent-700); font-feature-settings:'tnum'; margin-bottom:24px;">Nossa Casa Nova &nbsp;·&nbsp; Lista de Presentes</div>
        <h1 style="font-family:var(--font-heading); font-weight:400; font-size:clamp(48px,7vw,92px); line-height:1.02; margin:0; letter-spacing:.01em;">Carlos<span style="font-style:italic; color:var(--color-accent); display:inline-block; margin:0 .22em;">&amp;</span>Bia</h1>
        <div style="display:flex; align-items:center; gap:16px; margin:26px 0 0; max-width:360px;">
          <span style="flex:1; height:1px; background:var(--color-accent); opacity:.5;"></span>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="1.3"><path d="M12 20s-7-4.5-9.3-9C1 7.5 3 4.5 6.2 4.5 8.3 4.5 10 6 12 8c2-2 3.7-3.5 5.8-3.5 3.2 0 5.2 3 3.5 6.5C19 15.5 12 20 12 20z"/></svg>
          <span style="flex:1; height:1px; background:var(--color-accent); opacity:.5;"></span>
        </div>
        <p class="cb-intro" style="font-family:var(--font-body); font-size:18px; line-height:1.75; color:var(--color-neutral-700); max-width:520px; margin:26px 0 0; text-wrap:pretty;">Estamos começando uma vida juntos e uma casa nova para chamar de nossa. Se quiser fazer parte dessa história, reunimos aqui algumas coisas que sonhamos ter em nosso lar. Cada presente é um pedacinho do nosso recomeço obrigado por caminhar conosco.</p>
        <div class="cb-signoff" style="margin-top:30px; font-family:var(--font-heading); font-style:italic; font-size:22px; color:var(--color-accent-700);">Com carinho, Carlos e Bia</div>
      </div>
      <div class="plate cb-hero-photo" style="margin:0; max-width:440px; justify-self:end;">
        <img src="{{ asset('assets/carlos-bia.jpg') }}" alt="Carlos e Bia" style="display:block; width:100%; height:auto; aspect-ratio:4/5; object-fit:cover;">
      </div>
    </div>
  </header>

  <div class="cb-wrap" style="max-width:1160px; margin:0 auto; padding:0 24px;">
    <div class="hr" style="margin:8px 0 40px;"></div>

    <div class="cb-listhead" style="display:flex; flex-wrap:wrap; align-items:flex-end; justify-content:space-between; gap:24px; margin-bottom:34px;">
      <div>
        <div style="font-family:var(--font-heading); letter-spacing:.26em; text-transform:uppercase; font-size:14px; color:var(--color-accent-700); margin-bottom:8px;">A Lista</div>
        <h2 style="font-family:var(--font-heading); font-weight:400; font-size:clamp(34px,4.4vw,50px); margin:0; line-height:1.1;">Presentes para o nosso lar</h2>
      </div>
      <div class="cb-count" style="text-align:right; min-width:200px;">
        <div id="cb-count-num" style="font-family:var(--font-heading); font-feature-settings:'tnum'; font-size:40px; line-height:1; color:var(--olive);">{{ $products->where('status', \App\Enums\ProductStatus::Disponivel)->count() }} de {{ $products->count() }}</div>
        <div style="font-size:15px; letter-spacing:.06em; color:var(--color-neutral-600); margin-top:6px;">presentes ainda disponíveis</div>
      </div>
    </div>

    @if ($products->isEmpty())
      <p class="text-muted" style="font-size:17px;">A lista está sendo preparada com carinho. Volte em breve. 💛</p>
    @else
    <div id="cb-chips" style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:12px;">
      @php $chipBase = "font-family:var(--font-heading); font-size:16px; letter-spacing:.03em; padding:9px 18px; border-radius:var(--radius-sm); cursor:pointer; background:transparent; transition:all .18s ease;"; @endphp
      @foreach (collect(['Todos'])->merge($categorias) as $cat)
        <button type="button" class="cb-chip" data-cat="{{ $cat }}" style="{{ $chipBase }}">{{ $cat }}</button>
      @endforeach
    </div>

    <label style="display:inline-flex; align-items:center; gap:10px; cursor:pointer; font-size:16px; color:var(--color-neutral-700); margin:18px 0 34px;">
      <input id="cb-hide-reserved" type="checkbox" style="accent-color:var(--olive); width:16px; height:16px;">
      Esconder presentes já reservados
    </label>

    <div class="cb-grid" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:28px; padding-bottom:16px;">
      @foreach ($products as $product)
        @php $isReservado = $product->status === \App\Enums\ProductStatus::Reservado; @endphp
        <div class="card cb-card" data-cat="{{ $product->categoria }}" data-reserved="{{ $isReservado ? '1' : '0' }}" style="display:flex; flex-direction:column; overflow:hidden; padding:0; @if($isReservado) opacity:.62; @endif">
          <div class="cb-card-media">
            @if ($product->imagemUrl())
              @if ($product->link)
                <a href="{{ $product->link }}" target="_blank" rel="noopener" style="display:block; width:100%; height:100%;" title="Ver {{ $product->nome }}">
                  <img src="{{ $product->imagemUrl() }}" alt="{{ $product->nome }}">
                </a>
              @else
                <img src="{{ $product->imagemUrl() }}" alt="{{ $product->nome }}">
              @endif
            @else
              <svg class="cb-placeholder" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M12 20s-7-4.5-9.3-9C1 7.5 3 4.5 6.2 4.5 8.3 4.5 10 6 12 8c2-2 3.7-3.5 5.8-3.5 3.2 0 5.2 3 3.5 6.5C19 15.5 12 20 12 20z"/></svg>
            @endif
            @if ($isReservado)
              <div style="position:absolute; top:12px; right:12px; display:inline-flex; align-items:center; gap:6px; background:var(--paper); border:1px solid var(--olive); color:var(--sage-deep); font-family:var(--font-heading); letter-spacing:.14em; text-transform:uppercase; font-size:11px; padding:6px 11px; border-radius:var(--radius-sm);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg> Reservado
              </div>
            @endif
          </div>
          <div style="padding:20px 22px 22px; display:flex; flex-direction:column; flex:1;">
            <div style="font-family:var(--font-heading); letter-spacing:.2em; text-transform:uppercase; font-size:13px; color:var(--sage-deep); margin-bottom:10px;">{{ $product->categoria }}</div>
            <h3 style="font-family:var(--font-heading); font-weight:500; font-size:27px; line-height:1.15; margin:0 0 12px;">{{ $product->nome }}</h3>
            @if ($product->descricao)
              <p style="font-family:var(--font-body); font-size:15px; line-height:1.6; color:var(--color-neutral-700); margin:0 0 20px;">{{ $product->descricao }}</p>
            @endif
            <div style="margin-top:auto; display:flex; flex-direction:column; gap:10px;">
              @if ($product->link)
                <a href="{{ $product->link }}" target="_blank" rel="noopener" style="width:100%; text-align:center; font-family:var(--font-heading); font-size:15px; letter-spacing:.05em; padding:10px 16px; border-radius:var(--radius-sm); border:1px solid var(--color-divider); color:var(--color-neutral-700);">Ver produto ↗</a>
              @endif
              @if ($isReservado)
                <button type="button" disabled style="width:100%; font-family:var(--font-heading); font-size:16px; letter-spacing:.05em; padding:12px 16px; border-radius:var(--radius-sm); background:transparent; border:1px solid var(--color-divider); color:var(--color-neutral-500); cursor:not-allowed;">Já reservado</button>
              @else
                <button type="button" class="cb-reserve" data-id="{{ $product->id }}" data-nome="{{ $product->nome }}" data-link="{{ $product->link }}" style="width:100%; font-family:var(--font-heading); font-size:17px; letter-spacing:.06em; padding:12px 16px; border-radius:var(--radius-sm); cursor:pointer; background:transparent; border:1px solid var(--olive); color:var(--sage-deep);">Reservar este presente</button>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
    @endif

    <div class="hr" style="margin:56px 0 0;"></div>
    <footer class="cb-footer" style="text-align:center; padding:46px 24px 72px;">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="1.2" style="margin-bottom:14px;"><path d="M12 20s-7-4.5-9.3-9C1 7.5 3 4.5 6.2 4.5 8.3 4.5 10 6 12 8c2-2 3.7-3.5 5.8-3.5 3.2 0 5.2 3 3.5 6.5C19 15.5 12 20 12 20z"/></svg>
      <p style="font-family:var(--font-heading); font-style:italic; font-size:24px; color:var(--color-neutral-700); max-width:520px; margin:0 auto; line-height:1.5;">A sua presença já é o maior presente. O resto é só carinho a mais.</p>
      <div style="margin-top:18px; font-family:var(--font-heading); letter-spacing:.28em; text-transform:uppercase; font-size:14px; color:var(--color-accent-700);">Carlos &amp; Bia</div>
    </footer>
  </div>
</div>

{{-- Reserve modal --}}
<div class="cb-modal-backdrop {{ $errors->any() ? 'open' : '' }}" id="cb-modal-backdrop">
  <div class="cb-modal" role="dialog" aria-modal="true" aria-labelledby="cb-modal-title">
    <div id="cb-modal-header">
      <div style="font-family:var(--font-heading); letter-spacing:.2em; text-transform:uppercase; font-size:12px; color:var(--color-accent-700); margin-bottom:8px;">Reservar presente</div>
      <h3 id="cb-modal-title" style="font-family:var(--font-heading); font-weight:500; font-size:24px; margin:0 0 6px;">Reservar</h3>
      <p id="cb-modal-item" style="font-family:var(--font-body); font-size:15px; color:var(--color-neutral-600); margin:0 0 20px;"></p>
    </div>

    @if ($errors->any())
      <div class="cb-flash-err" style="padding:10px 14px; border-radius:var(--radius-md); font-size:14px; margin-bottom:16px;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" id="cb-reserve-form" action="{{ url('/produtos/0/reservar') }}">
      @csrf
      <input type="hidden" name="_pid" id="cb-pid" value="{{ old('_pid') }}">
      <input type="hidden" name="_nome_item" id="cb-nome-item" value="{{ old('_nome_item') }}">
      <div class="field" style="margin-bottom:16px;">
        <label for="cb-nome">Seu nome *</label>
        <input class="input" type="text" id="cb-nome" name="nome" value="{{ old('nome') }}" required>
      </div>
      <div class="field" style="margin-bottom:22px;">
        <label for="cb-telefone">Seu telefone (WhatsApp) *</label>
        <input class="input" type="tel" id="cb-telefone" name="telefone" value="{{ old('telefone') }}" inputmode="numeric" maxlength="15" placeholder="(11) 91234-5678" required>
      </div>
      <div id="cb-reserve-error" class="cb-flash-err" style="display:none; padding:10px 14px; border-radius:var(--radius-md); font-size:14px; margin-bottom:16px;"></div>
      <div style="display:flex; gap:10px;">
        <button type="submit" id="cb-submit" style="flex:1; font-family:var(--font-heading); font-size:16px; padding:12px 16px; border-radius:var(--radius-sm); cursor:pointer; background:var(--sage-deep); border:1px solid var(--sage-deep); color:#fff;">Confirmar reserva</button>
        <button type="button" id="cb-modal-cancel" style="font-family:var(--font-heading); font-size:16px; padding:12px 16px; border-radius:var(--radius-sm); cursor:pointer; background:transparent; border:1px solid var(--color-divider); color:var(--color-neutral-700);">Cancelar</button>
      </div>
    </form>

    <div id="cb-reserve-success" style="display:none; text-align:center;">
      <div class="cb-check-circle">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6 9 17l-5-5"/></svg>
      </div>
      <h3 style="font-family:var(--font-heading); font-weight:500; font-size:24px; margin:0 0 8px;">Presente reservado!</h3>
      <p id="cb-reserve-success-msg" style="font-family:var(--font-body); font-size:16px; line-height:1.6; color:var(--color-neutral-700); margin:0 0 24px;"></p>
      <a id="cb-success-link" href="#" target="_blank" rel="noopener" style="display:none; margin-bottom:10px; width:100%; box-sizing:border-box; font-family:var(--font-heading); font-size:16px; padding:12px 16px; border-radius:var(--radius-sm); background:transparent; border:1px solid var(--olive); color:var(--sage-deep);">Ver o produto ↗</a>
      <button type="button" id="cb-success-close" style="width:100%; font-family:var(--font-heading); font-size:16px; padding:12px 16px; border-radius:var(--radius-sm); cursor:pointer; background:var(--sage-deep); border:1px solid var(--sage-deep); color:#fff;">Fechar</button>
    </div>
  </div>
</div>

<script>
(function () {
  // auto-hide flash toasts
  document.querySelectorAll('[data-autohide]').forEach(function (el) {
    setTimeout(function () { el.style.transition = 'opacity .4s'; el.style.opacity = '0'; setTimeout(function(){ el.remove(); }, 400); }, 4200);
  });

  // phone mask — BR format: (XX) XXXX-XXXX (fixo) / (XX) XXXXX-XXXX (celular)
  function maskPhone(value) {
    var d = value.replace(/\D/g, '').slice(0, 11);
    if (d.length === 0) { return ''; }
    var out = '(' + d.slice(0, 2);
    if (d.length < 2) { return out; }
    out += ') ';
    if (d.length <= 10) {
      out += d.slice(2, 6);
      if (d.length > 6) { out += '-' + d.slice(6, 10); }
    } else {
      out += d.slice(2, 7) + '-' + d.slice(7, 11);
    }
    return out;
  }

  var phoneInput = document.getElementById('cb-telefone');
  if (phoneInput) {
    phoneInput.addEventListener('input', function () { phoneInput.value = maskPhone(phoneInput.value); });
    phoneInput.value = maskPhone(phoneInput.value); // format any old() value on reload
  }

  var chips = Array.from(document.querySelectorAll('.cb-chip'));
  var cards = Array.from(document.querySelectorAll('.cb-card'));
  var hideInput = document.getElementById('cb-hide-reserved');
  var active = 'Todos';

  var chipBase = "font-family:var(--font-heading); font-size:16px; letter-spacing:.03em; padding:9px 18px; border-radius:var(--radius-sm); cursor:pointer; background:transparent; transition:all .18s ease;";
  var chipOn = "border:1px solid var(--color-accent); color:var(--color-accent-800); background:var(--color-accent-100);";
  var chipOff = "border:1px solid var(--color-divider); color:var(--color-neutral-600);";

  function applyFilters() {
    chips.forEach(function (chip) { chip.setAttribute('style', chipBase + (chip.dataset.cat === active ? chipOn : chipOff)); });
    var hideReserved = hideInput && hideInput.checked;
    cards.forEach(function (card) {
      var matchesCat = active === 'Todos' || card.dataset.cat === active;
      var visible = matchesCat && !(hideReserved && card.dataset.reserved === '1');
      card.classList.toggle('cb-hidden', !visible);
    });
  }

  chips.forEach(function (chip) {
    chip.addEventListener('click', function () { active = chip.dataset.cat; applyFilters(); });
    chip.addEventListener('mouseenter', function () { if (chip.dataset.cat !== active) { chip.style.borderColor = 'var(--color-accent)'; chip.style.color = 'var(--color-accent-700)'; } });
    chip.addEventListener('mouseleave', function () { if (chip.dataset.cat !== active) { chip.style.borderColor = 'var(--color-divider)'; chip.style.color = 'var(--color-neutral-600)'; } });
  });
  if (hideInput) hideInput.addEventListener('change', applyFilters);

  // reserve buttons hover
  document.querySelectorAll('.cb-reserve').forEach(function (btn) {
    btn.addEventListener('mouseenter', function () { btn.style.background = 'var(--sage-deep)'; btn.style.color = '#fff'; btn.style.borderColor = 'var(--sage-deep)'; });
    btn.addEventListener('mouseleave', function () { btn.style.background = 'transparent'; btn.style.color = 'var(--sage-deep)'; btn.style.borderColor = 'var(--olive)'; });
  });

  // modal
  var backdrop = document.getElementById('cb-modal-backdrop');
  var form = document.getElementById('cb-reserve-form');
  var itemLabel = document.getElementById('cb-modal-item');
  var errorBox = document.getElementById('cb-reserve-error');
  var successPanel = document.getElementById('cb-reserve-success');
  var successMsg = document.getElementById('cb-reserve-success-msg');
  var successLink = document.getElementById('cb-success-link');
  var submitBtn = document.getElementById('cb-submit');
  var cancelBtn = document.getElementById('cb-modal-cancel');
  var modalHeader = document.getElementById('cb-modal-header');
  var reserveBase = '{{ url('/produtos') }}';
  var SUBMIT_LABEL = 'Confirmar reserva';

  var pidInput = document.getElementById('cb-pid');
  var nomeItemInput = document.getElementById('cb-nome-item');
  var currentBtn = null;

  function resetModalState() {
    form.style.display = '';
    modalHeader.style.display = '';
    successPanel.style.display = 'none';
    errorBox.style.display = 'none';
    errorBox.textContent = '';
    submitBtn.disabled = false;
    cancelBtn.disabled = false;
    submitBtn.innerHTML = SUBMIT_LABEL;
  }

  function openModal(btn) {
    currentBtn = btn;
    form.action = reserveBase + '/' + btn.dataset.id + '/reservar';
    pidInput.value = btn.dataset.id;
    nomeItemInput.value = btn.dataset.nome;
    itemLabel.textContent = btn.dataset.nome;
    resetModalState();
    backdrop.classList.add('open');
    setTimeout(function(){ document.getElementById('cb-nome').focus(); }, 50);
  }
  function closeModal() { backdrop.classList.remove('open'); }

  function showError(msg) {
    errorBox.textContent = msg;
    errorBox.style.display = 'block';
    submitBtn.disabled = false;
    cancelBtn.disabled = false;
    submitBtn.innerHTML = SUBMIT_LABEL;
  }

  function updateCount(delta) {
    var el = document.getElementById('cb-count-num');
    if (!el) { return; }
    var m = el.textContent.match(/(\d+)\s+de\s+(\d+)/);
    if (!m) { return; }
    var avail = Math.max(0, parseInt(m[1], 10) + delta);
    el.textContent = avail + ' de ' + m[2];
  }

  function markCardReserved() {
    if (!currentBtn) { return; }
    var card = currentBtn.closest('.cb-card');
    if (!card || card.dataset.reserved === '1') { return; }
    card.dataset.reserved = '1';
    card.style.opacity = '.62';
    var media = card.querySelector('.cb-card-media');
    if (media && !media.querySelector('.cb-reserved-badge')) {
      var badge = document.createElement('div');
      badge.className = 'cb-reserved-badge';
      badge.style.cssText = 'position:absolute; top:12px; right:12px; display:inline-flex; align-items:center; gap:6px; background:var(--paper); border:1px solid var(--olive); color:var(--sage-deep); font-family:var(--font-heading); letter-spacing:.14em; text-transform:uppercase; font-size:11px; padding:6px 11px; border-radius:var(--radius-sm);';
      badge.innerHTML = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg> Reservado';
      media.appendChild(badge);
    }
    var doneBtn = document.createElement('button');
    doneBtn.type = 'button';
    doneBtn.disabled = true;
    doneBtn.style.cssText = 'width:100%; font-family:var(--font-heading); font-size:16px; letter-spacing:.05em; padding:12px 16px; border-radius:var(--radius-sm); background:transparent; border:1px solid var(--color-divider); color:var(--color-neutral-500); cursor:not-allowed;';
    doneBtn.textContent = 'Já reservado';
    currentBtn.replaceWith(doneBtn);
    updateCount(-1);
    applyFilters();
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    errorBox.style.display = 'none';
    submitBtn.disabled = true;
    cancelBtn.disabled = true;
    submitBtn.innerHTML = '<span class="cb-spinner"></span>Reservando…';

    fetch(form.action, {
      method: 'POST',
      headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
      body: new FormData(form),
    }).then(function (res) {
      return res.json().then(function (data) { return { status: res.status, data: data }; });
    }).then(function (r) {
      if (r.status >= 200 && r.status < 300 && r.data.reserved) {
        var productLink = currentBtn && currentBtn.dataset.link ? currentBtn.dataset.link : '';
        markCardReserved();
        form.style.display = 'none';
        modalHeader.style.display = 'none';
        successMsg.textContent = r.data.message || 'Obrigado por reservar!';
        if (productLink) {
          successLink.href = productLink;
          successLink.style.display = 'block';
        } else {
          successLink.style.display = 'none';
        }
        successPanel.style.display = 'block';
      } else if (r.status === 422) {
        var msg = 'Verifique os campos e tente de novo.';
        if (r.data.errors) {
          var keys = Object.keys(r.data.errors);
          if (keys.length && r.data.errors[keys[0]][0]) { msg = r.data.errors[keys[0]][0]; }
        }
        showError(msg);
      } else if (r.status === 409) {
        showError(r.data.message || 'Esse presente já foi reservado.');
        markCardReserved();
      } else {
        showError('Algo deu errado. Tente novamente.');
      }
    }).catch(function () {
      showError('Sem conexão. Verifique sua internet e tente novamente.');
    });
  });

  document.querySelectorAll('.cb-reserve').forEach(function (btn) {
    btn.addEventListener('click', function () { openModal(btn); });
  });
  cancelBtn.addEventListener('click', closeModal);
  document.getElementById('cb-success-close').addEventListener('click', closeModal);
  backdrop.addEventListener('click', function (e) { if (e.target === backdrop) closeModal(); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });

  applyFilters();
})();
</script>
</body>
</html>

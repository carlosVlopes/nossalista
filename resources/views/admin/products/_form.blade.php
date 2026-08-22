@csrf

@if ($errors->any())
  <div class="flash flash-err">
    <ul style="margin:0; padding-left:18px;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-4);">
  <div class="field">
    <label for="nome">Nome *</label>
    <input class="input" type="text" id="nome" name="nome" value="{{ old('nome', $product->nome) }}" required>
  </div>

  @php
    $categorias = \App\Models\Product::query()->select('categoria')->distinct()->orderBy('categoria')->pluck('categoria');
    $categoriaAtual = old('categoria', $product->categoria);
    $categoriaNova = filled($categoriaAtual) && ! $categorias->contains($categoriaAtual);
  @endphp
  <div class="field">
    <label for="categoria">Categoria *</label>
    <select class="input" id="categoria" name="{{ $categoriaNova ? '' : 'categoria' }}" required onchange="toggleNovaCategoria(this)">
      <option value="" disabled @selected(blank($categoriaAtual))>Selecione...</option>
      @foreach ($categorias as $cat)
        <option value="{{ $cat }}" @selected(! $categoriaNova && $categoriaAtual === $cat)>{{ $cat }}</option>
      @endforeach
      <option value="__nova__" @selected($categoriaNova)>+ Nova categoria</option>
    </select>
    <input class="input" type="text" id="categoria-nova" name="{{ $categoriaNova ? 'categoria' : '' }}"
           value="{{ $categoriaNova ? $categoriaAtual : '' }}" placeholder="Nome da nova categoria"
           style="margin-top:8px; display:{{ $categoriaNova ? 'block' : 'none' }};" @required($categoriaNova)>
  </div>
</div>

<div class="field" style="margin-top:var(--space-4);">
  <label for="descricao">Descrição</label>
  <textarea class="input" id="descricao" name="descricao" rows="3">{{ old('descricao', $product->descricao) }}</textarea>
</div>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-4); margin-top:var(--space-4);">
  <div class="field">
    <label for="status">Status *</label>
    <select class="input" id="status" name="status" required>
      @foreach ($statuses as $value => $label)
        <option value="{{ $value }}" @selected(old('status', $product->status?->value) === $value)>{{ $label }}</option>
      @endforeach
    </select>
  </div>

  <div class="field">
    <label for="ordem">Ordem (opcional)</label>
    <input class="input" type="number" id="ordem" name="ordem" value="{{ old('ordem', $product->ordem) }}" min="0">
  </div>
</div>

<div class="field" style="margin-top:var(--space-4);">
  <label for="link">Link da loja (opcional)</label>
  <input class="input" type="url" id="link" name="link" value="{{ old('link', $product->link) }}" placeholder="https://...">
</div>

<div class="field" style="margin-top:var(--space-4);">
  <label for="imagem">Imagem {{ $product->exists ? '(deixe vazio para manter a atual)' : '' }}</label>
  <input class="input" type="file" id="imagem" name="imagem" accept="image/*">
  @if ($product->imagemUrl())
    <img src="{{ $product->imagemUrl() }}" alt="" style="margin-top:12px; width:120px; height:120px; object-fit:cover; border-radius:var(--radius-sm); border:1px solid var(--color-divider);">
  @endif
</div>

<div style="display:flex; gap:12px; margin-top:var(--space-6);">
  <button type="submit" class="btn btn-primary">{{ $product->exists ? 'Salvar alterações' : 'Criar produto' }}</button>
  <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
</div>

<script>
  function toggleNovaCategoria(select) {
    var novaInput = document.getElementById('categoria-nova');
    var isNova = select.value === '__nova__';
    novaInput.style.display = isNova ? 'block' : 'none';
    novaInput.required = isNova;
    novaInput.name = isNova ? 'categoria' : '';
    select.name = isNova ? '' : 'categoria';
    if (isNova) {
      novaInput.focus();
    }
  }
</script>

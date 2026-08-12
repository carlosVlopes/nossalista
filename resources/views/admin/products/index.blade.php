@extends('admin.layout')

@section('title', 'Produtos')

@section('content')
  <div style="display:flex; align-items:flex-end; justify-content:space-between; gap:16px; margin:32px 0 8px;">
    <div>
      <h1 style="margin:0;">Produtos</h1>
      <p class="text-muted" style="margin:6px 0 0;">{{ $products->count() }} produto(s) cadastrado(s)</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Novo produto</a>
  </div>

  <div class="hr"></div>

  @if ($products->isEmpty())
    <p class="text-muted">Nenhum produto ainda. Comece adicionando o primeiro.</p>
  @else
    <p class="text-muted" style="font-size:13px; margin:0 0 12px;">
      Arraste as linhas pela alça <span aria-hidden="true">⠿</span> para definir a ordem em que os presentes aparecem no site.
      <span id="reorder-status" style="margin-left:8px; font-weight:600;"></span>
    </p>
    <table class="table" id="products-table">
      <thead>
        <tr>
          <th style="width:36px;"></th>
          <th>Imagem</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Status</th>
          <th>Link</th>
          <th style="text-align:right;">Ações</th>
        </tr>
      </thead>
      <tbody id="products-rows">
        @foreach ($products as $product)
          <tr data-id="{{ $product->id }}">
            <td class="drag-handle" draggable="true" title="Arraste para reordenar" style="cursor:grab; color:var(--color-neutral-500); font-size:18px; text-align:center; user-select:none;">⠿</td>
            <td>
              @if ($product->imagemUrl())
                <img src="{{ $product->imagemUrl() }}" alt="" class="admin-thumb">
              @else
                <span class="text-muted" style="font-size:12px;">—</span>
              @endif
            </td>
            <td style="font-weight:600;">{{ $product->nome }}</td>
            <td>{{ $product->categoria }}</td>
            <td><span class="status-pill status-{{ $product->status->value }}">{{ $product->status->label() }}</span></td>
            <td>
              @if ($product->link)
                <a href="{{ $product->link }}" target="_blank" rel="noopener">abrir ↗</a>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td class="actions" style="text-align:right; white-space:nowrap;">
              <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-secondary">Editar</a>
              <form method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display:inline; margin:0;" onsubmit="return confirm('Remover este produto?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-ghost" style="color:#8a2b2b;">Excluir</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <style>
      #products-table tr.dragging{ opacity:.4; }
      #products-table tr.drop-target{ background:var(--color-accent-100); }
      #products-table td{ vertical-align:middle; }
    </style>

    <script>
    (function () {
      var tbody = document.getElementById('products-rows');
      var statusEl = document.getElementById('reorder-status');
      var url = "{{ route('admin.products.reorder') }}";
      var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      var dragRow = null;

      function rowFromHandle(handle) { return handle.closest('tr'); }

      function getRowAfter(y) {
        var rows = Array.prototype.slice.call(tbody.querySelectorAll('tr:not(.dragging)'));
        return rows.reduce(function (closest, row) {
          var box = row.getBoundingClientRect();
          var offset = y - box.top - box.height / 2;
          if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: row };
          }
          return closest;
        }, { offset: Number.NEGATIVE_INFINITY, element: null }).element;
      }

      function setStatus(text, color) {
        statusEl.textContent = text;
        statusEl.style.color = color || 'var(--sage-deep, #6f9a4a)';
      }

      function persist() {
        var ids = Array.prototype.map.call(tbody.querySelectorAll('tr'), function (tr) { return tr.dataset.id; });
        setStatus('salvando…', 'var(--color-neutral-600)');
        fetch(url, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
          body: JSON.stringify({ ids: ids }),
        }).then(function (r) {
          if (!r.ok) { throw new Error('erro'); }
          setStatus('✓ ordem salva');
          setTimeout(function () { setStatus(''); }, 2200);
        }).catch(function () {
          setStatus('não foi possível salvar — recarregue a página', '#8a2b2b');
        });
      }

      tbody.addEventListener('dragstart', function (e) {
        var handle = e.target.closest('.drag-handle');
        if (!handle) { e.preventDefault(); return; }
        dragRow = rowFromHandle(handle);
        dragRow.classList.add('dragging');
        e.dataTransfer.effectAllowed = 'move';
      });

      tbody.addEventListener('dragover', function (e) {
        if (!dragRow) { return; }
        e.preventDefault();
        var after = getRowAfter(e.clientY);
        if (after == null) { tbody.appendChild(dragRow); }
        else { tbody.insertBefore(dragRow, after); }
      });

      tbody.addEventListener('dragend', function () {
        if (!dragRow) { return; }
        dragRow.classList.remove('dragging');
        dragRow = null;
        persist();
      });
    })();
    </script>
  @endif
@endsection

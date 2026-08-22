@extends('admin.layout')

@section('title', 'Reservas')

@section('content')
  <div style="margin:32px 0 8px;">
    <h1 style="margin:0;">Reservas</h1>
    <p class="text-muted" style="margin:6px 0 0;">{{ $reservations->count() }} reserva(s)</p>
  </div>

  <div class="hr"></div>

  @if ($reservations->isEmpty())
    <p class="text-muted">Nenhum presente reservado ainda.</p>
  @else
    <table class="table">
      <thead>
        <tr>
          <th>Quem reservou</th>
          <th>Telefone</th>
          <th>Quando</th>
          <th style="text-align:right;">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservations as $reservation)
          <tr>
            <td>{{ $reservation->nome }}</td>
            <td>{{ $reservation->telefone }}</td>
            <td class="text-muted">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
            <td style="text-align:right; white-space:nowrap;">
              <form method="POST" action="{{ route('admin.reservations.destroy', $reservation) }}" style="display:inline; margin:0;" onsubmit="return confirm('Cancelar esta reserva? O presente voltará a ficar disponível.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-ghost" style="color:#8a2b2b;">Cancelar reserva</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
@endsection

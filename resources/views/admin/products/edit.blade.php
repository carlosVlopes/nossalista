@extends('admin.layout')

@section('title', 'Editar produto')

@section('content')
  <h1 style="margin:32px 0 4px;">Editar produto</h1>
  <div class="hr"></div>

  <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" style="max-width:720px;">
    @method('PUT')
    @include('admin.products._form')
  </form>
@endsection

@extends('admin.layout')

@section('title', 'Novo produto')

@section('content')
  <h1 style="margin:32px 0 4px;">Novo produto</h1>
  <div class="hr"></div>

  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" style="max-width:720px;">
    @include('admin.products._form')
  </form>
@endsection

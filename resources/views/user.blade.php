@extends('layouts.default')

@section('titlePage', 'Título personalizado')

@section('title')

@section('content')
  <p>Nome do usuário {{ $nome }} e seu e-mail: {{ $email }}</p>
@endsection

@extends('layouts.fo')

@section('content')

    <h1>BackOffice</h1>

    <h5>Olá, {{ Auth::user()->name }}</h5>

    @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        <div class="alert alert-success" role="alert">
            Conta de Administrador
        </div>
    @endif

@endsection

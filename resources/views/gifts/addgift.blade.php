@extends('layouts.fo')

@section('title', 'Adicionar prenda')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h1>Adicionar prenda</h1>

    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome da prenda</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Valor previsto (€)</label>
            <input type="number" step="0.01" name="expected_value" class="form-control" value="{{ old('expected_value') }}">
            @error('expected_value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Valor gasto (€) - opcional</label>
            <input type="number" step="0.01" name="spent_value" class="form-control" value="{{ old('spent_value') }}">
            @error('spent_value')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Pessoa</label>
            <select name="user_id" class="form-select">
                <option value="">-- Escolhe um utilizador --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('gifts.all') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection

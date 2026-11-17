@extends('layouts.fo')

@section('title', 'Prendas de Natal')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <h1>Prendas de Natal</h1>

    <a href="{{ route('gifts.add') }}" class="btn btn-success mb-3">Adicionar prenda</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Prenda</th>
                <th>Pessoa</th>
                <th>Valor previsto</th>
                <th>Valor gasto</th>
                <th>Diferença</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <td>{{ $gift->name }}</td>
                    <td>{{ $gift->user_name }}</td>
                    {{-- $gift..Vai buscar o valor previsto da prenda à base de dados. --}}
                    <td>{{ number_format($gift->expected_value, 2, ',', '.') }} €</td>
                    <td>
                        {{ $gift->spent_value !== null ? number_format($gift->spent_value, 2, ',', '.') . ' €' : '-' }}
                    </td>
                    <td>
                        @if ($gift->spent_value !== null)
                            @php $diff = $gift->spent_value - $gift->expected_value; @endphp
                            <span class="{{ $diff > 0 ? 'text-danger' : ($diff < 0 ? 'text-success' : '') }}">
                                {{ $diff > 0 ? '+' : '' }}{{ number_format($diff, 2, ',', '.') }} €
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td><a href="{{ route('gifts.delete', $gift->id) }}" class="btn btn-danger">Apagar</a></td>
                    <td><a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-info">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

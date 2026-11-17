@extends('layouts.fo')

@section('title', 'Tarefas')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h1>Todas as tarefas</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Estado</th>
                <th>Data de conclusão</th>
                <th>Pessoa responsável</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status ? 'Concluída' : 'Pendente' }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->user_name ?? 'Sem responsável' }}</td>
                    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                    <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Ver / Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

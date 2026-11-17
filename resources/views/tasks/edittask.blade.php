@extends('layouts.fo')

@section('content')
    <h6>Detalhes da tarefa {{ $taskInfo->name }}</h6>
    <p>{{ $taskInfo->description }}</p>
    <p>{{ $taskInfo->due_at }}</p>
    <p>{{ $taskInfo->status ? 'Concluída' : 'Pendente' }}</p>
@endsection

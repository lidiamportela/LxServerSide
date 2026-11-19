@extends('layouts.fo')

@section('content')

    <img src="{{asset('images/adorable-pitbull-dogs-looking-up_freepik.jpg')}}" alt="">

    {{-- @if (isset($courseName))
        <h5>Olá {{ $courseName }}</h5>
    @else
        <h5>Olá user</h5>
    @endif --}}

    <h5>Olá {{ isset($courseName)? $courseName : 'user' }}</h5>
    <h6>O contacto é o {{$contactInfo['name']}} - {{$contactInfo['contact']}}</h6>
    <h5>{{$cesaeInfo['name']}},{{$cesaeInfo['address']}} -> {{$cesaeInfo['email']}}  </h5>

    @auth
        <h6>Olá {{Auth::user()->name}}</h6>
    @endauth


    <h5>Alunos da turma</h5>
    <ul>
        @if( isset($students))
            @foreach ($students as $student)
            <li>{{ $student }}</li>
            @endforeach
        @endif
    </ul>

    <h5>Funcionalidades da nossa app</h5>
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('users.all') }}">Utilizadores</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar Utilizadores</a></li>
        <li><a href="{{ route('tasks.all') }}">Todas as tarefas</a></li>
        <li><a href="{{ route('gifts.all') }}">Prendas de Natal</a></li>

    </ul>

@endsection

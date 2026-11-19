@extends('layouts.fo')

@section('content')

    <h1>Aqui vamos carregar todos os utilizadores</h1>

    <h6>Users sem estarem carregados da base de dados</h6>
    <ul>
        @foreach ($usersWDB as $user)
        <li>{{$user['name']}}-->{{$user['email']}}</li>
        @endforeach
    </ul>


    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="">
        <input type="text" name="search">
        <button class="btn btn-secondary" type="submit">Procurar</button>
    </form>

    <h6>Utilizador da base de dados</h6>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">NIF</th>
                @auth
                <th></th>
                <th></th>
                @endauth
            </tr>

        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <td><img  class="photo-table"
                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/nophoto.jpg') }}"
                            alt=""> </td> <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->nif}}</td>

                    @if (Auth::user() && Auth::user()->email =='admin@gmail.com')
                    <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                    @endif


                    @auth
                    <td><a href="{{route('users.edit', $user->id) }}" class="btn btn-info">Ver /  Editar</a></td>
                    @endauth

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

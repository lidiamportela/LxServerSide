@extends('layouts.fo')

@section('content')
    <h6>Detalhes do user {{ $userInfo->name }}</h6>


        <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{$userInfo->id}}">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{$userInfo->name}}" required type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled type="email" value="{{$userInfo->email}}" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>email inválido</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $userInfo->address }}" type="text" name="address" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $userInfo->nif }}" type="text" name="nif" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
            <div class="mb-3">
            <label for="">Foto</label>
            <input type="file" name="photo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

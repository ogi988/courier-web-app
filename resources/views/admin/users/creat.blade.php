@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodaj korisnika {{ $user->name }}</div>

                    <div class="card-body">
                        <form class="form-group" action="{{ route('admin.users.update',['user' => $user->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-check">
                                @foreach($roles as $role)
                                    <input class="form-check-input" id="check" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                            {{ $user->hasAnyRole($role->name)?'checked':''}}>
                                    <label for="check" class="form-check-label">{{ $role->name }}</label><br>
                                @endforeach
                            </div>

                            <label for="name">Ime</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">

                            <label for="surname">Prezime</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ $user->surname }}">

                            <label for="city">Grad</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ $user->city }}">

                            <label for="number">Telefon</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ $user->number }}">

                            <label for="address">Adresa</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ $user->address }}">

                            <label for="email">E-mail</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

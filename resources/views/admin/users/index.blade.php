@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Korisnici</div>

                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grad</th>
                                <th scope="col">Adressa</th>
                                <th scope="col">Broj telefona</th>
                                <th scope="col">Tip</th>
                                <th scope="col">Akcije  </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->surname }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->city }}</th>
                                    <th>{{ $user->address }}</th>
                                    <th>{{ $user->number }}</th>
                                    <th>{{ implode(', ',$user->roles()->pluck('name')->toArray()) }}</th>
                                    <th>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left" >
                                            <button type="button" class="btn btn-primary btn-sm">&nbspEdit&nbsp</button>
                                        </a>
                                        <form action="{{ route('admin.users.destroy',$user->id) }}" method="post" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

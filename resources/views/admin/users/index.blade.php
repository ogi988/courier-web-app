@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h3>Dodaj korisnika</h3>
                <a href="{{ route('admin.users.create') }}"  >
                    <button type="button" class="btn btn-success btn-md">Add</button>
                </a>
                <div class="card" style="margin:16px 0px 24px 0px">

                    <div class="card-header">Korisnici</div>

                    <div class="card-body-lg">
                        <table class="table table-responsive table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grad</th>
                                <th scope="col">Adressa</th>
                                <th scope="col">Broj telefona</th>
                                <th scope="col">Tip</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

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
                                        <a href="{{ route('admin.users.edit', $user->id) }}"  >
                                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                        </a>

                                    </th>
                                    <th>
                                        <form action="{{ route('admin.users.destroy',$user->id) }}" method="post" >
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

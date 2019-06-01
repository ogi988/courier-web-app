@extends('layouts.app')



@section('content')



  <div class="row">

    <!-- <div class="col-md-10 offset-md-2"> -->
    <div class="col-md-12 ">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Tabela Usera</h4>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
              <tr><th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Grad</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Tip</th>
                <th>Izmeni</th>
                <th>Obrisi</th>
              </tr></thead>
              <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->surname }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{ $user->city }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->number }}</td>
                  <td class="text-primary">
                    {{ implode(', ',$user->roles()->pluck('name')->toArray()) }}
                  </td>
                  <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}"  >
                      <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    </a>
                  </td>
                  <td>
                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="post" >
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
      </p>
      <a href="{{ route('admin.users.create') }}"  >
        <button type="button" class="btn btn-primary btn-round">Dodaj</button>
      </a>


@endsection
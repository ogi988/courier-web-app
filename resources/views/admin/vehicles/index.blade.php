@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <h3>Dodaj vozilo</h3>
                <a href="{{ route('admin.vehicles.create') }}"  >
                    <button type="button" class="btn btn-success btn-md">Dodaj</button>
                </a>
                <div class="card-header">Vozila</div>

                    <div class="card-body-lg">
                        <table class="table table-responsive table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Trenutni korisnik</th>
                                <th scope="col">Marka</th>
                                <th scope="col">Tip</th>                                
                                <th scope="col">Nosivost</th>
                                <th scope="col">Obrisi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>{{ $vehicle->user_id }}</td>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->type }}</td>
                                    <td>{{ $vehicle->transport_capacity }}</td>
                                    <td>
                                        <form action="{{ route('admin.vehicles.destroy',$vehicle->id) }}" method="post" >
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
        </div>
    </div>
@endsection


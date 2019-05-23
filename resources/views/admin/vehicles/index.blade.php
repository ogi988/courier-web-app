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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <th>{{ $vehicle->id }}</th>
                                    <th>{{ $vehicle->user_id }}</th>
                                    <th>{{ $vehicle->brand }}</th>
                                    <th>{{ $vehicle->type }}</th>
                                    <th>{{ $vehicle->transport_capacity }}</th>
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


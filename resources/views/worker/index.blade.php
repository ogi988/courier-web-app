
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vase posiljke</div>

                    <div class="card-body-lg">
                    <table class="table table-responsive table-striped ">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Broj posiljke</th>
                        <th scope="col">Status posiljke</th>
                        <th scope="col">Metoda placanja</th>
                        <th scope="col">Masa</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Ko placa</th>
                        <th scope="col">Ime primaoca</th>
                        <th scope="col">Prezime primaoca</th>
                        <th scope="col">Adresa primaoca</th>
                        <th scope="col">Email primaoca</th>
                        <th scope="col">Grad primaoca</th>
                        <th scope="col">Broj primaoca</th>
                        <th scope="col">Cena posiljke</th>
                        <th scope="col">Cena transporta</th>
                        <th scope="col">Tip</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($shipments as $shipment)
                            <tr>
                                

                                <th>{{ $shipment->id}}</th>
                                <th>{{ $shipment->shipment_number }}</th>
                                <th>{{ $shipment->status }}</th>
                                <th>{{ $shipment->method_payment }}</th>
                                <th>{{ $shipment->mass }}</th>
                                <th>{{ $shipment->category }}</th>
                                <th>{{ $shipment->who_pay }}</th>
                                <th>{{ $shipment->name }}</th>
                                <th>{{ $shipment->surname }}</th>
                                <th>{{ $shipment->address }}</th>
                                <th>{{ $shipment->email }}</th>
                                <th>{{ $shipment->city }}</th>
                                <th>{{ $shipment->number }}</th>
                                <th>{{ $shipment->shipment_price }}</th>
                                <th>{{ $shipment->transport_price }}</th>
                                <th>{{ $shipment->type }}</th>


                                <th>
                                <form method='POST' action = "{{route('worker.shipments.zaduzi')}}">
                                    @csrf
                                    <input type="text" name="idid" value="{{ $shipment->id }}" hidden>
                                    <button type="submit" class="btn btn-primary btn-sm">Zaaaduzi!</button>
                                    

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

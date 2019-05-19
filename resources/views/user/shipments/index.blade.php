@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h3>Pozovi kurira na adresu</h3>
                <a href="{{ route('user.shipments.create') }}"  >
                    <button type="button" class="btn btn-success btn-md">Pozovi</button>
                </a>
                <div class="card" style="margin:16px 0px 24px 0px">

                    <div class="card-header">Posiljke</div>
                    <table class="table table-responsive table-striped ">
                        <thead>
                        <tr>
                            <th scope="col">Broj posiljke</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nacin placanja</th>
                            <th scope="col">Masa</th>
                            <th scope="col">Kategorija</th>
                            <th scope="col">Ko placa</th>
                            <th scope="col">Ime primalaca</th>
                            <th scope="col">Prezime </th>
                            <th scope="col">Adresa</th>
                            <th scope="col">Email</th>
                            <th scope="col">Grad</th>
                            <th scope="col">Broj telefona</th>
                            <th scope="col">Cena posiljke</th>
                            <th scope="col">Cena usluge</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shipments as $shipment)
                            <tr>
                                <th scope="col">{{ $shipment->shipment_number }}</th>
                                <th scope="col">{{ $shipment->status }}</th>
                                <th scope="col">{{ $shipment->method_payment }}</th>
                                <th scope="col">{{ $shipment->mass }}</th>
                                <th scope="col">{{ $shipment->category }}</th>
                                <th scope="col">{{ $shipment->who_pay }}</th>
                                <th scope="col">{{ $shipment->name }}</th>
                                <th scope="col">{{ $shipment->surname }}</th>
                                <th scope="col">{{ $shipment->address }}</th>
                                <th scope="col">{{ $shipment->email }}</th>
                                <th scope="col">{{ $shipment->city }}</th>
                                <th scope="col">{{ $shipment->number }}</th>
                                <th scope="col">{{ $shipment->shipment_price }}</th>
                                <th scope="col">{{ $shipment->transport_price }}</th>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="card-body-lg">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

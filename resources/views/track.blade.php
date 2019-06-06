@extends('layouts.app')

@section('content')
<body class = "home-background">
        <div class="row">
            <div class="col-md-12 offset-lg-1 offset-sm-0">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Trenutno stanje</h4></div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                        <thead class="text-primary">
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
                        @foreach($shipmentstemp as $shipment)
                            <tr>
                                <td scope="col">{{ $shipment->shipment_number }}</td>
                                <td scope="col">{{ $shipment->status }}</td>
                                <td scope="col">{{ $shipment->method_payment }}</td>
                                <td scope="col">{{ $shipment->mass }}</td>
                                <td scope="col">{{ $shipment->category }}</td>
                                <td scope="col">{{ $shipment->who_pay }}</td>
                                <td scope="col">{{ $shipment->name }}</td>
                                <td scope="col">{{ $shipment->surname }}</td>
                                <td scope="col">{{ $shipment->address }}</td>
                                <td scope="col">{{ $shipment->email }}</td>
                                <td scope="col">{{ $shipment->city }}</td>
                                <td scope="col">{{ $shipment->number }}</td>
                                <td scope="col">{{ $shipment->shipment_price }}</td>
                                <td scope="col">{{ $shipment->transport_price }}</td>
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
        <div class="row">
            <div class="col-md-4 offset-lg-1 offset-sm-0">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Istorija</h4></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th scope="col">Broj posiljke</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Vreme</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shipments as $shipment)
                                    <tr>
                                        <td scope="col">{{ $shipment->shipment_number }}</td>
                                        <td scope="col">{{ $shipment->status }}</td>
                                        <td scope="col">{{ $shipment->created_at }}</td>




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
        </body>

@endsection
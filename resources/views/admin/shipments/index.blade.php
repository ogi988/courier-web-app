@extends('layouts.app')

@section('content')

    <div class="row">
            <div class="col-md-12 t-padding">

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Isporucene posiljke</h4></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table crna-slova">
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
                                @foreach($shipments as $shipment)
                                    <tr>
                                        <td scope="col">{{ $shipment->shipment_number }}</td>
                                        <td scope="col">
                                            @switch($shipment->status)
                                                @case(0)
                                                <span class="text-danger">Nije pokuljen</span>
                                                @break

                                                @case(1)
                                                <span class="text-info"> U magacinu</span>
                                                @break

                                                @case(2)
                                                <span class="text-warning">Prevoz na adresu</span>
                                                @break

                                                @case(3)
                                                <span class="text-success">Isporuceno</span>
                                                @break

                                                @case(5)
                                                Odbijen
                                                @break

                                                @default
                                                <span>Nije poznato stanje paketa</span>
                                            @endswitch
                                        </td>
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
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Nove posiljke</h4></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table crna-slova">
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
                                @foreach($new_shipments as $new_shipment)
                                    <tr>
                                        <td scope="col">{{ $new_shipment->shipment_number }}</td>
                                        <td scope="col">
                                            @switch($new_shipment->status)
                                                @case(0)
                                                <span class="text-danger">Nije pokuljen</span>
                                                @break

                                                @case(1)
                                                <span class="text-info"> U magacinu</span>
                                                @break

                                                @case(2)
                                                <span class="text-warning">Prevoz na adresu</span>
                                                @break

                                                @case(3)
                                                <span class="text-success">Isporuceno</span>
                                                @break

                                                @case(5)
                                                Odbijen
                                                @break

                                                @default
                                                <span>Nije poznato stanje paketa</span>
                                            @endswitch
                                        </td>
                                        <td scope="col">{{ $new_shipment->method_payment }}</td>
                                        <td scope="col">{{ $new_shipment->mass }}</td>
                                        <td scope="col">{{ $new_shipment->category }}</td>
                                        <td scope="col">{{ $new_shipment->who_pay }}</td>
                                        <td scope="col">{{ $new_shipment->name }}</td>
                                        <td scope="col">{{ $new_shipment->surname }}</td>
                                        <td scope="col">{{ $new_shipment->address }}</td>
                                        <td scope="col">{{ $new_shipment->email }}</td>
                                        <td scope="col">{{ $new_shipment->city }}</td>
                                        <td scope="col">{{ $new_shipment->number }}</td>
                                        <td scope="col">{{ $new_shipment->shipment_price }}</td>
                                        <td scope="col">{{ $new_shipment->transport_price }}</td>
                                        <td>
                                            <a href="{{ route('admin.shipments.edit', $new_shipment->id) }}"  >
                                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                            </a>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



    </div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">                    
                    <h4 class="card-title ">Posiljke za transfer do magacina</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                    <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th>id</th>
                        <th>Broj posiljke</th>
                        <th>Status posiljke</th>
                        <th>Metoda placanja</th>
                        <th>Masa</th>
                        <th>Kategorija</th>
                        <th>Ko placa</th>
                        <th>Ime primaoca</th>
                        <th>Prezime primaoca</th>
                        <th>Adresa primaoca</th>
                        <th>Email primaoca</th>
                        <th>Grad primaoca</th>
                        <th>Broj primaoca</th>
                        <th>Cena posiljke</th>
                        <th>Cena transporta</th>
                        <th>Tip</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($shipments as $shipment)
                            <tr>
                                

                                <td>{{ $shipment->id}}</td>
                                <td>{{ $shipment->shipment_number }}</td>
                                <td>{{ $shipment->status }}</td>
                                <td>{{ $shipment->method_payment }}</td>
                                <td>{{ $shipment->mass }}</td>
                                <td>{{ $shipment->category }}</td>
                                <td>{{ $shipment->who_pay }}</td>
                                <td>{{ $shipment->name }}</td>
                                <td>{{ $shipment->surname }}</td>
                                <td>{{ $shipment->address }}</td>
                                <td>{{ $shipment->email }}</td>
                                <td>{{ $shipment->city }}</td>
                                <td>{{ $shipment->number }}</td>
                                <td>{{ $shipment->shipment_price }}</td>
                                <td>{{ $shipment->transport_price }}</td>
                                <td>{{ $shipment->type }}</td>


                                <td>
                                <form method='POST' action = "{{route('worker.shipments.zaduzi')}}">
                                    @csrf
                                    <input type="text" name="idid" value="{{ $shipment->id }}" hidden>
                                    <input type="text" name="shipment_number" value="{{ $shipment->shipment_number }}" hidden>
                                    <button type="submit" class="btn btn-primary btn-sm">Pokupi!</button>
                                    

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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Vase posiljke</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                    <table class="table ">
                    <thead class=" text-primary">
                    <tr>
                        <th>id</th>
                        <th>Broj posiljke</th>
                        <th>Status posiljke</th>
                        <th>Metoda placanja</th>
                        <th>Masa</th>
                        <th>Kategorija</th>
                        <th>Ko placa</th>
                        <th>Ime primaoca</th>
                        <th>Prezime primaoca</th>
                        <th>Adresa primaoca</th>
                        <th>Email primaoca</th>
                        <th>Grad primaoca</th>
                        <th>Broj primaoca</th>
                        <th>Cena posiljke</th>
                        <th>Cena transporta</th>
                        <th>Tip</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($mojeposiljke as $posiljka)
                                <tr>
                                    

                                    <th>{{ $posiljka->id}}</th>
                                    <th>{{ $posiljka->shipment_number }}</th>
                                    <th>{{ $posiljka->status }}</th>
                                    <th>{{ $posiljka->method_payment }}</th>
                                    <th>{{ $posiljka->mass }}</th>
                                    <th>{{ $posiljka->category }}</th>
                                    <th>{{ $posiljka->who_pay }}</th>
                                    <th>{{ $posiljka->name }}</th>
                                    <th>{{ $posiljka->surname }}</th>
                                    <th>{{ $posiljka->address }}</th>
                                    <th>{{ $posiljka->email }}</th>
                                    <th>{{ $posiljka->city }}</th>
                                    <th>{{ $posiljka->number }}</th>
                                    <th>{{ $posiljka->shipment_price }}</th>
                                    <th>{{ $posiljka->transport_price }}</th>
                                    <th>{{ $posiljka->type }}</th>
                                    <th><?php echo DNS1D::getBarcodeHTML('2222', "EAN13"); ?></th>
                                    
                                </tr>
                            @endforeach
                        
                        </tbody>
                        </table>
                        </div>

                </div>
                <a href="{{route('worker.barcode')}}">
                <button type="button" class="btn btn-primary" id="start" >
                    <i class="material-icons">receipt</i>
                    Skeniraj barkod
                </button>
                </a>
            </div>
        </div>
    </div>
@endsection

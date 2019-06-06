
@extends('layouts.app')

@section('content')
    <div class="row t-padding">
    @if (session('message'))
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    </div>
    @endif
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
                                    <?php echo DNS1D::getBarcodeHTML($shipment->shipment_number, "EAN13"); ?>
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
                        <h4 class="card-title ">Posiljke u magacinu</h4>
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
                        
                            @foreach($posiljkeUMagacinu as $posiljkaUMagacinu)
                                <tr>
                                    

                                    <th>{{ $posiljkaUMagacinu->id}}</th>
                                    <th>{{ $posiljkaUMagacinu->shipment_number }}</th>
                                    <th>{{ $posiljkaUMagacinu->status }}</th>
                                    <th>{{ $posiljkaUMagacinu->method_payment }}</th>
                                    <th>{{ $posiljkaUMagacinu->mass }}</th>
                                    <th>{{ $posiljkaUMagacinu->category }}</th>
                                    <th>{{ $posiljkaUMagacinu->who_pay }}</th>
                                    <th>{{ $posiljkaUMagacinu->name }}</th>
                                    <th>{{ $posiljkaUMagacinu->surname }}</th>
                                    <th>{{ $posiljkaUMagacinu->address }}</th>
                                    <th>{{ $posiljkaUMagacinu->email }}</th>
                                    <th>{{ $posiljkaUMagacinu->city }}</th>
                                    <th>{{ $posiljkaUMagacinu->number }}</th>
                                    <th>{{ $posiljkaUMagacinu->shipment_price }}</th>
                                    <th>{{ $posiljkaUMagacinu->transport_price }}</th>
                                    <th>{{ $posiljkaUMagacinu->type }}</th>
                                    <th>
                                    <?php echo DNS1D::getBarcodeHTML($posiljkaUMagacinu->shipment_number, "EAN13"); ?>

                                        <form method='POST' action = "{{route('worker.shipments.magacin')}}">

                                            @csrf
                                            <input type="text" name="idmagacin" value="{{ $posiljkaUMagacinu->id }}" hidden>
                                            <input type="text" name="shipment_number_magacin" value="{{ $posiljkaUMagacinu->shipment_number }}" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm">Pokupi iz magacina!</button>                                            

                                        </form>

                                    </th>
                                    
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Moje posiljke</h4>
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
                        
                            @foreach($mojeposiljke as $mojaposiljka)
                            @if ($mojaposiljka->status == 2)
                                <tr>
                                    

                                    <th>{{ $mojaposiljka->id}}</th>
                                    <th>{{ $mojaposiljka->shipment_number }}</th>
                                    <th>{{ $mojaposiljka->status }}</th>
                                    <th>{{ $mojaposiljka->method_payment }}</th>
                                    <th>{{ $mojaposiljka->mass }}</th>
                                    <th>{{ $mojaposiljka->category }}</th>
                                    <th>{{ $mojaposiljka->who_pay }}</th>
                                    <th>{{ $mojaposiljka->name }}</th>
                                    <th>{{ $mojaposiljka->surname }}</th>
                                    <th>{{ $mojaposiljka->address }}</th>
                                    <th>{{ $mojaposiljka->email }}</th>
                                    <th>{{ $mojaposiljka->city }}</th>
                                    <th>{{ $mojaposiljka->number }}</th>
                                    <th>{{ $mojaposiljka->shipment_price }}</th>
                                    <th>{{ $mojaposiljka->transport_price }}</th>
                                    <th>{{ $mojaposiljka->type }}</th>
                                    <th style="display:inline">

                                        <form method='POST' action = "{{route('worker.shipments.krajnje')}}">

                                            @csrf
                                            <input type="text" name="idmoja" value="{{ $mojaposiljka->id }}" hidden>
                                            <input type="text" name="shipment_number_moja" value="{{ $mojaposiljka->shipment_number }}" hidden>
                                            <button type="submit" name = "isporuceno" class="btn btn-success btn-sm">Isporuceno!</button>                                            
                                            <button type="submit" name = "odbijeno" class="btn btn-danger btn-sm">Odbijeno!</button>                                            

                                        </form>

                                    </th>
                                    
                                </tr>
                            @endif
                            @endforeach
                        
                        </tbody>
                        </table>
                        </div>

                </div>

            </div>
        </div>
        <a href="{{route('worker.barcode')}}">
            <button type="button" class="btn btn-primary" id="start" >
                <i class="material-icons">receipt</i>
                Skeniraj barkod
            </button>
        </a>
    </div>

@endsection

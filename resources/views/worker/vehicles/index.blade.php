@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                
                @if(!isset($poruka))
                
                <div class="card-header">Vozila</div>

                    <div class="card-body-lg">
                        <table class="table table-responsive table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">Marka</th>
                                <th scope="col">Tip</th>                                
                                <th scope="col">Nosivost</th>                                
                                <th scope="col">Zaduzenje</th>                                

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <th>{{ $vehicle->brand }}</th>
                                    <th>{{ $vehicle->type }}</th>
                                    <th>{{ $vehicle->transport_capacity }}</th>
                                    <th>
                                        <form action="{{ route('worker.vehicles.update',$vehicle->id) }}" method="post" >
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <button type="submit" class="btn btn-danger btn-sm">Zaduzi</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        @if(isset($poruka))
                        <div class="card-header">Zaduzeno vozilo</div>

                        <table class="table table-responsive table-striped ">
                            <thead>
                            <tr>
                                <th scope="col">Marka</th>
                                <th scope="col">Tip</th>                                
                                <th scope="col">Nosivost</th>                                

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_vehicle as $v)
                                <tr>
                                    <th>{{ $v->brand }}</th>
                                    <th>{{ $v->type }}</th>
                                    <th>{{ $v->transport_capacity }}</th>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                        
                        </div>
                        @endif
                        
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection


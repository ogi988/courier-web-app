@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-lg-1 offset-sm-0">
                @if(!isset($poruka))
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Vozila</h4>
                </div>
                
                

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class = "table">
                                <thead class=" text-primary">
                                    <tr>
                                        <td>Marka</td>
                                        <td>Tip</td>                                
                                        <td>Nosivost</td>                                
                                        <td>Zaduzenje</td>                                

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->type }}</td>
                                    <td>{{ $vehicle->transport_capacity }}</td>
                                    <td>
                                        <form action="{{ route('worker.vehicles.update',$vehicle->id) }}" method="post" >
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <button type="submit" class="btn btn-danger btn-sm">Zaduzi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        @endif

                        @if(isset($poruka))
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Zaduzeno vozilo</h4>
                            </div>

                        <div class="card-body">
                        <div class="table-responsive">
                            <table class = "table">
                                <thead class=" text-primary">
                                    <tr>
                                        <td>Marka</td>
                                        <td>Tip</td>                                
                                        <td>Nosivost</td>                                
                                        <td>Zaduzenje</td>                                

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($my_vehicle as $v)
                                <tr>
                                    <td>{{ $v->brand }}</td>
                                    <td>{{ $v->type }}</td>
                                    <td>{{ $v->transport_capacity }}</td>
                                    <td>
                                        <form method='POST' action = "{{route('worker.vehicles.razduzi')}}">
                                            @csrf
                                            <input type="text" name="idid" value="{{ $v->id }}" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm">Razduzi</button>                                          

                                        </form>
                                     </td>
                                    
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


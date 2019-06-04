@extends('layouts.app')

@section('content')
    


    <div class="row">

<!-- <div class="col-md-10 offset-md-2"> -->
<div class="col-md-12 t-padding ">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Vozila</h4>


    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
          
          <tr>
            <th>ID</th>
            <th>Trenutni korisnik</th>
            <th>Marka</th>
            <th>Tip</th>
            <th>Nosivost</th>
            <th>Obrisi</th>            
          </tr></thead>
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
        <h3 class = "crna-slova">Dodaj novo vozilo</h3>
        <a href="{{ route('admin.vehicles.create') }}"  >
            <button type="button" class="btn btn-primary btn-round">Dodaj</button>
        </a>
</div>
@endsection


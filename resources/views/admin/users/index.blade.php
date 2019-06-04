@extends('layouts.app')



@section('content')
<div class="row">

    <!-- <div class="col-md-10 offset-md-2"> -->
    <div class="col-md-12 t-padding">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Tabela Usera</h4>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
              <tr><th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Grad</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Tip</th>
                <th>Izmeni</th>
                <th>Obrisi</th>
              </tr></thead>
              <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->surname }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{ $user->city }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->number }}</td>
                  <td class="text-primary">
                    {{ implode(', ',$user->roles()->pluck('name')->toArray()) }}
                  </td>
                  <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}"  >
                      <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    </a>
                  </td>
                  <td>
                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="post" >
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
      <a href="{{ route('admin.users.create') }}"  >
        <button type="button" class="btn btn-primary btn-round">Dodaj novog usera</button>
      </a>
    </div>

@if($mesecSettings === 1){
  <div class="col-md-12 t-padding ">
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
  </div>
}
@endif
@if($godinaSettings === 1){
  <div class="col-md-12 t-padding">

  <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
  </div>

}
@endif

<script type="text/javascript">
window.onload = function () {
    var dani = {!! json_encode($dani) !!};
    var broj_posiljaka = {!! json_encode($broj_posiljaka) !!};

    var meseci = {!! json_encode($meseci) !!};
    var broj_posiljaka_mesec = {!! json_encode($broj_posiljaka_mesec) !!};

    var i;

    dpx = [];
    dpy = [];
      for(var i = 0 ; i<dani.length; i++){
          dpx.push(broj_posiljaka[i]);
          dpy.push(dani[i]);
          };   
          
    
          console.log(dpx);
          console.log(dpy);
    var chart = new CanvasJS.Chart("chartContainer",
    {
      animationEnabled: true,
      
      theme: "dark2",
      title:{
        text: "Posiljke zadnjih mesec dana"
    },
    axisX:{
        
        title: "Datum",
        intervalType: "day",
        interval:1
    },
    axisY: {
        
        interval: 20,
        title: "Broj novih posiljaka"
    },
        
    data: [
    {        
        type: "area",
        dataPoints: [//array
        { x: new Date(dpy[0]), y: dpx[0]},
        { x: new Date( dpy[1]), y: dpx[1]},
        { x: new Date( dpy[2]), y: dpx[2]},
        { x: new Date( dpy[3]), y: dpx[3]},
        { x: new Date( dpy[4]), y: dpx[4]},
        { x: new Date( dpy[5]), y: dpx[5]},
        { x: new Date( dpy[6]), y: dpx[6]},
        { x: new Date( dpy[7]), y: dpx[7]},
        { x: new Date( dpy[8]), y: dpx[8]},
        { x: new Date( dpy[9]), y: dpx[9]},
        { x: new Date(dpy[10]), y: dpx[10]},
        { x: new Date(dpy[11]), y: dpx[11]},
        { x: new Date(dpy[12]), y: dpx[12]},
        { x: new Date(dpy[13]), y: dpx[13]},
        { x: new Date(dpy[14]), y: dpx[14]},
        { x: new Date(dpy[15]), y: dpx[15]},
        { x: new Date(dpy[16]), y: dpx[16]},
        { x: new Date(dpy[17]), y: dpx[17]},
        { x: new Date(dpy[18]), y: dpx[18]},
        { x: new Date(dpy[19]), y: dpx[19]},
        { x: new Date(dpy[20]), y: dpx[20]},
        { x: new Date(dpy[21]), y: dpx[21]},
        { x: new Date(dpy[22]), y: dpx[22]},
        { x: new Date(dpy[23]), y: dpx[23]},
        { x: new Date(dpy[24]), y: dpx[24]},
        { x: new Date(dpy[25]), y: dpx[25]},
        { x: new Date(dpy[26]), y: dpx[26]},
        { x: new Date(dpy[27]), y: dpx[27]},
        { x: new Date(dpy[28]), y: dpx[28]},
        { x: new Date(dpy[29]), y: dpx[29]},
        { x: new Date(dpy[30]), y: dpx[30]},
        { x: new Date(dpy[31]), y: dpx[31]}

        ]
    }
    ]
    
});
    var chart2 = new CanvasJS.Chart("chartContainer2",
    {
      theme: "dark2",
      animationEnabled: true,
      title:{
        text: "Posiljke u ovoj godini"
    },
    axisX:{
        title: "Datum",
        intervalType: "month",
        interval:1
    },
    axisY: {
        interval: 20,
        title: "Broj novih posiljaka"
    },
        
    data: [
    {        
        type: "area",
        dataPoints: [//array
        { x: new Date(meseci[0]), y: broj_posiljaka_mesec[0]},
        { x: new Date(meseci[1]), y: broj_posiljaka_mesec[1]},
        { x: new Date(meseci[2]), y: broj_posiljaka_mesec[2]},
        { x: new Date(meseci[3]), y: broj_posiljaka_mesec[3]},
        { x: new Date(meseci[4]), y: broj_posiljaka_mesec[4]},
        { x: new Date(meseci[5]), y: broj_posiljaka_mesec[5]},
        { x: new Date(meseci[6]), y: broj_posiljaka_mesec[6]},
        { x: new Date(meseci[7]), y: broj_posiljaka_mesec[7]},
        { x: new Date(meseci[8]), y: broj_posiljaka_mesec[8]},
        { x: new Date(meseci[9]), y: broj_posiljaka_mesec[9]},
        { x: new Date(meseci[10]), y: broj_posiljaka_mesec[10]},
        { x: new Date(meseci[11]), y: broj_posiljaka_mesec[11]},   
        

        ]
    }
    ]
    
});

    chart.render();
    chart2.render();
}
</script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection

    
            


  



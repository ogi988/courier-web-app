@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div class="row">          
    <div class="col-md-12 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="boxes__wrapper">
                    <div class="boxes">
                        <div class="boxes__heading_wrapper">
                            <div class="boxes__heading">
                                <div class="heading">
                                <span>Podesavanja za tabele</span>
                                </div>
                            </div>
                        </div>
                        <form action = "{{route('admin.postavke.update',['postavke' => 1])}}" method = "POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="checkbox" id="mesec" name="mesec" value="1"
                                    @if($adminsettings->prikaziMesece == 1){{ 'checked'}}@endif
                            >
                            <label for="mesec">Prikazi tabelu porucenih posiljaka za ovaj mesec</label>

                            <input type="checkbox" id="godina" name="godina" value="1"
                            @if($adminsettings->prikaziGodine == 1){{ 'checked'}}@endif>
                            <label for="godina">Prikazi tabelu porucenih posiljaka za ovu godinu </label>

                            <button type="submit" class="btn btn-primary btn-sm">Sacuvaj</button>
                        </form>                        
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>
    

        

@endsection
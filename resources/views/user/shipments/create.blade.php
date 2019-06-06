@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.shipments.store') }}">
                            @csrf
                            <h4>Podaci o primaocu</h4>
                            <div>
                                <p>Vrsta primalaca</p>
                            </div>
                            <div class="form-check align-content-center">

                                <input class="form-check-input" id="1" type="radio" name="type" value="Fizicko lice">
                                <label for="1" class="form-check-label">Fizicko lice</label><br>

                                <input class="form-check-input" id="2" type="radio" name="type" value="Pravno lice">
                                <label for="2" class="form-check-label">Pravno lice</label><br>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror


                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" >

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresa') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" >

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Grad') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" >

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" autocomplete="number" >

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <h4>Podaci o posiljci</h4>
                            
                            <div class="form-group row">
                                <label for="mass" class="col-md-4 col-form-label text-md-right">{{ __('Tezina Paketa') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select custom-select-lg mb-3 mass" name="mass" id="mass" >
                                        <option label="do 0.5 kg" value="0.5" >do 0.5 kg</option>
                                        <option label="do 1 kg" value="1" >do 1 kg</option>
                                        <option label="do 2 kg" value="2" >do 2 kg</option>
                                        <option label="do 5 kg" value="5" >do 5 kg</option>
                                        <option label="do 10 kg" value="10" >do 10 kg</option>
                                        <option label="do 15 kg" value="15" >do 15 kg</option>
                                        <option label="do 20 kg" value="20" >do 20 kg</option>
                                        <option label="do 30 kg" value="30" >do 30 kg</option>
                                        <option label="do 50 kg" value="50" >do 50 kg</option>
                                    </select>

                                    @error('mass')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror



                                </div>


                            </div>
                            <span id="cena"></span>
                            <div>
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Kategorija') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select custom-select-lg mb-3" name="category" id="category" >
                                        <option label="Auto delovi i oprema" value="Auto delovi i oprema">Auto delovi i oprema</option>
                                        <option label="Bebi oprema i dečje stvari" value="Bebi oprema i dečje stvari">Bebi oprema i dečje stvari</option>
                                        <option label="Bela tehnika" value="Bela tehnika">Bela tehnika</option>
                                        <option label="Časopis" value="Časopis">Časopis</option>
                                        <option label="Dokument" value="Dokument" selected="selected">Dokument</option>
                                        <option label="Dvorište i bašta" value="Dvorište i bašta">Dvorište i bašta</option>
                                        <option label="Elektronika i komponente" value="Elektronika i komponente">Elektronika i komponente</option>
                                        <option label="Galanterija" value="Galanterija">Galanterija</option>
                                        <option label="Garderoba" value="Garderoba">Garderoba</option>
                                        <option label="Građevinska i elektro oprema i materijal" value="Građevinska i elektro oprema i materijal">Građevinska i elektro oprema i materijal</option>
                                        <option label="Igračke i igre" value="">Igračke i igre</option>
                                        <option label="Knjige" value="Knjige">Knjige</option>
                                        <option label="Kompjuteri" value="Kompjuteri">Kompjuteri</option>
                                        <option label="Kozmetika i oprema" value="Kozmetika i oprema">Kozmetika i oprema</option>
                                        <option label="Kućni aparati" value="Kućni aparati" selected="selected">Kućni aparati</option>
                                        <option label="Lov i ribolov" value="Lov i ribolov">Lov i ribolov</option>
                                        <option label="Mobilni telefoni" value="Mobilni telefoni">Mobilni telefoni</option>
                                        <option label="Muzički instrumenti" value="Muzički instrumenti">Muzički instrumenti</option>
                                        <option label="Nameštaj" value="Nameštaj">Nameštaj</option>
                                        <option label="Obuća" value="Obuća">Obuća</option>
                                        <option label="Poljoprivreda i oprema" value="Poljoprivreda i oprema">Poljoprivreda i oprema</option>
                                        <option label="Školski pribor i kancelarijska oprema" value="Školski pribor i kancelarijska oprema">Školski pribor i kancelarijska oprema</option>
                                        <option label="Sportska oprema" value="Sportska oprema">Sportska oprema</option>
                                    </select>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Otkupnina') }}</label>

                                    <div class="col-md-6">
                                        <input id="shipment_price" type="number" class="form-control @error('shipent_price') is-invalid @enderror" name="shipment_price" value="{{ old('shipment_price') }}" autocomplete="number" >

                                        @error('shipment_price')
                                        <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                        @enderror
                                    </div>
                                </div>


                            <div class="form-check align-content-center">

                                <input class="form-check-input" id="who" type="radio" name="who_pay" value="Posiljalac">
                                <label for="who" class="form-check-label">Plaća pošiljalac</label><br>

                                <input class="form-check-input" id="who1" type="radio" name="who_pay" value="Primalac">
                                <label for="who1" class="form-check-label">Plaća primalac</label><br>
                                


                            </div>
                            @error('who_pay')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj') }}
                                    </button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
<script>
    console.log('ready');
    $(document).ready(function(){

        $("select#mass").change(function(){
            var tezina = $(this).children("option:selected").val();
            switch(tezina){
                case '0.5':
                    $("#cena").text("270 dinara");
                    break;
                case '1':
                    $("#cena").text("320 dinara");
                    break;
                case '2':
                    $("#cena").text("390 dinara");
                    break;
                case '5':
                    $("#cena").text("500 dinara");
                    break;
                case '10':
                    $("#cena").text("650 dinara");
                    break;
                case '15':
                    $("#cena").text("800 dinara");
                    break;
                case '20':
                    $("#cena").text("920 dinara");
                    break;
                case '30':
                    $("#cena").text("1100 dinara");
                    break;

                case '50':
                    $("#cena").text("1500 dinara");
                    break;


            }
        });
    });
</script>

    
@endsection


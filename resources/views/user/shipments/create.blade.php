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

                                <input class="form-check-input" id="1" type="radio" name="izbor" value="1">
                                <label for="1" class="form-check-label">Fizicko lice</label><br>

                                <input class="form-check-input" id="2" type="radio" name="izbor" value="2">
                                <label for="2" class="form-check-label">Pravno lice</label><br>



                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

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
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>

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
                                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" autocomplete="number" autofocus>

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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tezina paketa') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kategorija') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select custom-select-lg mb-3" >
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

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div>

                            </div>
                            <div class="form-check align-content-center">

                                <input class="form-check-input" id="1" type="radio" name="izbor" value="1">
                                <label for="1" class="form-check-label">Plaća pošiljalac</label><br>

                                <input class="form-check-input" id="2" type="radio" name="izbor" value="2">
                                <label for="2" class="form-check-label">Plaća primalac</label><br>



                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Novo vozilo') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.vehicles.store') }}">
                            @csrf
                            <div>
                                <p>Izaberite koji tip vozila dodajete:</p>
                            </div>
                            <div class="form-check">

                                <input class="form-check-input" id="kamion" type="radio" name="izbor" value="kamion">
                                <label for="kamion" class="form-check-label">Kamion</label><br>

                                <input class="form-check-input" id="kombi" type="radio" name="izbor" value="kombi">
                                <label for="kombi" class="form-check-label">Kombi</label><br>
                                

                            </div>

                            <div class="form-group row">
                                <label for="marka" class="col-md-4 col-form-label text-md-right">{{ __('Marka') }}</label>

                                <div class="col-md-6">
                                    <input id="marka" type="text" class="form-control @error('marka') is-invalid @enderror" name="marka" value="{{ old('marka') }}" autocomplete="marka" autofocus>

                                    @error('marka')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nosivost" class="col-md-4 col-form-label text-md-right">{{ __('Nosivost') }}</label>

                                <div class="col-md-6">
                                    <input id="nosivost" type="text" class="form-control @error('nosivost') is-invalid @enderror" name="nosivost" value="{{ old('nosivost') }}" autocomplete="nosivost" autofocus>

                                    @error('nosivost')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                    @enderror
                                </div>
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


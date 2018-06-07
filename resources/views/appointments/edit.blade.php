@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Afspraak bewerken</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form name="appointment" action="{{ route('appointments.update', $appointment->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">


                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" name="title" id="titel" placeholder="Titel" value="{{ $appointment->title }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="start_datetime">Start Datum/tijd (YY-mm-dd H:i:s)</label>
                        <input type="text" class="form-control" name="start_datetime" id="start_datumtijd" placeholder="YY-mm-dd H:i:s" value="{{ $appointment->start_datetime }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="end_datetime">Eind Datum/tijd (YY-mm-dd H:i:s)</label>
                        <input type="text" class="form-control" name="end_datetime" id="eind_datumtijd" placeholder="YY-mm-dd H:i:s" value="{{ $appointment->end_datetime }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input type="text" class="form-control" name="address" id="adres" placeholder="Titel" value="{{ $appointment->address }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Postcode</label>
                        <input type="text" class="form-control" name="zipcode" id="postcode" placeholder="Postcode" value="{{ $appointment->zipcode }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="city">Plaats</label>
                        <input type="text" class="form-control" name="city" id="plaats" placeholder="Plaats" value="{{ $appointment->city }}"></input>
                    </div>
                    <div class="form-group">
                        <label for="description">Omschrijving</label>
                        <input type="text" class="form-control" name="description" id="omschrijving" placeholder="Omschrijving" value="{{ $appointment->description }}"></input>
                    </div>





                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-primary mr-2">Terug</a><input type="submit" name="submit" class="btn btn-success" value="Opslaan" />
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.masterlayout')

@section('content')

    <h2>Bitte Daten eingeben:</h2>

    <div class="container">
        <form method="POST" action="/applic/post">
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-md-1 col-form-label">Anrede:</label>
                <div class="col-md-11">
                    <input type="text" placeholder="Herr/Frau" name="salutation">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-1 col-form-label">Vorname:</label>
                <div class="col-md-11">
                    <input type="text" placeholder="Maja" name="firstname">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-1">Nachname:</label>
                <div class="col-md-11">
                    <input type="text" placeholder="Musterfrau" name="lastname">
                </div>
            </div>
            <div class="offset-md-1 col-sm-11">
                <button type="submit" class="btn btn-primary">Speichern</button>
            </div>
        </form>
    </div>

@endsection

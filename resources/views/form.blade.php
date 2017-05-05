@extends('layouts.masterlayout')

@section('title', 'Persönliche Daten Formular')

@section('content')

    <h1 >Persönliche Daten - Bewerberportal</h1>
    <hr>
    {!! Form::open(array('route' => 'applicantinfo', 'class' => 'form-bootstrap  form-horizontal'))  !!}
    <div class="form-group">

        {!! Form::label('', 'Weiblich', array('class' => '')) !!} {!! Form::radio('salutation', '1') !!}
        {!! Form::label('', 'Männlich') !!} {!! Form::radio('salutation', '0')  !!}

    </div>
    <div class="form-group">
        {!! Form::label('', 'Vorname: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('firstname', '', array('class' => 'col-lg-10 control-label'))!!}
        <br/><br/>
        {!! Form::label('', 'Nachname: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('lastname', '', array('class' => 'col-lg-10 control-label'))!!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Straße: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('street', '', array('class' => 'col-lg-10 control-label'))!!}
        <br/><br/>
        {!! Form::label('', 'PLZ: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('zip', '', array('class' => 'col-lg-4 control-label'))!!} {!! Form::label('', 'Ort: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('city', '', array('class' => 'col-lg-4 control-label'))!!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Email: ', array('class' => 'col-lg-2 control-label')) !!} {!! Form::text('email', 'mail@example.com', array('class' => 'col-lg-10 control-label')) !!}
    </div>
    <br>
    <div class="col-lg-12">
    {!! Form::submit('Absenden') !!}
    </div>
    {!! Form::close() !!}

    <div class="row">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
   @endif
    </div>

@stop

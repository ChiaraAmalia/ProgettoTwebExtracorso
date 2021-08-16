<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/meanmenu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/searchbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
@extends('layout.zonaUtente3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div><br><h3>Inserisci Malfunzionamento</h3><br></div>
                <div class="address">
                    <?php $user=Auth::user() ?>
                           {{ Form::open(array('route' =>['AggiungiMalfunzionamentoStaff', $user->id, $prodotto->codice_prodotto])) }}       
                    <!--Titolo-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('titolo', 'Titolo del malfunzionamento', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('titolo', '', ['class' => 'input', 'id' => 'titolo']) }}
                                @if ($errors->first('titolo'))
                                <ul class="errors">
                                    @foreach ($errors->get('titolo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Descrizione-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('descrizione', 'Descrizione del malfunzionamento', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('descrizione', '', ['class' => 'input', 'id' => 'descrizione']) }}
                                @if ($errors->first('descrizione'))
                                <ul class="errors">
                                    @foreach ($errors->get('descrizione') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 offset-md-3">
                            {{ Form::submit('Inserisci', ['class' => 'form-btn1']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
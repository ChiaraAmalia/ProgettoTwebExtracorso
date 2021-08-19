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
@extends('layout.zonaAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div><br><h3>Modifica Centro Esterno</h3><br></div>

                <div class="address">
                            {{ Form::model($centro, ['method'=>'PUT',
                            'route'=>['admin.update',$centro->codice_centro], 'id' => 'modifica_centro', 'class' => 'contact-form']) }}

                         <!--Nome Centro Esterno-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('nome_centro', 'Nome del centro', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('nome_centro', old('nome_centro'), ['class' => 'input', 'id' => 'nome_centro']) }}
                                        @if ($errors->first('nome_centro'))
                                            <ul class="errors">
                                            @foreach ($errors->get('nome_centro') as $message)
                                            <li>{{ $message }}</li>
                                            @endforeach
                                            </ul>
                                        @endif
                                </div>
                            </div>
                        </div>
                        
                        <!--Indirizzo centro-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('indirizzo', 'Indirizzo', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('indirizzo', old('indirizzo'), ['class' => 'input','id' => 'indirizzo']) }}
                                    @if ($errors->first('indirizzo'))
                                        <ul class="errors">
                                        @foreach ($errors->get('indirizzo') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!--Citta Centro-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('citta', old('citta'), ['class' => 'input','id' => 'citta']) }}
                                @if ($errors->first('citta'))
                                    <ul class="errors">
                                    @foreach ($errors->get('citta') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Cap Centro-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('cap', 'CAP', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('cap', old('cap'), ['class' => 'input','id' => 'cap']) }}
                                    @if ($errors->first('cap'))
                                        <ul class="errors">
                                        @foreach ($errors->get('cap') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!--Telefono Centro-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('telefono', old('telefono'), ['class' => 'input','id' => 'telefono']) }}
                                    @if ($errors->first('telefono'))
                                        <ul class="errors">
                                        @foreach ($errors->get('telefono') as $message)
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
                            {{ Form::label('descrizione', 'Descrizione del centro', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('descrizione', old('descrizione'), ['class' => 'input', 'id' => 'descrizione']) }}
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
                                {{ Form::submit('Modifica', ['class' => 'form-btn1']) }}
                            </div>
                    {{ Form::close() }}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

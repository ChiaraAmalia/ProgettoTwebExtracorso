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
                <div>Modifica Organizzatore</div>

                <div class="address">
                    {{ Form::model($organizzatore, ['method'=>'PUT',
                            'route'=>['admin.update',$organizzatore->id]]) }}

                        <!--Nome Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('nome', old('nome'), ['class' => 'input', 'id' => 'nome']) }}
                                    @if ($errors->first('nome'))
                                        <ul class="errors">
                                        @foreach ($errors->get('nome') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                            </div>
                        </div>
                        </div>

                        <!--Cognome Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('cognome', old('cognome'), ['class' => 'input', 'id' => 'cognome']) }}
                                @if ($errors->first('cognome'))
                                        <ul class="errors">
                                        @foreach ($errors->get('conome') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Nome società Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('nome_societa_organizzatrice', 'Nome società', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('nome_societa_organizzatrice', old('nome_societa_organizzatrice'), ['class' => 'input', 'id' => 'nome_societa_organizzatrice']) }}
                                @if ($errors->first('nome_societa_organizzatrice'))
                                        <ul class="errors">
                                        @foreach ($errors->get('nome_societa_organizzatrice') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                            </div>
                        </div>
                        </div>

                        
                        <!--E-mail Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('email', old('email'), ['class' => 'input','id' => 'email']) }}
                                @if ($errors->first('email'))
                                    <ul class="errors">
                                    @foreach ($errors->get('email') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Username Utente -->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('username', old('username'), ['class' => 'input','id' => 'username']) }}
                                @if ($errors->first('username'))
                                    <ul class="errors">
                                    @foreach ($errors->get('username') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>                   
                        <!--Via Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('via', 'Via', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('via', old('via'), ['class' => 'input','id' => 'via']) }}
                                @if ($errors->first('via'))
                                    <ul class="errors">
                                    @foreach ($errors->get('via') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Citta Utente Registrazione-->
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
                        
                        <!--Cap Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('cap', "CAP", ['class' => 'label-input']) }}
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
                        
                        <!--Sesso Utente Registrazione-->
                        <?php $gen=['M'=>'M','F'=>'F']; ?>
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('sesso', 'Sesso', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('sesso', $gen , old('sesso'), ['class' => 'input','id' => 'sesso']) }}
                                @if ($errors->first('sesso'))
                                    <ul class="errors">
                                    @foreach ($errors->get('sesso') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Cellulare Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('cellulare', 'Cellulare', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('cellulare', old('cellulare'), ['class' => 'input','id' => 'cellulare']) }}
                                @if ($errors->first('cellulare'))
                                    <ul class="errors">
                                    @foreach ($errors->get('cellulare') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div>
                            <div class="col-md-6 offset-md-3">
                                {{ Form::submit('Modifica', ['class' => 'form-btn1']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


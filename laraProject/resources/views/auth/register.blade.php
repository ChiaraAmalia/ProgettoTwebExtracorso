@extends('layout.zonaPubblica')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div class="wrapper fadeInDown">REGISTRATI</div>

                <div class="address">
                    {{ Form::open(array('route' => 'register')) }}
                    
                        <!--Nome Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
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
                            {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome']) }}
                                @if ($errors->first('cognome'))
                                        <ul class="errors">
                                        @foreach ($errors->get('cognome') as $message)
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
                            {{ Form::text('email', '', ['class' => 'input','id' => 'email']) }}
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
                        
                        <!--Username Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
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
                        
                        <!--Password Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                                @if ($errors->first('password'))
                                    <ul class="errors">
                                    @foreach ($errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Conferma Password Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
                            </div>
                        </div>
                        </div>
                        
                        <!--Via Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('via', 'Via', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('via', '', ['class' => 'input','id' => 'via']) }}
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
                            {{ Form::text('citta', '', ['class' => 'input','id' => 'citta']) }}
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
                            {{ Form::label('cap', 'CAP', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('cap', '', ['class' => 'input','id' => 'cap']) }}
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
                            {{ Form::select('sesso',$gen ,'', ['class' => 'input','id' => 'sesso']) }}
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
                            {{ Form::text('cellulare', '', ['class' => 'input','id' => 'cellulare']) }}
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
                        <div class="wrapper fadeInDown">
                            <div class="col-md-6 offset-md-3">
                                {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

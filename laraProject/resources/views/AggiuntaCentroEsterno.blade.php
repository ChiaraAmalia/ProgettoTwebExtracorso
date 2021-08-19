@extends('layout.zonaAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div class="wrapper fadeInDown">AGGIUNGI CENTRO ESTERNO</div>

                <div class="address">
                    {{ Form::open(array('route' => 'AggiungiCentroEsterno')) }}

                         <!--Nome Centro Esterno-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('nome_centro', 'Nome del centro', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('nome_centro', '', ['class' => 'input', 'id' => 'nome_centro']) }}
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
                                {{ Form::text('indirizzo', '', ['class' => 'input','id' => 'indirizzo']) }}
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
                        
                        <!--Cap Centro-->
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
                        
                        <!--Telefono Centro-->
                        <div class="address">
                            <div class="form-group row">
                                {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
                                <div class="col-md-6">
                                {{ Form::text('telefono', '', ['class' => 'input','id' => 'telefono']) }}
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
                        <div class="wrapper fadeInDown">
                            <div class="col-md-6 offset-md-3">
                                {{ Form::submit('Aggiungi', ['class' => 'form-btn1']) }}
                            </div>
                        </div>
                    {{ Form::close() }}                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

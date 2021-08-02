@extends('layout.zonaPubblica')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div class="wrapper fadeInDown">AGGIUNGI FAQ</div>

                <div class="address">
                    {{ Form::open(array('route' => 'AggiungiFAQ')) }}
                    


                        <!--Domanda FAQ da aggiungere-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('domanda', '', ['class' => 'input', 'id' => 'domanda']) }}
                                @if ($errors->first('domanda'))
                                        <ul class="errors">
                                        @foreach ($errors->get('domanda') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                            </div>
                        </div>
                        </div>
                        
                        <!--Risposta FAQ da aggiungere-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('risposta', '', ['class' => 'input','id' => 'risposta']) }}
                                @if ($errors->first('risposta'))
                                    <ul class="errors">
                                    @foreach ($errors->get('risposta') as $message)
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


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
                <div>Modifica FAQ</div>

                <div class="address">
                    {{ Form::model($faq, ['method'=>'PUT',
                            'route'=>['faqs.update',$faq->id_faq]]) }}
                        <!--Domanda FAQ da Modificare-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('domanda', old('domanda'), ['class' => 'input', 'id' => 'domanda']) }}
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

                        
                        <!--E-mail Utente Registrazione-->
                        <div class="address">
                        <div class="form-group row">
                            {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::text('risposta', old('risposta'), ['class' => 'input','id' => 'risposta']) }}
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


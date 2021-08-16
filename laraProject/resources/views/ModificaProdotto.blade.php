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
                <div><br><h3>Modifica Prodotto</h3><br></div>

                <div class="address">
                            {{ Form::model($prodotto, ['method'=>'PUT',
                            'route'=>['prod.update',$prodotto->codice_prodotto], 'id' => 'modificaProdotto', 'files' => true, 'class' => 'contact-form']) }}        
                    <!--Nome prodotto-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('nome_prodotto', 'Nome Prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::text('nome_prodotto', old('nome_prodotto'), ['class' => 'input', 'id' => 'nome_prodotto']) }}
                                @if ($errors->first('nome_prodotto'))
                                <ul class="errors">
                                    @foreach ($errors->get('nome_prodotto') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Immagine-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('immagine', 'Immagine del prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::file('immagine', old('immagine'), ['class' => 'input', 'id' => 'immagine']) }}
                                @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Tipologia del prodotto-->
                    <?php $tipologia=['lavatrice'=>'lavatrice','lavastoviglie'=>'lavastoviglie','forno'=>'forno','frigorifero'=>'frigorifero','asciugatrice'=>'asciugatrice']; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('tipologia', 'Tipologia del prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('tipologia',$tipologia,old('tipologia'), ['class' => 'input','id' => 'tipologia']) }}
                                @if ($errors->first('tipologia'))
                                    <ul class="errors">
                                    @foreach ($errors->get('tipologia') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Rumore-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('rumore', 'Emissione acustica', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::text('rumore', old('rumore'), ['class' => 'input', 'id' => 'rumore']) }}
                                @if ($errors->first('rumore'))
                                <ul class="errors">
                                    @foreach ($errors->get('rumore') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Consumo energetico-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('consumo_en_annuo', 'Consumo Energetico', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::text('consumo_en_annuo', old('consumo_en_annuo'), ['class' => 'input', 'id' => 'consumo_en_annuo']) }}
                                @if ($errors->first('consumo_en_annuo'))
                                <ul class="errors">
                                    @foreach ($errors->get('consumo_en_annuo') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Luce Interna-->
                    <?php $luce_interna=['Sì'=>'Sì','No'=>'No']; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('luce_interna', 'Luce interna', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('luce_interna',$luce_interna ,old('luce_interna'), ['class' => 'input','id' => 'luce_interna']) }}
                                @if ($errors->first('luce_interna'))
                                    <ul class="errors">
                                    @foreach ($errors->get('luce_interna') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Programmi-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('programmi', 'Programmi', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('programmi',  old('programmi'), ['class' => 'input','id' => 'programmi']) }}
                                @if ($errors->first('programmi'))
                                <ul class="errors">
                                    @foreach ($errors->get('programmi') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Classe energetica-->
                    <?php $classe_energetica=['A+++'=>'A+++','A++'=>'A++','A+'=>'A+','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G',]; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('classe_energetica', 'Classe Energetica', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('classe_energetica',$classe_energetica,old('classe_energetica'), ['class' => 'input','id' => 'classe_energetica']) }}
                                @if ($errors->first('classe_energetica'))
                                    <ul class="errors">
                                    @foreach ($errors->get('classe_energetica') as $message)
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
                            {{ Form::label('descrizione', 'Descrizione Prodotto', ['class' => 'label-input']) }}
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
                    <!--Tecniche di buon uso-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('tecniche_buonuso', 'Tecniche di buon uso', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('tecniche_buonuso',  old('tecniche_buonuso'), ['class' => 'input', 'id' => 'tecniche_buonuso']) }}
                                @if ($errors->first('tecniche_buonuso'))
                                <ul class="errors">
                                    @foreach ($errors->get('tecniche_buonuso') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Modalita di installazione prodotto-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('modalita_installazione', 'Modalità di installazione prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('modalita_installazione',  old('modalita_installazione'), ['class' => 'input', 'id' => 'modalita_installazione']) }}
                                @if ($errors->first('modalita_installazione'))
                                <ul class="errors">
                                    @foreach ($errors->get('modalita_installazione') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 offset-md-3">
                            {{ Form::submit('Applica Modifiche', ['class' => 'form-btn1']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

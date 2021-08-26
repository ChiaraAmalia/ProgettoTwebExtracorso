@extends('layout.zonaUtente3')

@section('title', 'Inserimento Prodotto')


@section('scripts')

@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.rumore').hide();
  $("label[for='rumore']").hover(function(){
    $('#rum').hide();
    $('.rumore').show();
    }, function(){
    $('.rumore').hide();
    $('#rum').show();
  });
});
</script>
<script>
$(document).ready(function(){
    $('.consumo').hide();
  $("label[for='consumo_en_annuo']").hover(function(){
    $('#cons').hide();
    $('.consumo').show();
    }, function(){
    $('.consumo').hide();
    $('#cons').show();
  });
});
</script>
<script src="{{ asset('js/functions.js') }}" ></script>
<script>
$(function () {
    var actionUrl = "{{ route('inserisci') }}";
    var formId = 'inserisciprodotto';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#inserisciprodotto").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="address">
                <div class="address">
                    <!--Inizio del Form-->
                    <div class="address">
                        <div class="form-group row">
                            <div class="wrapper fadeInDown">INSERISCI PRODOTTO</div>
                            {{ Form::open(array('route' => 'inserisci', 'id' => 'inserisciprodotto', 'files' => true, 'class' => 'contact-form')) }}
                        </div>
                    </div>
                    <!--Nome Prodotto-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('nome_prodotto', 'Nome Prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::text('nome_prodotto', '', ['class' => 'input', 'id' => 'nome_prodotto']) }}
                            </div>
                        </div>
                    </div>
                    <!--Immagine del prodotto-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('immagine', 'Immagine del prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::file('immagine', ['class' => 'input', 'id' => 'immagine']) }}
                            </div>
                        </div>
                    </div>
                    <!--Tipologia del prodotto-->
                    <?php $tipologia=['lavatrice'=>'lavatrice','lavastoviglie'=>'lavastoviglie','forno'=>'forno','frigorifero'=>'frigorifero','asciugatrice'=>'asciugatrice']; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('tipologia', 'Tipologia del prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('tipologia',$tipologia,'',['class' => 'input','id' => 'tipologia']) }}
                            </div>
                        </div>
                    </div>
                    <!--Rumore-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('rumore', 'Emissione acustica ❓', ['class' => 'label-input']) }}
                            <div class="col-md-6" id="rum">
                                {{ Form::text('rumore','', ['class' => 'input', 'id' => 'rumore']) }}
                            </div>
                            <div class="rumore"> Inserire il valore avente come unità di misura dB </div>
                        </div>
                    </div>
                    <!--Consumo Energetico-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('consumo_en_annuo', 'Consumo Energetico ❓', ['class' => 'label-input']) }}
                            <div class="col-md-6" id="cons">
                               {{ Form::text('consumo_en_annuo','',['class' => 'input', 'id' => 'consumo_en_annuo']) }}
                            </div>
                           <div class="consumo"> Inserire il valore avente come unità di misura kWh </div> 
                        </div>
                    </div>
                    <!--Luce Interna-->
                    <?php $luce_interna=['Sì'=>'Sì','No'=>'No']; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('luce_interna', 'Luce interna', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('luce_interna',$luce_interna , '',['class' => 'input','id' => 'luce_interna']) }}
                            </div>
                        </div>
                    </div>
                    <!--Programmi-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('programmi', 'Programmi', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('programmi', '',['class' => 'input','id' => 'programmi']) }}
                            </div>
                        </div>
                    </div>
                    <!--Classe energetica-->
                    <?php $classe_energetica=['A+++'=>'A+++','A++'=>'A++','A+'=>'A+','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G',]; ?>
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('classe_energetica', 'Classe Energetica', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                            {{ Form::select('classe_energetica',$classe_energetica, '',['class' => 'input','id' => 'classe_energetica']) }}
                            </div>
                        </div>
                    </div>                  
                    <!--Descrizione-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('descrizione', 'Descrizione Prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('descrizione', '',['class' => 'input', 'id' => 'descrizione']) }}
                            </div>
                        </div>
                    </div>
                    <!--Tecniche di buon uso-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('tecniche_buonuso', 'Tecniche di buon uso', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('tecniche_buonuso', '',['class' => 'input', 'id' => 'tecniche_buonuso']) }}
                            </div>
                        </div>
                    </div>
                    <!--Modalita di installazione del prodotto-->
                    <div class="address">
                        <div class="form-group row">
                            {{ Form::label('modalita_installazione', 'Modalità di installazione prodotto', ['class' => 'label-input']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('modalita_installazione', '',['class' => 'input', 'id' => 'modalita_installazione']) }}
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 offset-md-3">
                            {{ Form::submit('Aggiungi Prodotto', ['class' => 'form-btn1']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


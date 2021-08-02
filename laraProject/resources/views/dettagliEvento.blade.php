
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


@extends('layout.zonaPubblica')

@section('title', 'Dettaglio')

@section('content')
<div class="container">

    <div class="container emp-profile">
        <div class="row mt-4">

            <div class="col-lg-4 text-center border-right border-secondery">
                <div class="tab-content row h-100 d-flex justify-content-center" id="myTabContent">
                    <div class="tab-pane fade show active col-lg-12" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @include('Helper/LocandinaDettaglio', ['imgFile' => $locandina])
                    </div>
                    <div>
                        <br><br><b>{{ $informazioni }}</b>
                    </div>

                    @can('isOrganizer')
                    @if($organizzatore==Auth::user()->nome_societa_organizzatrice)
                    <a href="{{route('statisticheOrga',[$evento->codice_evento])}}">
                        <button class="input-group-text" type="button">Statistiche</button>
                    </a>
                    <a href="{{route('ModificaEvento',[$evento->codice_evento])}}">
                        <button class="input-group-text" type="button">Modifica</button>
                    </a>
                    <a href="{{route('EliminaEvento',[$evento->codice_evento])}}">
                        <button class="input-group-text" type="button">Elimina</button>
                    </a>
                    @endif
                    @endcan

                    @can('isUser')
                    @if($evento->stato_evento=="aperto")
                    <a href="{{route('acquisto',[$evento->codice_evento])}}">
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Compra</button>
                    </a>
                    {{ Form::open(array('route' => 'partecipero', 'class'=>'pulito')) }}
                    {{ Form::hidden('id', Auth::user()->id) }}
                    {{ Form::hidden('codice_evento', $evento->codice_evento) }}
                    {{ Form::submit('Parteciperò', ['class' => 'form-btn1']) }}
                    {{ Form::close() }}

                    @elseif($evento->stato_evento=="chiuso")
                    <p class='finito'> L'evento è terminato!</p>
                    @endif
                    @endcan
                </div>
            </div>
            <div class="col-lg-7">
                <h3>
                    {{ $titolo }}
                </h3>
                <h5>
                    @include('Helper/Prezzo')
                </h5>

                <ul>
                    <li class="pb-2"><b>Luogo:</b> {{$luogo}} </li>
                    <li class="pb-2"><b>Data e ora:</b> {{$data_ora}} </li>
                    <li class="pb-2"><b>Società organizzatrice:</b> {{$organizzatore}} </li>
                    <li class="pb-2"><b>Stato evento:</b> {{$stato_evento}} </li>
                    <li class="pb-2"><b>Biglietti rimanenti:</b> {{$biglietti_rimanenti}} </li>
                    <li class="pb-2"><b>Partecipero':</b> {{$partecipero}} </li>
                </ul>
                {!!$coordinate_maps!!} 
            </div>
            <div>
                <br><br><b>PROGRAMMA EVENTO:</b><br>
                {{$programma_evento}}

            </div> 
            <div>
                <br><b>COME RAGGIUNGERE LA STRUTTURA:</b><br>
                {{$indicazioni}}

            </div>   
        </div>



    </div>
</div>

@endsection


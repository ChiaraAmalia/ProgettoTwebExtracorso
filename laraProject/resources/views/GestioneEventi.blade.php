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

@section('title', 'Catalogo')

@section('content')

<section class="search-sec">
    <div class="container" >
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <a href="{{route('inserisciEvento')}}"><button class="input-group-text" type="button">Inserisci un nuovo evento</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>

<div class="container">
    @isset($eventi)
    @foreach ($eventi as $evento)
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <div class="image">
                        @include('Helper/Locandina', ['imgFile' => $evento->locandina])
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <a href="{{route('dettagliEvento',[$evento->codice_evento])}}">
                        <p class="nomeprod">{{ $evento->titolo }}</p>
                    </a>
                    <div class="d-flex flex-row">
                        <div class="mt-1 mb-1 spec-1">
                            <span>{{ $evento->data_ora }}</span>
                            <span class="dot"></span><span>{{ $evento->luogo }}</span>
                            <span class="dot"></span><span>{{ $evento->societa_organizzatrice }}<br></span>
                            <span class="dot"></span><span>{{ $evento->stato_evento }}</span>
                        </div>
                    </div>
                    <p class="text-justify text-truncate para mb-0">{{ $evento->informazioni }}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">@include('Helper/Prezzo')</h4><span class="strike-text"></span>
                    </div>
                    <div class="d-flex flex-column mt-4"><a href="{{route('dettagliEvento',[$evento->codice_evento])}}"><button class="btn btn-primary btn-sm" type="button">Dettagli</button></a>
                        <a href="{{route('statisticheOrga',[$evento->codice_evento])}}">
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Statistiche</button>
                        </a>
                        <a href="{{route('ModificaEvento',[$evento->codice_evento])}}">
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Modifica</button>
                        </a>
                        <a href="{{route('EliminaEvento',[$evento->codice_evento])}}">
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Elimina</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $eventi])

    @endisset()
    @endsection
</div>
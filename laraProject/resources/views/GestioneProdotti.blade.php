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

<div class="container">
    @isset($prodotti)
    @foreach ($prodotti as $prodotto)

    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <div class="image">
                        @include('Helper/Locandina', ['imgFile' => $prodotto->immagine])
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <a href="{{route('dettagliProdotto',[$prodotto->codice_prodotto])}}">
                        <p class="nomeprod" style='color: #ff8c00'>{{ $prodotto->nome_prodotto }}</p>
                    </a>
                    <div class="d-flex flex-row">
                        <div class="mt-1 mb-1 spec-1">
                            <span>{{ $prodotto->tipologia }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->rumore }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->classe_energetica }}</span>
                            <span class="dot" style='background-color: #ff8c00'></span><span>{{ $prodotto->consumo_en_annuo }}</span>
                        </div>
                    </div>
                    <p class="text-justify text-truncate para mb-0">{{ $prodotto->descrizione }}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-column mt-4">
                        <a href="{{route('dettagliProdotto',[$prodotto->codice_prodotto])}}">
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Scheda tecnica</button>
                        </a>
                        <a href="{{route('gestioneMalfunzionamenti',[Auth::user()->id,$prodotto->codice_prodotto])}}">
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Gestione Malfunzionamenti</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $prodotti])

    @endisset()
    @endsection
</div>
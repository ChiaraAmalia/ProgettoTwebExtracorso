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

    <h1>{{ $titolo }}</h1>
            <div>
               <br><br><b>DESCRIZIONE DEL MALFUNZIONAMENTO:</b><br> 
               {{ $descrizione }}
            </div>
            <div>
                <br><b>SOLUZIONI</b><br>
                    @isset($interventi)
                    @foreach ($interventi as $intervento)
                    <ol>
                        <li>{{$intervento->descrizione}}</li>
                    </ol>
            </div>
            <div>
                <a href="{{route('dettagliProdotto',[$malfunzionamento->codice_prodotto])}}">
                    <p><b>RITORNA AL PRODOTTO</b></p>
                </a> 
            </div>
    </div>

@endsection
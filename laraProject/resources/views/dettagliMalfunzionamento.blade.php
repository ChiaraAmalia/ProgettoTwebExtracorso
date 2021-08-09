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

    <h1><br>{{ $titolo }}</h1>
            <div>
               <br><br><b>DESCRIZIONE DEL MALFUNZIONAMENTO:</b><br> 
               {{ $descrizione }}
            </div>
            <div>
                <br><b>INTERVENTI</b><br>
                    @isset($interventi)
                    @foreach ($interventi as $intervento)
                    <br><span class="dot" style='background-color: #ff8c00'></span><span>{{$intervento->descrizione}}<br></span>
                    @endforeach
                    @endisset
            </div>
            <div>
                <a href="{{route('dettagliProdotto',[$malfunzionamento->codice_prodotto])}}">
                    <p><b><br>RITORNA AL PRODOTTO</b></p>
                </a> 
            </div>
</div>

@endsection
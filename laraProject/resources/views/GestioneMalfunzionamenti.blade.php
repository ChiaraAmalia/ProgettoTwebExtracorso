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

@section('title', 'Gestione Utenti')

@section('content')

<div class="table-users">
   <div class="headertable">MALFUNZIONAMENTI PRODOTTO
   <a href="{{route('AggiungiFAQ')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
   </div>
   <table class="faqs">
      <tr>
         <th>TITOLO</th>
         <th>DESCRIZIONE</th>
         
      </tr>
    @isset($malfunzionamenti)
    @foreach ($malfunzionamenti as $malfunzionamento)
      <tr>
          <td><b>{{ $malfunzionamento->titolo }}</b></td>
         <td>{{ $malfunzionamento->descrizione }}</td>
         <td>&nbsp;&nbsp;</td>
         <td> <a href="{{route('AggiungiFAQ')}}"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         <td> <a href="{{route('AggiungiFAQ')}}"><button class="btn btn-primary btn-sm" type="button">Modifica</button></a> </td>
         <td> <a href="{{route('gestioneInterventi',[Auth::user()->id, $malfunzionamento->codice_prodotto, $malfunzionamento->codice_malfunzionamento])}}"><button class="btn btn-primary btn-sm" type="button">Gestione Interventi</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>
@endsection
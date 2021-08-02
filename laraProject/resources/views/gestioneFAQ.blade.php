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
   <div class="headertable">FAQ
   <a href="{{route('AggiungiFAQ')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
   </div>
   <table class="faqs">
      <tr>
         <th>Domanda</th>
         <th>Risposta</th>
         
      </tr>
    @isset($faq)
    @foreach ($faq as $fa)
      <tr>
         <td>{{ $fa->domanda }}</td>
         <td>{{ $fa->risposta }}</td>
         <td> <a href="{{route('EliminaFAQ',[$fa->id_faq])}}"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         <td> <a href="{{route('modificafaq',[$fa])}}"><button class="btn btn-primary btn-sm" type="button">Modifica</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>
@endsection


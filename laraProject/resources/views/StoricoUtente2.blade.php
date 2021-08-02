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


@extends('layout.zonaUtente2')

@section('title', 'Storico')
<!-- inizio della sezione home -->
@section('content')
<div class="container emp-profile">
    
    @isset($biglietti)
    @foreach ($biglietti as $biglietto)
    
    @if($biglietto->codice_evento != null)
<div class="ticket">
  
  <div class="ticketdate">
    <span class="ticketday"></span>
    <span class="ticketmonth-and-time">{{ $eventi[$biglietto->codice_biglietto]->data_ora }}</span>
  </div>

  <div class="ticketartist">
      <span class="name">{{ $eventi[$biglietto->codice_biglietto]->titolo }}</span><br>
    <span class="live small">Organizzatore: {{$eventi[$biglietto->codice_biglietto]->societa_organizzatrice}}</span><br>
    <span class="live small">Numero biglietti acquistati: {{$biglietto->quantita}}</span><br>
   <?php if($eventi[$biglietto->codice_biglietto]->biglietto_scontato==1){
                    $eventi[$biglietto->codice_biglietto]->prezzo_biglietto=$eventi[$biglietto->codice_biglietto]->prezzo_biglietto-(($eventi[$biglietto->codice_biglietto]->prezzo_biglietto)*($eventi[$biglietto->codice_biglietto]->sconto)/100);
                    }?>
    <span class="live small">Prezzo singolo biglietto: {{$eventi[$biglietto->codice_biglietto]->prezzo_biglietto}} €</span><br>
    <span class="live small">Prezzo totale: {{$biglietto->prezzo_acquisto}} €</span><br>
    <span class="live small">Metodo di pagamento: {{$biglietto->metodo_pagamento}}</span><br>
  </div>
  <div class="ticketlocation">
      <?php $stringa= "Codice biglietto:{$biglietto->codice_biglietto}, per il concerto:{$eventi[$biglietto->codice_biglietto]->titolo}, "
      . "numero di biglietti:{$biglietto->quantita}";?>
      {!! QrCode::generate("$stringa"); !!}
    <span>{{$eventi[$biglietto->codice_biglietto]->luogo}}</span>

  </div>

  <div class="ticketrip">
  </div>
  <div class="ticketcta">
    <a class="ticketbutton" href="{{route('qrcode',[$stringa])}}">Codice QR biglietto</a>
  </div>
 
</div>
    @endif
    @endforeach
    @endisset()
</div>
@endsection


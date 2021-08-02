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
   <div class="headertable">CLIENTI</div>
   <table class="user" cellspacing="0">
      <tr>
         <th>E-mail</th>
         <th>Username</th>
         <th>Nome</th>
         <th>Cognome</th>
         <th>Via</th>
         <th>Citta</th>
         <th>CAP</th>
         <th>Sesso</th>
         <th>Cellulare</th>
         <th></th>
      </tr>
    @isset($clienti)
    @foreach ($clienti as $cliente)
      <tr>
         <td>{{ $cliente->email }}</td>
         <td>{{ $cliente->username }}</td>
         <td>{{ $cliente->nome }}</td>
         <td>{{ $cliente->cognome }}</td>
         <td>{{ $cliente->via }}</td>
         <td> {{ $cliente->citta }} </td>
         <td> {{ $cliente->cap }} </td>
         <td> {{ $cliente->sesso }} </td>
         <td> {{ $cliente->cellulare }} </td>
         <td> <a href="{{route('EliminaUtente',[$cliente->id])}}"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>


<div class="headertable">ORGANIZZATORI 
    <a href="{{route('AggiungiOrganizzatore')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
</div>
   <table class="user" cellspacing="0">
      <tr>
         <th>E-mail</th>
         <th>Username</th>
         <th>Nome società</th>
         <th>Via</th>
         <th>Citta</th>
         <th>CAP</th>
         <th>Cellulare</th>
         <th>Sesso</th>
         
      </tr>
    @isset($organizzatori)
    @foreach ($organizzatori as $organizzatore)
      <tr>
         <td>{{ $organizzatore->email }}</td>
         <td>{{ $organizzatore->username }}</td>
         <td> {{ $organizzatore->nome_societa_organizzatrice }} </td>
         <td>{{ $organizzatore->via }}</td>
         <td>{{ $organizzatore->citta }}</td>
         <td>{{ $organizzatore->cap }}</td>
         <td> {{ $organizzatore->cellulare }} </td>
         <td> {{ $organizzatore->sesso }} </td>
         <td> <a href="{{route('EliminaUtente',[$organizzatore->id])}}"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         <td> <a href="{{route('modificaorganizzatore',[$organizzatore])}}"><button class="btn btn-primary btn-sm" type="button">Modifica</button></a> </td>
         <td> <a href="{{route('statistiche',[$organizzatore])}}"><button class="btn btn-primary btn-sm" type="button">Statistiche</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>
</div>

@endsection


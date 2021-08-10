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

<script>
  function ConfirmDelete()
  {
  var x = confirm("Sei sicuro? I dati verranno persi se procedi");
  if (x)
    return true;
  else
    return false;
  };
</script>

@section('title', 'Gestione Utenti')

@section('content')

<div class="table-users">
   <div class="headertable">TECNICI INTERNI
       <a href="{{route('AggiungiOrganizzatore')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
   </div>
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
    @isset($tecniciInterni)
    @foreach ($tecniciInterni as $tecnicoInterno)
      <tr>
         <td>{{ $tecnicoInterno->email }}</td>
         <td>{{ $tecnicoInterno->username }}</td>
         <td>{{ $tecnicoInterno->nome }}</td>
         <td>{{ $tecnicoInterno->cognome }}</td>
         <td>{{ $tecnicoInterno->via }}</td>
         <td> {{ $tecnicoInterno->citta }} </td>
         <td> {{ $tecnicoInterno->cap }} </td>
         <td> {{ $tecnicoInterno->sesso }} </td>
         <td> {{ $tecnicoInterno->cellulare }} </td>
         <td> <a href="{{route('EliminaUtente',[$tecnicoInterno->id])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Elimina</button></a> </td>
         <td> <a href="{{route('modificaorganizzatore',[$tecnicoInterno])}}"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Modifica</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>
   
   <div class="headertable">TECNICI ESTERNI
   <a href="{{route('AggiungiOrganizzatore')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
   </div>
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
         <th>Nome Centro</th>
         <th></th>
      </tr>
    @isset($tecniciEsterni)
    @foreach ($tecniciEsterni as $tecnicoEsterno)
      <tr>
         <td>{{ $tecnicoEsterno->email }}</td>
         <td>{{ $tecnicoEsterno->username }}</td>
         <td>{{ $tecnicoEsterno->nome }}</td>
         <td>{{ $tecnicoEsterno->cognome }}</td>
         <td>{{ $tecnicoEsterno->via }}</td>
         <td> {{ $tecnicoEsterno->citta }} </td>
         <td> {{ $tecnicoEsterno->cap }} </td>
         <td> {{ $tecnicoEsterno->sesso }} </td>
         <td> {{ $tecnicoEsterno->cellulare }} </td>
         <td> {{ $tecnicoEsterno->nome_centro }} </td>
         <td> <a href="{{route('EliminaUtente',[$tecnicoEsterno->id])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Elimina</button></a> </td>
         <td> <a href="{{route('modificaorganizzatore',[$tecnicoEsterno])}}"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Modifica</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>


<div class="headertable">STAFF
    <a href="{{route('AggiungiOrganizzatore')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
</div>
   <table class="user" cellspacing="0">
      <tr>
         <th>E-mail</th>
         <th>Username</th>
         <th>Nome</th>
         <th>Cognome</th>
         <th>Via</th>
         <th>Citta</th>
         <th>CAP</th>
         <th>Cellulare</th>
         <th>Sesso</th>
         
      </tr>
    @isset($staff)
    @foreach ($staff as $staf)
      <tr>
         <td>{{ $staf->email }}</td>
         <td>{{ $staf->username }}</td>
         <td> {{ $staf->nome }} </td>
         <td> {{ $staf->cognome }} </td>
         <td>{{ $staf->via }}</td>
         <td>{{ $staf->citta }}</td>
         <td>{{ $staf->cap }}</td>
         <td> {{ $staf->cellulare }} </td>
         <td> {{ $staf->sesso }} </td>
         <td> <a href="{{route('EliminaUtente',[$staf->id])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Elimina</button></a> </td>
         <td> <a href="{{route('modificaorganizzatore',[$staf])}}"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Modifica</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table>
    
<div class="headertable">CENTRI DI ASSISTENZA ESTERNI
    <a href="{{route('AggiungiOrganizzatore')}}"><button class="btn btn-sm" type="button">Inserisci nuovo</button></a>
</div>
   <table class="user" cellspacing="0">
      <tr>
         <th>Nome Centro</th>
         <th>Indirizzo</th>
         <th>Citta</th>
         <th>CAP</th>
         <th>Telefono</th>
         <th>Descrizione</th>
         
      </tr>
    @isset($centriEsterni)
    @foreach ($centriEsterni as $centroEsterno)
      <tr>
         <td>{{ $centroEsterno->nome_centro }}</td>
         <td>{{ $centroEsterno->indirizzo }}</td>
         <td>{{ $centroEsterno->citta }} </td>
         <td>{{ $centroEsterno->cap }} </td>
         <td>{{ $centroEsterno->telefono }}</td>
         <td>{{ $centroEsterno->descrizione }}</td>
         <td> <a href="{{route('eliminaCentro',[$centro_esterno->codice_centro])}}"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Elimina</button></a> </td>
         <td> <a href="{{route('modificaorganizzatore',[$centro_esterno])}}"><button class="btn btn-primary btn-sm" type="button" style="background-color: #0080FF;border: none">Modifica</button></a> </td>
      </tr>
    @endforeach
    @endisset()
   </table> 
</div>

@endsection


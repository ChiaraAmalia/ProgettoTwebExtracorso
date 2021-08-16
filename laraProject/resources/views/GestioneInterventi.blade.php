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
   <div class="headertable">INTERVENTI MALFUNZIONAMENTO
   @can('isAdmin')    
   <a href="{{route('inserisciIntervento',[Auth::user()->id,$prodotto->codice_prodotto,$malfunzionamento->codice_malfunzionamento])}}"><button class="btn btn-sm" type="button">Inserisci nuovo intervento</button></a>
   @endcan
   @can('isStaff')    
   <a href="{{route('inserisciInterventoStaff',[Auth::user()->id,$prodotto->codice_prodotto,$malfunzionamento->codice_malfunzionamento])}}"><button class="btn btn-sm" type="button">Inserisci nuovo intervento</button></a>
   @endcan
   </div>
   <table class="faqs" style="margin-left: auto; margin-right: auto">
      <tr>
          <th>DESCRIZIONE</th>      
      </tr>
    @isset($interventi)
    @foreach ($interventi as $intervento)
      <tr>
         <td>{{ $intervento->descrizione }}</td>
         <td>&nbsp;&nbsp;</td>
         <td> <a href="{{route('ModificaIntervento', $intervento->codice_intervento)}}"><button class="btn btn-primary btn-sm" type="button">Modifica</button></a> </td>
         @can('isAdmin')
         <td> <a href="{{route('eliminaInterventoAdmin',[Auth::user()->id, $malfunzionamento->codice_prodotto, $intervento->codice_malfunzionamento, $intervento->codice_intervento])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         @endcan
         @can('isStaff')
         <td> <a href="{{route('eliminaInterventoStaff',[Auth::user()->id, $malfunzionamento->codice_prodotto, $intervento->codice_malfunzionamento, $intervento->codice_intervento])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         @endcan
      </tr>
    @endforeach
    @endisset()
   </table>   
@endsection
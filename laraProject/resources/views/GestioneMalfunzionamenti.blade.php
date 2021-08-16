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


@extends('layout.zonaUtente3')

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
   <div class="headertable">MALFUNZIONAMENTI PRODOTTO
   @can('isAdmin')
   <a href="{{route('inserisciMalfunzionamento',[Auth::user()->id,$prodotto->codice_prodotto])}}"><button class="btn btn-sm" type="button">Inserisci nuovo malfunzionamento</button></a>
   @endcan
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
         
         
         <td> <a href="{{route('ModificaMalfunzionamento', $malfunzionamento->codice_malfunzionamento)}}"><button class="btn btn-primary btn-sm" type="button">Modifica</button></a> </td>
         @can('isStaff')
         <td> <a href="{{route('eliminaMalfunzionamentoStaff',[Auth::user()->id,$malfunzionamento->codice_prodotto,$malfunzionamento->codice_malfunzionamento])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         <td> <a href="{{route('gestioneInterventi',[Auth::user()->id, $malfunzionamento->codice_prodotto, $malfunzionamento->codice_malfunzionamento])}}"><button class="btn btn-primary btn-sm" type="button">Gestione Interventi</button></a> </td>
         @endcan
         @can('isAdmin')
        
         <td> <a href="{{route('eliminaMalfuzionamentoAdmin',[Auth::user()->id,$malfunzionamento->codice_prodotto,$malfunzionamento->codice_malfunzionamento])}}" onclick="return ConfirmDelete()"><button class="btn btn-primary btn-sm" type="button">Elimina</button></a> </td>
         <td> <a href="{{route('gestioneInterventiProdotto',[Auth::user()->id, $malfunzionamento->codice_prodotto, $malfunzionamento->codice_malfunzionamento])}}"><button class="btn btn-primary btn-sm" type="button">Gestione Interventi</button></a> </td>
         @endcan
      </tr>
    @endforeach
    @endisset()
   </table>
@endsection
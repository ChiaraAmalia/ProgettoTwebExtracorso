
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

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#menuButton").click(function(){
      $("#menu").slideToggle();
    }); 
  });

</script>
@endsection

@section('content')
<div class="container">

    <div class="container emp-profile">
        <div class="row mt-4">

            <div class="col-lg-4 text-center border-right border-secondery">
                <div class="tab-content row h-100 d-flex justify-content-center" id="myTabContent">
                    <div class="tab-pane fade show active col-lg-12" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @include('Helper/LocandinaDettaglio', ['imgFile' => $immagine])
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h3>
                    {{ $nome_prodotto }}
                </h3>

                <ul>
                    <li class="pb-2"><b>Tipologia Prodotto:</b> {{$tipologia}} </li>
                    <li class="pb-2"><b>Rumore:</b> {{$rumore}} </li>
                    <li class="pb-2"><b>Consumo energia annuale:</b> {{$consumo_en_annuo}} </li>
                    <li class="pb-2"><b>Luce interna:</b> {{$luce_interna}} </li>
                    <li class="pb-2"><b>Programmi:</b> {{$programmi}} </li>
                    <li class="pb-2"><b>Classe Energetica:</b> {{$classe_energetica}} </li>
                </ul>
            </div>
            <div>
               <br><br><b>DESCRIZIONE:</b><br> 
               {{ $descrizione }}
            </div>
            <div>
                <br><b>TECNICHE DI BUON USO:</b><br>
                {{$tecniche_buonuso}}

            </div> 
            <div>
                <br><b>MODALITÀ DI INSTALLAZIONE:</b><br>
                {{$modalita_installazione}}
            </div>
            @can('showMalfunzionamenti')
            <div>
                <br><b>MALFUNZIONAMENTI:</b><br><br>
                    @isset($malfunzionamenti)
                    @foreach ($malfunzionamenti as $malfunzionamento)
                <button id="menuButton" style="border-bottom: 5px solid orange">{{$malfunzionamento->titolo}}</button>
                <div id="menu" style="display:none;">
                    <p><br>{{ $malfunzionamento->descrizione }}</p>
                    <a href="{{route('dettagliMalfunzionamento',[$prodotto, $malfunzionamento->codice_malfunzionamento])}}">
                        <p><b>Clicca qui per visualizzare i passaggi per la risoluzione</b></p>
                    </a>                        
                    
                </div>
                    @endforeach
                    @endisset()                   
            </div>
            @endcan
    </div>
</div>

@endsection


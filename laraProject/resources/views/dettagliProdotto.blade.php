
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
            <div>
                
                <br><b>MALFUNZIONAMENTI:</b><br>
                
            </div>
        </div>



    </div>
</div>

@endsection


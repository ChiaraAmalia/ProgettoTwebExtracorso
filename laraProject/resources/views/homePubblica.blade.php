@extends('layout.zonaPubblica')

@section('title', 'Home')
<!-- inizio della sezione home -->
@section('content')
<section class="banner_section">
        <div class="banner-main">
            <!--<img src="images/banner2.jpg" />-->
            <img src="{{ asset('/images/elettrodomestici.jpg') }}" class="megaBanner"/>
            <div class="container">
                <div class="text-bg relative" style="top: 50%;">
                    <h1 style="text-shadow: 2px 2px 4px black;padding-bottom: 10px ">ElectroStar<br><br>Gli elettrodomestici a portata di click!</h1>
                </div>
            </div>
        </div>
    </section>

    <div id="screenshot" class="Albums" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>ElectroStar</h2>
                        <p style='text-align: justify'>ElectroStar mette a disposizione dei propri centri assistenza questo sito, in modo tale che i nostri
                            tecnici specializzati possano prestare assistenza ai nostri clienti, nel miglior modo possibile.
                        L'azienda nasce con lo scopo di offrire ai propri clienti i migliori elettrodomestici sul mercato e un
                        servizio di supporto post-vendita per la risoluzione dei malfunzionamenti dei nostri prodotti.
                        La sede centrale dell'azienda si trova in Via della Ricostruzione, 34 - 60127 Ancona (AN).<br>
                        Tel. 0714599670<br>
                        e-mail: info@electrostar.it</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margin">
                    <div class="Albums-box">
                        <figure>
                            <a href="{{ route('info') }}" class="fancybox" rel="ligthbox">
                                <img src="{{ asset('/images/about1.jpg') }}" class="zoom img-fluid " alt="">
                            </a>
                            <span class="hoverle">
                        <a href="{{ route('info') }}" class="fancybox" rel="ligthbox"><img src="images/search.png">Vedi le INFO</a>
                        </span>
                        </figure>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margin">
                    <div class="Albums-box">
                        <figure>
                            <a href="{{ route('faq') }}" class="fancybox" rel="ligthbox ">
                                <img src="{{ asset('/images/domande1.jpg') }}" class="zoom img-fluid " alt="">
                            </a>
                            <span class="hoverle">
                        <a href="{{ route('faq') }}" class="fancybox" rel="ligthbox"><img src="images/search.png">Vedi le FAQ</a>
                        </span>
                        </figure>
                    </div>
                </div>              
            </div>
            <div>
                <br><center>
                 @can('isTecnico')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('tecnico.index') }}">
                      </map>
                 @endcan
                 @can('isAdmin')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('amministratore') }}">
                      </map>
                 @endcan  
                @can('isStaff')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('staff.index') }}">
                      </map>
                 @endcan
                 @guest
                 <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER EFFETTUARE IL LOGIN!</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('login') }}">
                      </map>
                 @endguest
                </center>
            </div><br>
        </div>
    </div>
    <!-- end Concerti -->
<!-- fine sezione home -->
@endsection

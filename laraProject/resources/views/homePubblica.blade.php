@extends('layout.zonaPubblica')

@section('title', 'Home')
<!-- inizio della sezione home -->
@section('content')
<section class="banner_section">
        <div class="banner-main">
            <!--<img src="images/banner2.jpg" />-->
            <img src="{{ asset('/images/elettrodomestici.jpg') }}" class="megaBanner"/>
            <div class="container">
                <div class="text-bg relative">
                    <h1 style="text-shadow: 2px 2px 4px black;">ElectroStar<br><br>Gli elettrodomestici a portata di click!</h1>
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
                        <p>Aggiungi altro</p>
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
                 @can('isUser')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('cliente') }}">
                      </map>
                 @endcan
                 @can('isAdmin')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('amministratore') }}">
                      </map>
                 @endcan  
                @can('isOrganizer')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SUL FRIGORIFERO PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine elettrodomestici" src="images/mappa1.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Effettua il login" coords="432,111,564,444" href="{{ route('organizzatore') }}">
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

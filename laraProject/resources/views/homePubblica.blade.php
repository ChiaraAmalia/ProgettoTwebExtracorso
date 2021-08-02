@extends('layout.zonaPubblica')

@section('title', 'Home')
<!-- inizio della sezione home -->
@section('content')
<section class="banner_section">
        <div class="banner-main">
            <!--<img src="images/banner2.jpg" />-->
            <img src="{{ asset('/images/folla.gif') }}" class="megaBanner"/>
            <div class="container">
                <div class="text-bg relative">
                    <h1>Bigliettone<br><br>Acquista da noi i tuoi biglietti</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Concerti -->
    <div id="screenshot" class="Albums" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Bigliettone</h2>
                        <p>La tua passione, alla portata di un click! Acquista da noi i biglietti per i concerti dei tuoi artisti preferiti, non te ne pentirai!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margin">
                    <div class="Albums-box">
                        <figure>
                            <a href="{{ route('info') }}" class="fancybox" rel="ligthbox">
                                <img src="{{ asset('/images/about.jpg') }}" class="zoom img-fluid " alt="">
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
                                <img src="{{ asset('/images/domande.jpg') }}" class="zoom img-fluid " alt="">
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
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SULLA CHITARRA PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine casa discografica" src="images/mappa.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Registrati o effettua il login" coords="51,156,129,296" href="{{ route('cliente') }}">
                      </map>
                 @endcan
                 @can('isAdmin')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SULLA CHITARRA PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine casa discografica" src="images/mappa.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Registrati o effettua il login" coords="51,156,129,296" href="{{ route('amministratore') }}">
                      </map>
                 @endcan  
                @can('isOrganizer')
                    <h1 style="font-weight: bold; font-family: Verdana">CLICCA SULLA CHITARRA PER TORNARE ALL'AREA RISERVATA</h1>
                      <img alt="Immagine casa discografica" src="images/mappa.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Registrati o effettua il login" coords="51,156,129,296" href="{{ route('organizzatore') }}">
                      </map>
                 @endcan
                 @guest
                 <h1 style="font-weight: bold; font-family: Verdana">CLICCA SULLA CHITARRA PER EFFETTUARE IL LOGIN!</h1>
                      <img alt="Immagine casa discografica" src="images/mappa.jpg" usemap="#map">
                      <map name="map">
                          <area shape="rect" alt="Login" title="Registrati o effettua il login" coords="51,156,129,296" href="{{ route('login') }}">
                      </map>
                 @endguest
                </center>
            </div><br>
        </div>
    </div>
    <!-- end Concerti -->
<!-- fine sezione home -->
@endsection

@extends('layout.zonaPubblica')

@section('title', 'Info')

@section('content')
<div class="blogbg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blogtitlepage">
                        <center>
                        <h2>Informazioni sul nostro servizio</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Lastestnews -->
    <div class="Lastestnews blog">
        <div class="container">

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div class="news-box">
                        <figure><img src="images/logone.jpg" alt="img" /></figure>
                        <h3>Chi siamo?</h3>
                        
                        <p> Bigliettone è un sito che si occupa della compravendita di biglietti
                        per concerti on-line. La più ampia gamma di biglietti è disponibile da noi,
                        a partire dalla musica Classica, terminando con il Metal.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div class="news-box">
                        <figure><img src="images/iscr.png" alt="img" /></figure>
                        <h3>Iscriversi come organizzatori:</h3>
                        
                        <p> Se sei un organizzatore di eventi e vorresti sponsorizzare e vendere
                        i tuoi biglietti sul nostro sito, ti basterà contattare
                        l'amministratore del sito via <a href= "mailto:tecnologiewebprogettotw@gmail.com"> e-mail.</a></p>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/biglietti.jpg" alt="img" /></figure>
                        <h3>Presentare il biglietto:</h3>
                        
                        <p> Una volta effettuato l'aqcuisto insieme al biglietto le verrà assegnato
                        un QR Code, per accedere al servizio basterà presentare in
                        biglietteria il codice.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/qrread.jpg" alt="img" /></figure>
                        <h3>Stampa del biglietto:</h3>
                        
                        <p> Ai fini dell'accesso al servizio, non è necessario stampare nulla, il codice QR può
                        essere anche salvato e mostrato dal celulare.  </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/organ.jpg" alt="img" /></figure>
                        <h3>I servizi offerti agli organizzatori:</h3>
                        
                        <p> Gli organizzatori sulla nostra piattaforma possono vendere i biglietti per i loro concerti,
                        possono gestire questi ultimi e inserirne di nuovi.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/conc.jpg" alt="img" /></figure>
                        <h3>Perchè scegliere noi?</h3>
                        
                        <p> Per la nostra grande professionalità, la gamma di concerti offerti 
                            e la facilità nell'effettuare l'acquisto.</p>
                    </div>
                </div>
            </div>
            
            <br><br><h1>MODALITA' DI FORNITURA DEI SERVIZI</h1>
            <p class="para"> Il nostro sito è in grado di mostrarvi tutti gli eventi offerti dalle società organizzatrici: cliccando sull'evento di interesse,
               è possibile visualizzare tutte le caratteristiche inerenti, con indicazioni riguardo il luogo in cui si svolgerà, la data, la società organizzatrice che offre l'evento,
               il programma offerto ed informazioni riguardo gli orari di ingresso presso la struttura. Per quanto riguarda l'acquisto dei biglietti, può essere effettuato esclusivamente on-line, 
               in completa sicurezza e solo dagli utenti registrati al sito. Gli utenti non registrati o non loggati non possono acquistare i biglietti. </p>
       
            <br><br><h1>LE NOSTRE SEDI ALL'ESTERO</h1>
            <center>
            <table class="tab-info">
               <tr><th>Luogo</th><th>Indirizzo</th></tr> 
               <tr><th>Francia</th><td>118 Boulevard Saint-Germain, 75006 Toulouse</td></tr>
               <tr><th>Germania</th><td>Am Steinlein 2, 97753 Karlstadt</td></tr>
               <tr><th>Spagna</th><td>Calle Saturno, 61, 50012 Zaragoza</td></tr> 
            </table>
            </center>
        </div>
    </div>
    <!-- end Lastestnews -->
@endsection

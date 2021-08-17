@extends('layout.zonaPubblica')

@section('title', 'Info')

@section('content')
<div class="blogbg" style='background-color: #daa520;'>
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
                        <figure><img src="images/logone2.jpg" alt="img" /></figure>
                        <h3>Chi siamo?</h3>
                        
                        <p> ElectroStar è un'azienda che vende elettrodomestici su tutto il territorio nazionale come
                        frigoriferi, televisori, lavatrici, lavastoviglie, forni elettrici, piani cottura e molte altre
                        attrezzature per la casa</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div class="news-box">
                        <figure><img src="images/iscr1.jpg" alt="img" /></figure>
                        <h3>I nostri centri assistenza:</h3>
                        
                        <p>Abbiamo centri assistenza sparsi su tutto il territorio nazionale, per soffisfare al meglio la nostra clientela.
                        Se vuoi lavorare presso uno dei nostri centri, scrivici al seguente indirizzo <a href= "mailto:tecnologiewebprogettotw@gmail.com"> e-mail.</a></p>
                    </div> 
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/tecnici.jpg" alt="img" /></figure>
                        <h3>I nostri tecnici:</h3>
                        
                        <p>Prepariamo i nostri tecnici con un corso di formazione approfondito, per un totale di 50 ore, in modo tale
                            che i nostri tecnici siano sempre pronti a risolvere le problematiche dei nostri elettrodomestici.<br></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/catalogo1.jpg" alt="img" /></figure>
                        <h3>Utilizzo del catalogo:</h3>
                        
                        <p> Nel catalogo è possibile trovare i nostri prodotti con la relativa scheda tecnica associata a ciascun prodotto.
                        Nella scheda tecnica di ogni prodotto è possibile visualizzare la foto e un'eventuale descrizione, le tecniche di buon uso,
                        modalità di installazione, malfunzionamenti associati con eventuale descrizione riguardante gli interventi tecnici da eseguire.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/malfunzionamenti.jpg" alt="img" /></figure>
                        <h3>Malfunzionamenti e risoluzione:</h3>
                        
                        <p> Ciascun tecnico, messo a disposizione dalla nostra azienda, è in grado di risolvere qualsiasi problema gli si presenti sottomano.
                        Attraverso il catalogo, ciascun tecnico può accedere alla scheda tecnica di ogni prodotto e visualizzare eventuali descrizioni riguardanti i malfunzionamenti 
                        riscontrati con il prodotto. Associata a ciascun malfunzionamento, è possibile prendere visione della soluzione al problema, aggiustando l'elettrodomestico
                        in modo tempestivo.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="news-box">
                        <figure><img src="images/cerca2.jpg" alt="img" /></figure>
                        <h3>Ricerca dei prodotti nel catalogo:</h3>
                        
                        <p>Viene messa, a disposizione degli utenti, la possibilità di ricercare i prodotti all'interno del catalogo, eventualmente attraverso l'uso del carattere wild-card "*",
                        ammesso solo come ultimo carattere del pattern di ricerca(ad esempio, "lav*" permette di estrarre le schede tecniche di lavatrici, lavastoviglie, ecc...).</p>
                    </div>
                </div>
            </div>
       
            <br><br><h1>Centri assistenza presenti sul nostro territorio</h1>
            <div>
                <center>
                <table class="tab-info" style="width: 80%;">

                    <tr><th colspan="6">Centri assistenza esterni all'azienda</th></tr> 
                    <tr><th>Nome Centro</th><th>Indirizzo</th><th>Città</th><th>CAP</th><th>Telefono</th><th>Tipologia</th></tr> 
                        @isset($centri)
                        @foreach ($centri as $centro)
                    <tr><th>{{ $centro->nome_centro }}</th><td>{{ $centro->indirizzo }}</td><td>{{ $centro->citta }}</td><td>{{ $centro->cap }}</td><td>{{ $centro->telefono }}</td><td>{{ $centro->tipologia }}</td></tr>
                        @endforeach
                        @endisset
                </table>
                </center>    
            </div>
            <br><br>
            <div>
                <h1>Mappa della sede centrale ElectroStar</h1>
                <center>           
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.110011460128!2d13.506017515496074!3d43.604250979123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d7f856874db67%3A0x23cd0db55ee899c9!2sVia%20della%20Ricostruzione%2C%2034%2C%2060127%20Ancona%20AN!5e0!3m2!1sit!2sit!4v1628061608257!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                
                </center>
            </div>
        </div>
    </div>
    <!-- end Lastestnews -->
@endsection

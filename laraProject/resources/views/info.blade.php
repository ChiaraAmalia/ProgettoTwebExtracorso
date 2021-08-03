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
                <table class="tab-info" align="right">
                    <tr><th>Luogo</th><th>Indirizzo</th></tr> 
                    <tr><th>Ancona</th><td>Via della Rinascita, 3 - 60123 Ancona</td></tr>
                    <tr><th>Milano</th><td>Via Rossi, 32 - 60100 Milano</td></tr>
                    <tr><th>Torino</th><td>Via Guidi, 12 - 62347 Torino</td></tr>
                    <tr><th>Roma</th><td>Via Risi, 29 - 65698 Roma</td></tr>
                    <tr><th>Firenze</th><td>Via Salsa, 21 - 69765 Firenze</td></tr>
                    <tr><th>Genova</th><td>Via Quadro, 45 - 61143 Genova</td></tr>
                    <tr><th>Bari</th><td>Via Virtù, 46 - 63485 Bari</td></tr>
                    <tr><th>Bologna</th><td>Via Pioppi, 29 - 62938 Bologna</td></tr>
                    <tr><th>Perugia</th><td>Via Rimini, 67 - 65748 Perugia</td></tr>
                 </table>
            </div>
            <div>
                <table class="tab-info" >
                    <tr><th>Luogo</th><th>Indirizzo</th></tr> 
                    <tr><th>Reggio Calabria</th><td>Via Asti, 89 - 67745 Reggio Calabria</td></tr>
                    <tr><th>Cagliari</th><td>Via Eia, 44 - 63958 Cagliari</td></tr>
                    <tr><th>Trieste</th><td>Via Paride, 53 - 62289 Trieste</td></tr>
                    <tr><th>Pescara</th><td>Via Lago, 66 - 66547 Pescara</td></tr>
                    <tr><th>Napoli</th><td>Via Verdi, 52 - 63829 Napoli</td></tr>
                    <tr><th>Palermo</th><td>Via Gigli, 37 - 68687 Palermo</td></tr>
                    <tr><th>Lecce</th><td>Via Timo, 9 - 62145 Lecce</td></tr>
                    <tr><th>Potenza</th><td>Via della Rosa, 24 - 60526 Potenza</td></tr>
                    <tr><th>Campobasso</th><td>Via Roma, 55 - 62039 Campobasso</td></tr>
                 </table>     
            </div>
        </div>
    </div>
    <!-- end Lastestnews -->
@endsection

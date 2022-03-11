# Progetto TECNOLOGIE WEB INTRACORSO

Realizzazione di un sito Web per la Gestione dell’Assistenza Tecnica On-Line

## Descrizione del sito:

Il progetto prevede lo sviluppo di un app web per la fruizione del servizio post-vendita per la risoluzione dei malfunzionamenti legati ai prodotti offerti dall’azienda ElectroStar.
Il sito è strutturato su quattro livelli di utenti: utente non registrato, utente tecnico, utente staff e amministratore. A seconda del livello di utente, si hanno diverse funzioni disponibili.

## Livello pubblico:

Il livello pubblico del sito è accessibile senza la necessità di effettuare l’autenticazione. Dalla homepage è possibile navigare, attraverso la navbar, in diverse sezioni:
  -Sezione ‘**Home**’: sono qui contenute tutte le informazioni riguardanti l’azienda, compresi l’indirizzo, il recapito telefonico e la mail. È possibile, inoltre, accedere alla pagina delle info e delle FAQ mentre, in fondo alla pagina, cliccando sul frigorifero, è possibile accedere all’area Accedi.
  -Sezione ‘**Catalogo**’: è qui possibile prendere visione della lista di tutti i prodotti messi a disposizione dall’azienda. Questa parte del sito contiene tutte le informazioni riguardanti il prodotto: accedendo infatti alla scheda tecnica, è possibile prendere visione dei dettagli (immagine raffigurativa, nome del prodotto, tipologia, emissione acustica, consumo annuale di energia, programmi disponibili, classe energetica, descrizione riguardante il prodotto, tecniche di buon uso e modalità di installazione del prodotto). Nel catalogo è altresì disponibile la funzione di ricerca mediante descrizione: è possibile effettuare la ricerca del prodotto sia inserendo l’intera descrizione dello stesso, sia inserendo una descrizione parziale attraverso l’utilizzo del carattere wild-card "*", ammesso solo come ultimo carattere del pattern di ricerca (ad esempio, "lav*" permette di estrarre le schede tecniche di lavatrici, lavastoviglie, ecc...). Attenzione: inserire un solo carattere wild-card "*", altrimenti la ricerca non produrrà alcun risultato.
  -Sezione ‘**Info**': In questa sezione, è possibile prendere visione di eventuali informazioni riguardanti l’azienda, i nostri centri assistenza, i nostri tecnici, informazioni riguardo l’utilizzo del catalogo, i malfunzionamenti e gli interventi e la ricerca nel catalogo. È inoltre possibile visualizzare le informazioni riguardanti i centri assistenza dislocati sul territorio, sia interni che esterni.
In fondo alla pagina è inoltre presente la mappa indicante la locazione della nostra sede centrale.
  -Sezione ‘**FAQ**’: è qui possibile visualizzare le domande più frequenti riguardanti l’azienda e l’utilizzo del sito secondo i diversi livelli di accesso degli utenti.
  -Sezione ‘**Accedi**’: si viene rimandati alla pagina di autenticazione, dove una volta, autenticati, si ottiene l’accesso all’area personale (e si ottiene anche la possibilità di prendere visione di eventuali malfunzionamenti e relativi interventi, funzione non disponibile per utenti non registrati). L’autenticazione “lato server” è costruita mediante il package laravel/ui, mentre “lato client” tramite form del package laravel/Collective.

## Livello utente tecnico:

L’utente che ha effettuato l’accesso verrà reindirizzato verso la sua area privata.
L’utente che effettua l’autenticazione come tecnico può accedere al catalogo prodotti e quindi alla sua scheda tecnica, visualizzando i malfunzionamenti associati a ciascun prodotto mediante un menù a tendina, gestito attraverso l’utilizzo di jQuery. Azionando il menù a tendina e cliccando quindi su ciascun malfunzionamento, si verrà reindirizzati verso una pagina che ci permette di visualizzare i dettagli del malfunzionamento e i relativi interventi da eseguire per la risoluzione del problema.
Viene implementata anche qui la funzionalità di logout, per terminare la propria sessione.

## Livello utente staff:

Un utente del livello staff ha come prima funzionalità disponibile quella di gestione dei propri prodotti di competenza (può accedere a quest’area direttamente dalla propria area personale). Più nello specifico può (con conseguente aggiornamento del database):
  -Accedere alla scheda tecnica del prodotto e, come anche spiegato per gli utenti autenticati come tecnico, accedere ai relativi malfunzionamenti e interventi;
  -Gestire i malfunzionamenti: per ogni prodotto di competenza dell’utente staff, questo può gestire i relativi malfunzionamenti. Accedendo alla pagina di gestione dei malfunzionamenti di un prodotto, è possibile inserire, modificare ed eliminare, previa notifica da parte del sito, i malfunzionamenti associati a tale prodotto.
  -Gestire gli interventi: per ogni malfunzionamento associato al prodotto di competenza dell’utente staff, questo può gestire i relativi interventi. Accedendo alla pagina di gestione degli interventi (dalla pagina gestione malfunzionamenti associati al relativo prodotto), è possibile inserire, modificare ed eliminare, previa notifica da parte del sito, gli interventi associati al malfunzionamento considerato, relativo al prodotto considerato.

Viene implementata anche qui la funzionalità di logout, per terminare la propria sessione.

## Livello admin:

L'utente di livello amministratore ha una propria area personale, dove tramite navigazione può raggiungere tre aree specifiche:
  -Gestione FAQs: è possibile inserire, eliminare o modificare tramite apposite form le FAQs da presentare poi nella relativa sezione, con conseguente aggiornamento del database;
  -Gestione utenti: in quest’area, l’amministratore del sito può, mediante apposite tabelle:
    -l’inserimento, la modifica e la cancellazione, previa notifica da parte del sito, dei centri di assistenza esterni, con conseguente aggiornamento del database (la modifica del nome del centro esterno comporta anche la modifica del nome del centro per tutti i tecnici esterni associati a quel centro, mentre, l’eliminazione del centro esterno, comporta anche l’eliminazione di tutti i tecnici esterni associati a quel centro);
    -l’inserimento (scegliendo anche il codice del centro esterno a cui afferisce il tecnico), la modifica e la cancellazione, previa notifica da parte del sito, dei tecnici esterni, con conseguente aggiornamento del database;
    -l’inserimento, la modifica e la cancellazione, previa notifica da parte del sito, dello staff, con conseguente aggiornamento del database;
  -Gestione prodotti: attraverso questa funzionalità, è possibile accedere al catalogo prodotti in cui l’amministratore può eseguire le operazioni di inserimento(utilizzo di jQuery per la validazione della form e per semplificare l’inserimento del rumore e del consumo energetico del prodotto), modifica e cancellazione, previa notifica da parte del sito, del prodotto. Inoltre, accedendo alla gestione dei malfunzionamenti di ciascun prodotto, è possibile inserire, modificare e cancellare, previa notifica da parte del sito, ciascun malfunzionamento associato al relativo prodotto. Infine, accedendo alla pagina di gestione degli interventi (dalla pagina gestione malfunzionamenti associati al relativo prodotto), è possibile inserire, modificare ed eliminare, previa notifica da parte del sito, gli interventi associati al malfunzionamento considerato, relativo al prodotto considerato. Il tutto con conseguente aggiornamento del database.
  -Accedere alla scheda tecnica del prodotto e accedere ai relativi malfunzionamenti e interventi;

Viene implementata anche qui la funzionalità di logout, per terminare la propria sessione.

## Sperimentazione in autonomia (pacchetti aggiuntivi):

  -Utilizzo della funzione “**substr_count**” : utilizzata per contare il numero di caratteri wild-card "*", inseriti all’interno della barra di ricerca;
  -Utilizzo della funzione “**substr_compare**” : utilizzata per verificare se l’ultimo carattere inserito nella barra di ricerca è il carattere wild-card "*";
  -Utilizzo della funzione “**str_replace**” : utilizzata per sostituire il carattere wild-card "*" con "", all’interno della barra di ricerca;
  -un middleware “PreventBackHistory” : ci permette di risolvere il problema legato al fatto che successivamente al Logout, cliccando sul bottone che permette di tornare indietro del browser, le pagine riservate dei vari utenti rimanevano visibili, contrariamente a quanto doveva accadere secondo gli altri middleware da noi definiti. Questo perché quando l’utente clicca il back button e non è loggato, il browser visualizza la pagina salvata nella cache. L’utente non potrà navigare né interagire con nulla, ma anche per evitare che possa semplicemente vedere l’ultima pagina dell’utente che ha appena effettuato il Logout, questo middleware “ripulisce” la cache a seguito del Logout. 
-creazione delle pagine da visualizzare in caso di errore 403 (l’accesso alla risorsa richiesta è vietato per il richiedente) e 404 (il server non ha trovato ciò che è stato richiesto).
  
## Schema dei link:

### LEGENDA

<p align="center">
<img src="https://github.com/ChiaraAmalia/ProgettoTWEBExtracorso/blob/main/imm/legenda.png">
</p>
  
### Livello “OSPITE”:

<p align="center">
<img src="https://github.com/ChiaraAmalia/ProgettoTWEBExtracorso/blob/main/imm/livello_1.png">
</p>
  
### Livello “TECNICO":

<p align="center">
<img src="https://github.com/ChiaraAmalia/ProgettoTWEBExtracorso/blob/main/imm/livello_2.png">
</p>

### Livello “STAFF":

<p align="center">
<img src="https://github.com/ChiaraAmalia/ProgettoTWEBExtracorso/blob/main/imm/livello_3.png">
</p>

### Livello “AMMINISTRATORE":

<p align="center">
<img src="https://github.com/ChiaraAmalia/ProgettoTWEBExtracorso/blob/main/imm/livello_4.png">
</p>

## Autori

 - Chiara Amalia Caporusso -> https://github.com/ChiaraAmalia

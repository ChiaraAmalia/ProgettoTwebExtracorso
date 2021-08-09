<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            ['domanda' => 'Di cosa si occupa ElectroStar?', 'risposta' => 'ElectroStar si occupa della vendita di elettrodomestici quali: frigoriferi, lavastoviglie, lavatrici, asciugatrici, frigoriferi e molto altro.'],
            ['domanda' => 'Da cosa nasce l\' idea di questo sito?', 'risposta' => 'Questo sito nasce per aiutare i nostri tecnici nella risoluzione di problemi legati ai nostri elettrodomestici.'],
            ['domanda' => 'Cosa si può vedere nel catalogo?', 'risposta' => 'Nel catalogo è possibile visualizzare le informazioni relative ai nostri prodotti come le note tecniche di buon uso e le modalità di installazione, privo delle informazioni relative ai malfunzionamenti e alle relative soluzioni.'],
            ['domanda' => 'Accedendo come tecnico, cosa posso visualizzare?', 'risposta' => 'Accedendo come tecnico è possibile visualizzare, oltre che tutti i prodotti nel catalogo, anche i malfunzionamenti e le soluzioni relativi ai prodotti di propria competenza.'],
            ['domanda' => 'Quali sono le funzionalità dello staff?', 'risposta' => 'Un utente registrato come staff ha il compito di aggiornare le schede prodotto con l\' inserimento, la modifica e la cancellazione dei malfunzionamenti e delle soluzioni relative'],
            ['domanda' => 'Quali sono le funzionalità dell\' amministratore?', 'risposta' => 'L\' amministratore gestisce i prodotti e le relative informazioni inclusi i malfunzionamenti e le soluzioni, inoltre gestisce gli utenti registrati nel sito e le FAQ.'],
            ['domanda' => 'Come posso effettuare il login?', 'risposta' => 'Nella barra di navigazione in alto basta cliccare sul link di Log-In e procedere con l\'autenticazione, oppure nella home, cliccando nell\'immagine in fondo, sul frigorifero.'],
        ]);
        
        
        DB::table('users')->insert([
            [ 'username' => 'adminadmin', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'amministratore', 'specializzazione' => Null, 'occupazione' => Null,
              'nome_centro' => Null, 'email' => 'giuseppe.santi3@mail.com', 'email_verified_at' => Null, 'nome' => 'Giuseppe', 'cognome' => 'Santi', 'via' => 'Piagi', 'citta' => 'Ancona',
              'cap' => '60121', 'sesso' => 'M', 'cellulare' => '3556768542'],
            [ 'username' => 'tecntecn', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'tecnico', 'specializzazione' => 'lavatrice', 'occupazione' => 'interna',
              'nome_centro' => Null, 'email' => 'maria.cerrato5@smail.com', 'email_verified_at' => Null, 'nome' => 'Maria', 'cognome' => 'Cerrato', 'via' => 'Donnola', 'citta' => 'Perugia',
              'cap' => '59439', 'sesso' => 'F', 'cellulare' => '3542047281'],
            [ 'username' => 'staffstaff', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'staff', 'specializzazione' => NULL, 'occupazione' => NULL,
              'nome_centro' => Null, 'email' => 'marco.rerrero7@pmail.com', 'email_verified_at' => Null, 'nome' => 'Marco', 'cognome' => 'Ferrero', 'via' => 'Sudini', 'citta' => 'Roma',
              'cap' => '23918', 'sesso' => 'M', 'cellulare' => '3920173645'],
        ]);
        
        DB::table('prodotto')->insert([
            [ 'nome_prodotto' => 'Lavatrice Indesit EWC 71252 W IT N', 'tipologia' => 'lavatrice', 'rumore' => '57 dB', 'consumo_en_annuo' => '174 kWh', 'luce_interna' => 'Sì',
              'Programmi' => 'Programma lavaggio misti, Programma lavaggio rapido, Programma lavaggio sport, Programma lavaggio a freddo, Programma lavaggio cotone, Programma lavaggio eco, Programma lavaggio sintetici, Programma solo centrifuga, Programma lavaggio lana',
              'classe_energetica' => 'E', 'descrizione' => 'Lavatrice Indesit EWC 71252 W IT N. Tipo di carica: Caricamento frontale. Capacità cestello: 7 kg, Classe di efficienza della centrifuga: B, Silenziosità (centrifuga): 80 dB, Silenziosità (lavaggio): 57 dB, Velocità di centrifuga massima: 1200 Giri/min. Colore del prodotto: Bianco. Larghezza: 595 mm, Profondità: 517 mm, Altezza: 850 mm. Classe efficienza energetica: E',
              'Immagine' => 'lavatriceIndesit.jpg', 'tecniche_buonuso' => 'Dopo l’installazione, prima dell’uso, effettuare un ciclo di lavaggio con detersivo e senza biancheria impostando il programma 2. Accendere la lavabiancheria premendo il tasto ON/OFF . Tutte le spie si accenderanno per qualche secondo, poi rimarranno accese le spie ralative alle impostazioni del programma selezionato e pulserà la spia AVVIO/PAUSA. Aprire la porta oblò. Caricare la biancheria facendo attenzione a non superare la quantità di carico indicata nella Tabella Programmi. Estrarre il cassetto e versare il detersivo nelle apposite vaschette. Chiudere L’oblo’. Selezionare con la manopola PROGRAMMI il programma desiderato; Selezionare la temperatura. Selezionare la la centrifuga. Selezionare le opzioni desiderate. Premere il tasto AVVIO/PAUSA per avviare il programma di lavaggio, la spia relativa si illuminerà di colore verde fisso e l’oblò si bloccherà (Spia accesa)',
              'modalita_installazione' => 'Per installare la lavatrice, scegliere un pavimento duro e ben livellato. Verifica che la temperatura della stanza non scenda mai sotto lo 0 °C, inoltre l elettrodomestico non dovrebbe essere esposto a fonti di calore o infiammabili, come carbone, benzina o luce solare diretta. Non lasciare che si appoggi sul suo stesso cavo. Se la lavatrice è fuori equilibrio, può oscillare e spostarsi distruggendo il cavo. Regola i livelli dei piedini. Si tratta di quattro (o più) supporti piccoli che si trovano sotto la lavatrice e la cui altezza può essere modificata in modo che l elettrodomestico sia il più possibile in piano. Puoi allentare i bulloni dei piedini a mano e ruotare questi ultimi finché non si trovano all altezza ideale. Per serrare i bulloni, usa una chiave inglese in modo da chiudere il dado di blocco; potrebbe essere necessario regolare la misura della chiave prima di stringere il dado, affinché si adatti al suo diametro. Metti la lavatrice in piano. Se è fuori equilibrio, può ondeggiare e urtare le superfici durante l utilizzo; tutto questo può creare parecchio rumore e potenzialmente danneggiare l abitazione. Il modo migliore per evitare che ciò accada è accertarsi che la lavatrice sia in piano, prima di iniziare a usarla. Per collegare i tubi, chiudi il rubinetto dell acqua. Prima di fare qualunque lavoro sull impianto, dovresti prendere delle precauzioni per evitare di allagare la casa. Individua la valvola che controlla l apporto di acqua alla lavatrice e chiudila prima di procedere all installazione. Collega il tubo di rifornimento. Si tratta del tubo che porta acqua alla lavatrice quando fai il bucato. Se ci sono già dei tubi dell impianto che raggiungono il sito in cui vuoi installare l elettrodomestico, ti basta collegarvi quello di rifornimento; in caso contrario, puoi unire quest ultimo al rubinetto del lavandino. Monta il tubo di scarico. Deve essere ben installato per evitare perdite. Se la lavatrice si trova vicino a un lavello, puoi agganciare il tubo al bordo, in modo che ricada nel lavello stesso. Se non hai uno scarico o un lavandino vicino alla lavatrice, devi usare un tubo verticale. Fai un lavaggio di prova. Quando la lavatrice è collegata, dovresti essere pronto a fare un carico di bucato. Tuttavia, invece di mettere i panni al suo interno e lasciare la macchina incustodita, è meglio controllarla attentamente durante i primi lavaggi, per assicurarti che non ci siano perdite.'
            ],
            [ 'nome_prodotto' => 'Lavastoviglie Bosch Serie 4 SMS46LI04E', 'tipologia' => 'lavastoviglie', 'rumore' => '46 dB', 'consumo_en_annuo' => '262 kWh', 'luce_interna' => 'No',
              'Programmi' => 'Programma lavaggio economico, Programma lavaggio vetro, Programma lavaggio delicati, Programma lavaggio pre-risciacquo, Programma lavaggio rapido',
              'classe_energetica' => 'E', 'descrizione' => 'Lavastoviglie Bosch Serie 4 SMS46LI04E. Posizionamento dell apparecchio: Libera installazione, Dimensione: Dimensione massima (60 cm), Colore della porta: Argento. Numero di coperti: 13 coperti, Classe emissione rumore: C, Emissione acustica: 46 dB. Classe efficienza energetica: E, Consumo di acqua per ciclo: 7,5 L, Consumo energetico per 100 cicli: 94 kWh. Larghezza: 600 mm, Profondità: 600 mm, Altezza: 845 mm',
              'Immagine' => 'lavastovigliebosch.jpg', 'tecniche_buonuso' => 'I detersivi con il contrassegno "Bio" oppure "Eco" di regola utilizzano (per motivi di tutela dell ambiente) quantità inferiori di sostanze attive oppure rinunciano completamente a determinate sostanze. L effetto di lavaggio può essere limitato. Impostare il sistema del brillantante e l impianto addolcitore sul solo detersivo o sul detersivo combinato. In base alle indicazioni dei produttori, i detersivi combinati con prodotti sostitutivi del sale possono essere utilizzati senza l aggiunta di sale speciale soltanto fino a un determinato grado di durezza dell acqua, generalmente 21 °dH. Per i migliori risultati di lavaggio e di asciugatura, a partire da un grado di durezza dell acqua di 14 °dH consigliamo di utilizzare sale speciale. In caso d’impiego di detersivi con involucro protettivo solubile in acqua, toccare l’involucro solo con le mani asciutte e introdurre il detersivo solo nel contenitore detersivo asciutto, altrimenti può incollarsi. Utilizzando detersivi combinati, i programmi di lavaggio si svolgono senza problemi anche se la spia di mancanza brillantante e la spia di esaurimento sale speciale sono accese. La funzione del brillantante è limitata nei detersivi combinati. Utilizzando brillantante si ottengono generalmente risultati migliori. Utilizzare tab con prestazioni di asciugatura speciali.',
              'modalita_installazione' => 'Posiziona il macchinario. Posiziona la nuova lavastoviglie dal retro. Collega il tubo. Collega il tubo di scarico con un raccordo di compressione. Installa le pareti. Avvolgi il collegamento della linea d acqua con del Teflon e attacca la curva a 90° di ottone usata appunto per connettere la linea dell acqua. Inserisci la nuova lavastoviglie. Avvita le gambe frontali della nuova lavastoviglie in modo tale da farla scorrere facilmente verso il punto dove opererà. Nel frattempo, chiedi a qualcuno di tirare il tubo di scarico e posizionarlo sotto il lavandino. Connetti il tubo. Connetti il tubo dell acqua sotto la lavastoviglie con la curva a 90° di ottone. Sistema il cavo. Fai passare il cavo elettrico attraverso la guaina di protezione sulla lavastoviglie e stringila in modo che il cavo non si sfili. Connetti i fili. Ora fai tutte le connessioni dei fili elettrici necessarie: il filo di messa a terra con la vite verde, il filo bianco con il filo bianco, il filo nero con il filo nero. Usa dei cappucci di protezione per completare il collegamento. Connetti il tubo di scarico. Connetti il nuovo tubo di scarico dove si trovava quello precedente. Riallaccia la fornitura idrica. Apri la valvola dell acqua calda. Controlla se ci sono delle perdite d acqua. Controlla i collegamenti. Nel caso in cui ci fossero delle perdite, controlla tutti i collegamenti e fai dei test di verifica. Aggiusta l altezza. Aggiusta l altezza delle gambe frontali della lavastoviglie e posizionala correttamente utilizzando una livella. Avvita le viti di montaggio. Indirizza le viti di montaggio piccole nella parte di sotto del piano di lavoro attraverso una flangia, per connettere la lavastoviglie al piano di lavoro. Riallaccia l elettricità. Attacca la corrente e la lavastoviglie sarà pronta per luso.'
            ]
        ]);
        
        DB::table('malfunzionamento')->insert([
            [
              'codice_prodotto' => '1', 'titolo' => 'SOSTITUZIONE ELETTROSERRATURA ROTTA', 'descrizione' => 'Tutto dipende da cosa non va nel blocco porta, visto che le conseguenze potrebbero anche essere diverse. Se non riesce a chiudere il gancio del cricchetto, lo sportello rimarrà semi aperto e mancherà il tipico click che ci comunica la corretta chiusura. Se invece non funziona il collegamento alla scheda, lo sportello si chiuderà ma l’elettroserratura non sarà in grado di dare il via al caricamento dell’acqua. In realtà, in entrambi i casi il risultato sarà il medesimo, la lavatrice non potrà funzionare, dunque non potrà avvenire il carico di acqua. L’unica differenza sta nel fatto che, nel secondo caso, è più difficile comprendere che il problema dipende dal blocco porta. Questo perché in apparenza lo sportello risulterà chiuso correttamente, dato che il serraggio del gancio sarà avvenuto con successo.'
            ],
            [
              'codice_prodotto' => '1', 'titolo' => 'SOSTITUZIONE CINGHIA SPEZZATA', 'descrizione' => 'Capire che la cinghia della lavatrice è rotta, non è particolarmente complicato: i segnali di un malfunzionamento o guasto sono abbastanza evidenti e difficili da ignorare. Ci sono delle situazioni specifiche che possono farti sorgere il dubbio: il cestello della lavatrice si blocca spesso durante il lavaggio, il cestello della lavatrice non gira, la tua lavatrice fa rumore quando è in funzione, in particolare dovresti sentire dei rumori striduli provenire dall’interno dell’elettrodomestico.'  
            ],
        ]);
        
        DB::table('intervento')->insert([
            [
              'codice_malfunzionamento' => '1', 'descrizione' => 'Staccare l’elettrodomestico dalla presa di corrente, per evitare una pericolosa scossa.'  
            ],
            [
              'codice_malfunzionamento' => '1', 'descrizione' => 'Aprire lo sportello e sfilare la guarnizione dello sportello, prendendo un cacciavite e facendo leva al suo interno, così da smontare l’anello di fissaggio.'  
            ],
            [
              'codice_malfunzionamento' => '1', 'descrizione' => 'Una volta tolto l’anello, devi prendere il cacciavite e svitare le due viti che fissano il meccanismo del blocco porta.'  
            ],
            [
              'codice_malfunzionamento' => '1', 'descrizione' => 'A questo punto puoi infilare la mano dal lato della guarnizione, sollevandola, per potere afferrare il corpo dell’elettroserratura e per poterla estrarre.'  
            ],
            [
              'codice_malfunzionamento' => '2', 'descrizione' => 'Smontare il pannello posteriore della lavatrice. '
            ],
            [            
              'codice_malfunzionamento' => '2', 'descrizione' => 'Qui, dovresti vedere la cinghia spezzata o fuori posto da andare a rimuovere. Raggiungi il bastone che si trova in basso e che è collegato al motore della lavatrice. All’estremità di esso, troverai una forma richettata su cui è inserita la cinghia. Staccala e rimuovila così da poter agganciare quella nuova.'
            ],
            [            
              'codice_malfunzionamento' => '2', 'descrizione' => 'Una volta fatto questo, devi far passare la cinghia per il volano della puleggia. Questa è la fase più delicata. Inizia dal lato destro e poi fai ruotare la puleggia verso sinistra, così che la cinghia possa scorrere agilmente.'
            ],
            [            
              'codice_malfunzionamento' => '2', 'descrizione' => 'Richiudere il pannello e la lavatrice dovrebbe tornare a funzionare come se fosse nuova.'
            ],
        ]);
    }
}

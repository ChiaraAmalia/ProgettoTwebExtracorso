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
              'modalita_installazione' => 'Per installare la lavatrice, scegliere un pavimento duro e ben livellato. Verifica che la temperatura della stanza non scenda mai sotto lo 0 °C, inoltre l elettrodomestico non dovrebbe essere esposto a fonti di calore o infiammabili, come carbone, benzina o luce solare diretta. Non lasciare che si appoggi sul suo stesso cavo. Se la lavatrice è fuori equilibrio, può oscillare e spostarsi distruggendo il cavo. Regola i livelli dei piedini. Si tratta di quattro (o più) supporti piccoli che si trovano sotto la lavatrice e la cui altezza può essere modificata in modo che l elettrodomestico sia il più possibile in piano. Puoi allentare i bulloni dei piedini a mano e ruotare questi ultimi finché non si trovano all altezza ideale. Per serrare i bulloni, usa una chiave inglese in modo da chiudere il dado di blocco; potrebbe essere necessario regolare la misura della chiave prima di stringere il dado, affinché si adatti al suo diametro. Metti la lavatrice in piano. Se è fuori equilibrio, può ondeggiare e urtare le superfici durante l utilizzo; tutto questo può creare parecchio rumore e potenzialmente danneggiare l abitazione. Il modo migliore per evitare che ciò accada è accertarsi che la lavatrice sia in piano, prima di iniziare a usarla. Per collegare i tubi, chiudi il rubinetto dell acqua. Prima di fare qualunque lavoro sull impianto, dovresti prendere delle precauzioni per evitare di allagare la casa. Individua la valvola che controlla l apporto di acqua alla lavatrice e chiudila prima di procedere all installazione. Collega il tubo di rifornimento. Si tratta del tubo che porta acqua alla lavatrice quando fai il bucato. Se ci sono già dei tubi dell impianto che raggiungono il sito in cui vuoi installare l elettrodomestico, ti basta collegarvi quello di rifornimento; in caso contrario, puoi unire quest ultimo al rubinetto del lavandino. Monta il tubo di scarico. Deve essere ben installato per evitare perdite. Se la lavatrice si trova vicino a un lavello, puoi agganciare il tubo al bordo, in modo che ricada nel lavello stesso. Se non hai uno scarico o un lavandino vicino alla lavatrice, devi usare un tubo verticale. Fai un lavaggio di prova. Quando la lavatrice è collegata, dovresti essere pronto a fare un carico di bucato. Tuttavia, invece di mettere i panni al suo interno e lasciare la macchina incustodita, è meglio controllarla attentamente durante i primi lavaggi, per assicurarti che non ci siano perdite.']
        ]);
    }
}
